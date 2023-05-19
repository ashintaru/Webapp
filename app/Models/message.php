<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    protected $table = 'message';
    protected $primaryKey = 'messageId';
    public $timestamps= false;
    protected $fillable =[
      'name',
      'email',
      'comment',
      'status',
      'dateCreated'
    ];
}
