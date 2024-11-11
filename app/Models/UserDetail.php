<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'salutation', 'age', 'occupation', 'phone', 'house_number', 'village', 'subdistrict', 'district', 'province'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
