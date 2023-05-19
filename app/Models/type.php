<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;
    protected $table = 'type';
    protected $primaryKey = 'typeId';
    public $timestamps= false;
    protected $fillable =[
        'typeName',
        'dateCreated',
        'dateUpdated',
        'status'
    ];

}
