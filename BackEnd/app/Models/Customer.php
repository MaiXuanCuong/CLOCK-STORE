<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable implements JWTSubject
{
    use HasFactory,HasApiTokens;
    use Notifiable;
    use SoftDeletes;
    protected $fillable = [
        'id','name','email','phone','password','created_at'
    ];
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
    public function scopeSearch($query, $term)
    {
        if ($term) {
            $query
                ->where('customers.name', 'like', '%' . $term . '%')
                ->orWhere('customers.phone', 'like', '%' . $term . '%')
                ->orWhere('customers.id', 'like', '%' . $term . '%')
                ->orWhere('customers.email', 'like', '%' . $term . '%');
        }
        return $query;
    }
    public function scopeFilterName($query, $request)
    {
        if ($request->has('name')) {
            $query->Where('customers.name', 'like', '%' . $request->name . '%');
        }
        return $query;
    }
    public function scopefilterPhone($query, $request)
    {
        if ($request->has('phone')) {
            $query->where('customers.phone','like', '%' . $request->phone . '%' );
        }
        return $query;
    }
    public function scopeEmail($query, $request)
    {
        if ($request->has('email')) {
            $query->where('customers.email','like', '%' . $request->email . '%' );
        };
        return $query;
    }
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
}