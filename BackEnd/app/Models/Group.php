<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'groups';
    protected $fillable = ['id','name'];
    function users()
    {
        return $this->hasMany(User::class,'group_id','id');
    }
    public function roles() {
        return $this->belongsToMany(Role::class,'group_roles','group_id','role_id');
    }
    public function scopeSearch($query, $term)
    {
        if ($term) {
            $query->where('name', 'like', '%' . $term . '%')
                ->orWhere('id', 'like', '%' . $term . '%');
        }
        return $query;
    }
}
