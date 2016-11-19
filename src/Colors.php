<?php

namespace Droogle\GciTaskUpload;

/**
 * Defines text colors for the terminal.
 */
class Colors {
  /**
   * Array of color codes.
   */
  private $colors = array();

  /**
   * Colors constructor.
   */
  public function __construct() {
    $this->colors = [
      'begin' => "\033",
      'red' => "[31m",
      'green' => "[32m",
      'end' => "\033[0m",
    ];
  }

  /**
   * Returns a red text.
   * 
   * @param string $text
   *   The text.
   *
   * @return string
   *   The formatted text.
   */
  public function red($text) {
    return  $this->begin() . $this->colors['red'] . $text . $this->end();
  }

  /**
   * Returns a green text.
   * 
   * @param string $text
   *   The text.
   *
   * @return string
   *   The formatted text.
   */
  public function green($text) {
    return  $this->begin() . $this->colors['green'] . $text . $this->end();
  }

  /**
   * Returns the scoped characters to start a colored text.
   *
   * @return string
   *   The scoped character to start a colored text.
   */
  private function begin() {
    return $this->colors['begin'];
  }

  /**
   * Returns the scoped characters to end a colored text.
   *
   * @return string
   *   The scoped character to end a colored text.
   */
  private function end() {
    return $this->colors['end'];
  }
}
