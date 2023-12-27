<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','due_date','status','priority'];

    public static function rules() {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'due_date' => 'required|date|after:now',
            'priority' => 'required|in:low,medium,high',
        ];
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($task) {
            $task->status = false;
        });

        static::creating(function ($task) {
            $task->status = $task->due_date < now();
        });

    }
    protected $casts = [
      'status' => 'boolean',  
    ];
}
