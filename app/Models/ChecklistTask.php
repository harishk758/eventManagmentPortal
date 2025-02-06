<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChecklistTask extends Model
{
    use HasFactory,SoftDeletes;

    protected $casts = [
        'due_date' => 'date',
    ];

    public function teamMember()
    {
        return $this->belongsTo(TeamMember::class, 'member_id');
    }
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    
}
