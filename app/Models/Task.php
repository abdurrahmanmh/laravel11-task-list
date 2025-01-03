<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    // public function getRouteKeyName(){
    //     return 'slug';
    // }

    protected $fillable = ['title','description','long_description'];
    // protected $guarded = ['id'];

    public function toggleCompleted(){
        $this->completed = !$this->completed;
        $this->save();
    }

}
