<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Pegawai extends Model
{
    use HasUuids, HasFactory;
    protected $guarded = ['id'];
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'nip', 'nip');
    }
    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'nip', 'nip');
    }
}