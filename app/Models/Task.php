<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','due_date'];

    public static function rules() {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ];
    }
}
