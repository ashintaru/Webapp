<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guest extends Model
{
    use HasFactory;
    protected $table = 'guests';
    protected $primaryKey = 'gustId';
    public $timestamps= false;
    protected $fillable =[
        'eventId',
        'fname',
        'mname',
        'lname',
        'address',
        'award',
        'department',
        'status',
        'serialNum',
        'plusOneStatus'

    ];
}
