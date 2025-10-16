<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [ 'id' ];

    public function users()
    {
        return $this->hasMany(UserModel::class, 'kelas_id');
    }

    public function getKelas(){
        return $this->all();
    }
}
