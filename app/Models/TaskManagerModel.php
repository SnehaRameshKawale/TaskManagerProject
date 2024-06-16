<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskManagerModel extends Model
{
    use HasFactory;

    protected $table = 'taskManagerTable';
    protected $primary_key = 'id';
    protected $fillable = ['title','description','priority','duedate'];

    public function setTitleAttribute($value){
        $this->attributes['title'] = ucfirst($value);
    }

    public function getTitleAttribute($value){
        return ucfirst($value);
    }

    public function getDuedateAttribute($value){
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }
}
