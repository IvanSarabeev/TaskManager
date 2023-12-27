<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','due_date','status'];

    public static function rules() {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'due_date' => 'required|date|after:now',
        ];
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($task) {
            $task->status = false;
        });

        // static::updated(function ($task) {
        //     // if($task->due_date < now()){
        //     //     $task->status = 'Completed';
        //     // } else {
        //     //     $task->status = 'Incompleted';
        //     // }

        //     $task->status = ($task->due_date < now()) ? 'Completed' : 'Incomplete';

        //     // $task->due_date < now() ? $task->status = 'Completed' : $task->status = 'Incompleted';
        // });

        static::creating(function ($task) {
            $task->status = $task->due_date < now();
        });

    }
    protected $casts = [
      'status' => 'boolean',  
    ];
}
