<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ListTask extends Model
{
    protected $table = "list_tasks";
    protected $fillable = ['content', 'status'];
}
