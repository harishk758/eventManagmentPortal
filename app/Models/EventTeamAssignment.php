<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class EventTeamAssignment extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    

    public function member()
    {
        return $this->belongsTo(TeamMember::class, 'member_id');
    }
}
