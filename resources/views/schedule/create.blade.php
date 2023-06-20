@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pilih tanggal pemilihan</h1>

    <div class ="election-start-container">



    </div> 

    <form method="POST" action="/schedule/">
        @csrf

        @if(session('success'))
            <p>{{session('success')}}</p>
        @endif

        @if($errors->any())
            @foreach($errors->all() as $err) 
                <p>{{$err}}</p>
            @endforeach
        @endif


      <div class="form-group">
        <label for="dateInput">Tanggal mulai pemilihan</label>
        <input type="datetime-local" class="form-control" id="dateInput" name="election_start_date" value="{{$schedule->election_start_date ?? ''}}">
      </div>

      <div class="form-group">
        <label for="dateInput">Tanggal berakhir pemilihan</label>
        <input type="datetime-local" class="form-control" id="dateInput" name="election_end_date" value="{{$schedule->election_end_date ?? ''}}">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @if($is_schedule_exists)
    <form method="POST" action="/schedule/delete/all">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Reset</button>
    </form>
    @endif
</div>
@endsection