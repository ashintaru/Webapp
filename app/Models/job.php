<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    protected $table = 'job';
    protected $primaryKey = 'jobId';
    public $timestamps= false;
    protected $fillable =[
        'compId',
        'typeId',
        'categoryId',
        'hourId',
        'locId',
        'objective',
        'requirement',
        'dateCreated',
        'dateUpdated',
        'status',
        'photo'
    ];
}
