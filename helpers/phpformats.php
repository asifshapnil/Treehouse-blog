<?php

/**
 *
 */
class Format
{
  public function textFormat($text, $length=400)
  {
    $text = $text." ";
    $text = substr($text, 0, $length);

    return $text;
  }
}
