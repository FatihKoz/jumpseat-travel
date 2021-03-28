<?php

namespace Modules\JumpSeat\Providers;

use App\Services\ModuleService;
use Illuminate\Support\ServiceProvider;
use Route;

class JumpSeatServiceProvider extends ServiceProvider
{
  protected $moduleSvc;

  public function boot()
  {
    $this->moduleSvc = app(ModuleService::class);
    $this->registerLinks();
    $this->registerRoutes();
    $this->registerTranslations();
    $this->registerConfig();
    $this->registerViews();
  }

  public function register() { }

  public function registerLinks()
  {
    $this->moduleSvc->addAdminLink('JumpSeat Module', '/admin/jumpseat');
  }

  protected function registerRoutes()
  {
    /** Routes for the frontend , delete before publishing if not needed **/
    Route::group([
        'as'     => 'JumpSeat.',
        'prefix' => '',
        'middleware' => ['web'],
        'namespace'  => 'Modules\JumpSeat\Http\Controllers',
    ], function () {
      Route::group([
        'middleware' => ['auth'],
      ], function () {
        Route::post('jstravel', 'JumpSeatController@jstravel')->name('jstravel');
      });
    });

    /** Routes for the admin **/
    Route::group([
        'as'     => 'JumpSeat.',
        'prefix' => 'admin',
        'middleware' => ['web', 'role:admin'],
        'namespace'  => 'Modules\JumpSeat\Http\Controllers',
    ], function () {
      Route::group([],
        function () {
        Route::get('jumpseat', 'JumpSeatController@admin')->name('admin');
        });
    });
  }

  protected function registerConfig()
  {
    $this->publishes([ __DIR__.'/../Config/config.php' => config_path('JumpSeat.php'),], 'config');
    $this->mergeConfigFrom( __DIR__.'/../Config/config.php', 'JumpSeat');
  }

  public function registerTranslations()
  {
    $langPath = resource_path('lang/modules/JumpSeat');

    if (is_dir($langPath)) {
      $this->loadTranslationsFrom($langPath, 'JumpSeat');
    } else {
      $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'JumpSeat');
    }
  }

  public function registerViews()
  {
    $viewPath = resource_path('views/modules/JumpSeat');
    $sourcePath = __DIR__.'/../Resources/views';

    $this->publishes([$sourcePath => $viewPath,], 'views');

    $this->loadViewsFrom(array_merge(array_map(function ($path) {
      return $path . '/modules/JumpSeat';
    }, \Config::get('view.paths')), [$sourcePath]), 'JumpSeat');
  }

  public function provides(): array { return []; }
}
