<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    
    // semua data boleh diisi, kecuali kolom id.
    protected $guarded = ["id"];
    // protected $dates = ['election_start_date', 'election_end_date'];

}
