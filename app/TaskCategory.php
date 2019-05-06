<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    protected $table = "task_categories";
    public $primaryKey = "id";
}
