@extends('layouts.app')

@section('content')


<div class="schedule-container m-5 p-5">
  
    @if(!$schedule)
    <p>Jadwal pemilihan belum dibuat.</p>
    @else
    <h1> Jadwal Pemilihan </h1>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tanggal Mulai Pemilihan</h5>
                    <ul>
                      <li> Hari dan tanggal :  {{date('d-m-Y', strtotime($schedule->election_start_date))}}</li>
                      <li> Hari dan tanggal :  {{date('H:i', strtotime($schedule->election_start_date))}} WIB</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tanggal Pemilihan Berakhir</h5>
                    <ul>
                      <li> Hari dan tanggal :  {{date('d-m-Y', strtotime($schedule->election_end_date))}}</li>
                      <li> Hari dan tanggal :  {{date('H:i', strtotime($schedule->election_end_date))}} WIB</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->roles != '["ADMIN"]')
    <a href="/pilihan" class="btn btn-primary mt-4 d-flex justify-content-center" class="margin:auto;">Ayo memilih!</a>
    @endif
    
    @endif

</div>

@endsection