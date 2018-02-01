<?php

namespace JrMiranda\AntiBot;

use Illuminate\Support\Facades\Facade;

class AntiBotFacade extends Facade {

  protected static function getFacadeAccessor() {
    return 'antibot';
  }

}
