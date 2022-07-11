<?php

namespace Pharaonic\Laravel\Agents;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Pharaonic\Laravel\Agents\Middleware\AgentDetector;

class AgentsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishes
        $this->publishes([
            __DIR__ . '/database/migrations/2021_02_01_000019_create_devices_table.php'                 => database_path('migrations/2021_02_01_000019_create_devices_table.php'),
            __DIR__ . '/database/migrations/2021_02_01_000020_create_operation_systems_table.php'       => database_path('migrations/2021_02_01_000020_create_operation_systems_table.php'),
            __DIR__ . '/database/migrations/2021_02_01_000021_create_browsers_table.php'                => database_path('migrations/2021_02_01_000021_create_browsers_table.php'),
            __DIR__ . '/database/migrations/2021_02_01_000022_create_bots_table.php'                    => database_path('migrations/2021_02_01_000022_create_bots_table.php'),
            __DIR__ . '/database/migrations/2021_02_01_000023_create_agents_table.php'                  => database_path('migrations/2021_02_01_000023_create_agents_table.php'),
        ], ['pharaonic', 'laravel-agents']);


        // Router
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('agent', AgentDetector::class);
    }
}
