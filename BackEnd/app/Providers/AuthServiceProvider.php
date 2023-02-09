<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Group;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use App\Policies\BrandPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\CustomerPolicy;
use App\Policies\GroupPolicy;
use App\Policies\OrderPolicy;
use App\Policies\ProductPolicy;
use App\Policies\SupplierPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Group::class => GroupPolicy::class,
        User::class => UserPolicy::class,
        Supplier::class => SupplierPolicy::class,
        Product::class => ProductPolicy::class,
        Customer::class => CustomerPolicy::class,
        Brand::class => BrandPolicy::class,
        Category::class => CategoryPolicy::class,
        Order::class => OrderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
