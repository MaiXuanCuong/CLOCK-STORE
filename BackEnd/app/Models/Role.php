<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = ['name', 'group_name'];
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
