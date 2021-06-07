<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahasaPemograman extends Model
{
    use HasFactory;

    protected $table = "bahasa_pemograman";

    protected $fillable = [
        'bahasaPemograman'
    ];

    public function BPTopik(){
        return $this->hasMany(BPTopik::class);
    }
}
