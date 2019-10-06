<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
       'sender','userID','userName','note','fileName','path'
    ];
}
