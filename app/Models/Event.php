<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($event) {
            $event->booths()->delete();
            $event->checklistTasks()->delete();
            $event->expense()->delete();
        });

        static::deleting(function ($event) {
            EventTeamAssignment::where('event_id', $event->id)->delete();
        });
    }

    public function booths()
    {
        return $this->hasMany(Booth::class);
    }

    public function checklistTasks()
    {
        return $this->hasMany(ChecklistTask::class, 'event_id');
    }

    public function expense()
    {
        return $this->hasMany(Expenses::class, 'event_id');
    }
}
