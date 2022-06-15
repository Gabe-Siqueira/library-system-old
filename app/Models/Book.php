<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'author', 'number_pages', 'registration_date'];

    public function rules() {
        return [
            'title' => 'required|max:50',
            'description' => 'required|max:50',
            'author' => 'required|max:100',
            'number_pages' => 'required|integer',
            'registration_date' => 'required|timestamp'
        ];
    }
}
