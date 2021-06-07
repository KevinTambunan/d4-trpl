<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanUser extends Model
{
    use HasFactory;

    protected $table = 'pengumuman_user';

    protected $fillable = [
        'user_id',
        'pengumuman_id',
        'suka',
        'tidak_suka'
    ];
}
