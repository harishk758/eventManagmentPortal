<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booth extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class, 'booth_id');
    }

    public function checklistTasks()
    {
        return $this->hasMany(ChecklistTask::class, 'booth_id');
    }

    public function vendors()
    {
        return $this->hasOne(Vendor::class, 'booth_id');
    }
}
