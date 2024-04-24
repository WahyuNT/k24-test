<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = ['foto', 'name', 'email', 'no_hp', 'no_ktp','tanggal_lahir','jenis_kelamin','password'];
}
