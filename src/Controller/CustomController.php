<?php

namespace Drupal\my_custom_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class CustomController
 * @package Drupal\my_custom_module\Controller
 */
class CustomController extends ControllerBase
{
  /**
   * @return array
   */
  public function content()
  {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('My custom module page!')
    ];
  }
}
