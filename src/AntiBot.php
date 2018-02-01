<?php

namespace JrMiranda\AntiBot;

class AntiBot {

  public function generate($honeypot, $formtime) {
    $enc_time = encrypt(time());

    $html = '<div style="display: none;">';
    $html .= '<input type="text" name="' . $honeypot . '" id="' . $honeypot . '" value="">';
    $html .= '<input type="text" name="' . $formtime . '" id="' . $formtime . '" value="' . $enc_time . '">';
    $html .= '</div>';

    return $html;
  }

  public function validateHoneypot($attr, $val, $param) {
    return $val == '';
  }

  public function validateFormTime($attr, $val, $param) {
    $value = decrypt($val);
    return ( is_numeric($value) && time() > $value + $param[0] );
  }

}
