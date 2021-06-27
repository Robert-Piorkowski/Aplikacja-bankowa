<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'accountNumber',
        'balance',
        'accountType',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function type(){
        return $this->belongsTo('App\Models\Type');
    }
}
