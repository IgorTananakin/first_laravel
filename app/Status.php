<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Status extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'created_at', 'updated_at'];

    public function tasks() {
        return $this->hasOne(Task::class);
    }
}
