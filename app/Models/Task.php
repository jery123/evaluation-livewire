<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tache';

    protected $fillable = [
        'statut',
        'date_debut',
        'date_fin',
        'tach',
    ];

    // public function getstatutAttribut():bool{
    //     return  $this->coding=Task::create($validatedData);
    //     session()->flash('message','Task completed successfuly');

    // }
}
