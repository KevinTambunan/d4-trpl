<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BPTopik extends Model
{
    use HasFactory;

    protected $table = "bp_topik";

    protected $fillable = [
        'bahasa_pemograman_id',
        'judul',
        'estimasi',
        'level',
        'link'
    ];

    public function BahasaPemograman(){
        return $this->belongsTo(BahasaPemograman::class);
    }
}
