<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMember extends Model
{
    use HasFactory,SoftDeletes;

    public function checklistTasks()
    {
        return $this->hasMany(ChecklistTask::class, 'member_id');
    }

    public function assignments()
    {
        return $this->hasMany(EventTeamAssignment::class, 'member_id');
    }
}
