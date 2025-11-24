<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class Task extends Model
{
     use HasFactory, Notifiable;
 
    protected $fillable = [
        'TaskTitle',
        'TaskDescription',
        'TaskStatus',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
