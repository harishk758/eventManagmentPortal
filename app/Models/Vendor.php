<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function booth()
    {
        return $this->hasOne(Booth::class);
    }

    public function booths()
    {
        return $this->belongsTo(Booth::class);
    }
}
