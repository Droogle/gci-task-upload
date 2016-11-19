<?php

namespace Droogle\GciTaskUpload;

/**
 * Defines text formats for the terminal.
 */
class TextFormat {
  /**
   * Array of color codes.
   */
  private $formats = array();

  /**
   * TextFormat constructor.
   */
  public function __construct() {
    $this->formats = [
      'begin' => "\033",
      'red' => "[31m",
      'green' => "[32m",
      'bold' => "[1m",
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
    return  $this->begin() . $this->formats['red'] . $text . $this->end();
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
    return  $this->begin() . $this->formats['green'] . $text . $this->end();
  }

  /**
   * Returns a bold text.
   * 
   * @param string $text
   *   The text.
   *
   * @return string
   *   The formatted text.
   */
  public function bold($text) {
    return  $this->begin() . $this->formats['bold'] . $text . $this->end();
  }

  /**
   * Returns a bold green text.
   * 
   * @param string $text
   *   The text.
   *
   * @return string
   *   The formatted text.
   */
  public function boldGreen($text) {
    return  $this->begin() . $this->formats['green'] . 
            $this->begin() . $this->formats['bold'] . 
            $text . $this->end();
  }

  /**
   * Returns the scoped characters to start a colored text.
   *
   * @return string
   *   The scoped characters to start a colored text.
   */
  private function begin() {
    return $this->formats['begin'];
  }

  /**
   * Returns the scoped characters to end a colored text.
   *
   * @return string
   *   The scoped characters to end a colored text.
   */
  private function end() {
    return $this->formats['end'];
  }
}
