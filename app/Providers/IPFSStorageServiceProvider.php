<?php

namespace App\Providers;

use App\Services\IPFSStorageService;
use App\Services\NFTStorageService;
use App\Services\Web3StorageService;
use Illuminate\Support\ServiceProvider;

class IPFSStorageServiceProvider extends ServiceProvider
{

    public $singletons = [
        IPFSStorageService::class => Web3StorageService::class
    ];
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
