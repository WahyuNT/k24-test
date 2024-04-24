<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $table = 'admins';
    protected $fillable = ['nama_lengkap', 'username', 'password'];
}
