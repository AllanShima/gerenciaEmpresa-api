<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $table = 'departaments';
    protected $fillable = ['name','location'];

    public function employees(){
        return $this->hasMany(Employee::class,'departament_id','id');
    }
}
