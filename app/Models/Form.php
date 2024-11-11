<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'guest_location', 'request_date', 'guest_salutation', 'guest_name', 'guest_age', 'guest_occupation',
        'guest_phone', 'guest_house_number', 'guest_village', 'guest_subdistrict', 'guest_district', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formDetails()
    {
        return $this->hasMany(FormDetail::class);
    }

    public function formAttachments()
    {
        return $this->hasMany(FormAttachment::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
