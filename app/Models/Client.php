<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    function transaction()
    {
        $this->hasMany(Transaction::class, 'id_client', 'id');
    }
}
