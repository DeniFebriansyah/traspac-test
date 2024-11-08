<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Profile extends Model
{
    use HasUuids, HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'photo' => 'array',
    ];
    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'nip','nip');
    }

    public function alamat()
    {
        return $this->hasOne(Alamat::class, 'nip','nip');
    }
    // public function alamat()
    // {
    //     return $this->belongsTo(Alamat::class, 'nip', 'nip');
    // }

    // public function pegawai()
    // {
    //     return $this->belongsTo(Pegawai::class, 'nip', 'nip');
    // }

}