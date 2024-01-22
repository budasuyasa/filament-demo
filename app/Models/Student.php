<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prestasi;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
        'nama',
        'jenis_kelamin',
        'email',
        'kelas',
        'foto'
    ];

    public function prestasi(){
        return $this->hasMany(Prestasi::class);
    }
}
