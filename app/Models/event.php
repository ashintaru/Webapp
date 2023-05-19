<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'eventtb';
    protected $primaryKey = 'eventId';
    public $timestamps= false;
    protected $fillable  =[
        'eventTitle'
    ];
}
