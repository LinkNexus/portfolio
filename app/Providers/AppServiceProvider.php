<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    $filename = "data." . app()->environment() . ".json";
    $filepath = resource_path("data/$filename");
    View::composer('*', function ($view) use ($filename, $filepath) {
      if (file_exists($filepath)) {
        $data = json_decode(file_get_contents($filepath), true);
      } else {
        throw new Exception("File $filename not found in resources/data");
      }

      $view->with("personalData", $data);
    });
  }
}
