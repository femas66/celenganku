<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celengan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class);
    }
}
