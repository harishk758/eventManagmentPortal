<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expenses extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'due_date' => 'date',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function booth()
    {
        return $this->belongsTo(Booth::class, 'booth_id');
    }

    // new function start
    public function getStatusAttribute($value)
    {
        if ($value === 'paid') {
            return 'Paid';
        }
        if ($this->due_date < now() && $value !== 'paid') {
            return 'Overdue';
        }
        return 'Pending';
    }
    // end code 
}
