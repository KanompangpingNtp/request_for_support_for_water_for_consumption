<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id', 'detail_type', 'detail_request_date', 'capacity',
        'detail_use_water_to', 'detail_location', 'detail_village',
        'detail_subdistrict', 'detail_district', 'detail_province'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
