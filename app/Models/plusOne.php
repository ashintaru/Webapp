<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plusOne extends Model
{
    use HasFactory;
    protected $table = 'plusone';
    protected $primaryKey = 'pOID';
    public $timestamps= false;
    protected $fillable =[
        'guestID',
        'fname',
        'mname',
        'lname',
        'address'
        ];
}
