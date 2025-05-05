<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = ['name','salary','role', 'admission_date', 'departament_id'];

    public function departament() {
        return $this->belongsTo(Category::class, 'departament_id', 'id');
    }
}
