<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'id_number',
        'contact_number',
        'email',
        'dob',
        'language',
        'interests'
    ];
}
