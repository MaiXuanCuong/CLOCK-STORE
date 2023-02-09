<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'suppliers';
    protected $fillable = ['name', 'email', 'address', 'phone'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function scopeSearch($query, $term)
    {
        if ($term) {
            $query->where('name', 'like', '%' . $term . '%')
                ->orWhere('email', 'like', '%' . $term . '%')
                ->orWhere('address', 'like', '%' . $term . '%')
                ->orWhere('phone', 'like', '%' . $term . '%')
                ->orWhere('id', 'like', '%' . $term . '%');
        }
        return $query;
    }
}
