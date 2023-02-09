<?php

namespace App\Providers;

use App\Repositories\Api\Product\ApiProductRepository;
use App\Repositories\Api\Product\ApiProductRepositoryInterface;
use Illuminate\Pagination\Paginator;

use App\Repositories\Brand\BrandRepository;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Supplier\SupplierRepository;
use App\Repositories\Supplier\SupplierRepositoryInterface;
use App\Services\Brand\BrandService;
use App\Services\Brand\BrandServiceInterface;
use App\Services\Category\CategoryService;
use App\Services\Category\CategoryServiceInterface;
use App\Services\Supplier\SupplierService;
use App\Services\Supplier\SupplierServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Group\GroupRepository;
use App\Repositories\Group\GroupRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Customer\CustomerService;
use App\Services\Customer\CustomerServiceInterface;
use App\Services\Group\GroupServiceInterface;
use App\Services\Group\GroupService;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Services\Api\Product\ApiProductService;
use App\Services\Api\Product\ApiProductServiceInterface;
use App\Services\Order\OrderService;
use App\Services\Order\OrderServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    const succes = 'Thêm thành công';
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->singleton(CustomerServiceInterface::class, CustomerService::class);
        //group
        $this->app->singleton(GroupRepositoryInterface::class, GroupRepository::class);
        $this->app->singleton(GroupServiceInterface::class, GroupService::class);
        //user
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(UserServiceInterface::class, UserService::class);

        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
        
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);

        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
        $this->app->bind(SupplierServiceInterface::class, SupplierService::class);

        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->bind(BrandServiceInterface::class, BrandService::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);

        $this->app->bind(ApiProductRepositoryInterface::class, ApiProductRepository::class);
        $this->app->bind(ApiProductServiceInterface::class, ApiProductService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
