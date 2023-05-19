<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hour extends Model
{
    use HasFactory;
    protected $table = 'hour';
    protected $primaryKey = 'hourId';
    public $timestamps= false;
    protected $fillable =[
        'hourName',
        'dateCreated',
        'dateUpdated',
        'status'
    ];

}
