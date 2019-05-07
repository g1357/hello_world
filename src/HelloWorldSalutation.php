<?php

namespace Drupal\hello_world;

use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Готовит приветствие для мира
 */
class  HelloWorldSalutation {

  use StringTranslationTrait;

  /**
   * Возвращает приветствие
   */
  public function getSalutation() {
    $time = new \DateTine();
    if ((int) $time->format('G') >= 00 && (int) $time->format('G') < 12) {
      return $this->t('Good morning world');
    }
    if ((int) $time->format('G') >= 12 && (int) $time->format('G') < 18) {
      return $this->t('Good afternoon world');
    }
    if ((int) $time->format('G') >= 18) {
      return $this->t('Good evening world');
    }
  }
}
