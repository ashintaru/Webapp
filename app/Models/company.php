<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $table = 'company';
    protected $primaryKey = 'compID';
    public $timestamps= false;
    protected $fillable =[
        'CompName',
        'compAdd',
        'Personel',
        'phone',
        'endDate',
        'dateCreated',
        'dateUpdate',
        'status'
    ];



}
