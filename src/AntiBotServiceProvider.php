<?php

namespace JrMiranda\AntiBot;

use App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AntiBotServiceProvider extends ServiceProvider
{
  /**
  * Bootstrap the application services.
  *
  * @return void
  */
  public function boot()
  {
    $this->loadTranslationsFrom(__DIR__ . '/lang', 'antibot');

    $this->app->booted(function($app) {
      $validator = $app['validator'];
      $translator = $app['translator'];

      $validator->extend('honeypot', 'antibot@validateHoneypot', $translator->get('antibot::validation.honeypot'));
      $validator->extend('formtime', 'antibot@validateFormTime', $translator->get('antibot::validation.formtime'));

      // Blade::directive('antibot', function($honeypot, $formtime) {
      //   return "<?php echo AntiBot::generate($honeypot, $formtime) ? >";
      // });
    });

  }

  /**
  * Register the application services.
  *
  * @return void
  */
  public function register()
  {
    App::bind('antibot', function() {
      return new AntiBot();
    });
  }
}
