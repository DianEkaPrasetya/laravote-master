<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Illuminate\Support\Facades\Date;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('schedule.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule.create',[
            "is_schedule_exists" => Schedule::all()->count() > 0,
            "schedule" => Schedule::all()->first() ?? false
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // Kalo misalnya ada data di database, artinya si admin udah pernah nentuin jadwal

       $validatedData = $request->validate(
            ["date_start" => "required|date|after_or_equal:today",
            "date_end" => "required|date|after_or_equal:date_start"]
       );
    
       if(Schedule::all()->count() > 0) {
            $data = Schedule::all()->first();
            $data->update([
                "election_start_date" => $request->date_start,
                "election_end_date" => $request->date_end
            ]);
            return redirect()->back()->with("success", "Anda berhasil melakukan update jadwal.");
        }

        Schedule::create([
            "election_start_date" => $request->date_start,
            "election_end_date" => $request->date_end
        ]);
        
        return redirect()->back()->with("success", "Anda berhasil memasukkan jadwal.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function destroyAll() {
        $data = Schedule::all()->first();
        $data->delete();
        return redirect('/schedule/create')->with('success', 'Jadwal berhasil direset');
    }
}
