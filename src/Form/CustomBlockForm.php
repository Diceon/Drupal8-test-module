<?php

namespace Drupal\my_custom_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CustomBlockForm extends FormBase
{

  /**
   * @inheritDoc
   */
  public function getFormId()
  {
    return 'custom_block_form';
  }

  /**
   * @inheritDoc
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->getConfiguration();

    // Link
    $form['custom_block_link'] = [
      '#type' => 'url',
      '#title' => $this->t('Custom link'),
      '#description' => $this->t('My custom module block link'),
      '#default_value' => isset($config['custom_block_link']) ? $config['custom_block_link'] : ''
    ];

    // Textarea
    $form['custom_block_text'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Custom block text'),
      '#description' => $this->t('My custom module block text'),
      '#default_value' => isset($config['custom_block_text']) ? $config['custom_block_text'] : ''
    ];

    // HTML
    $form['custom_block_html'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Custom block html'),
      '#description' => $this->t('My custom module block html'),
      '#format' => 'plain_text',
      '#default_value' => isset($config['custom_block_html']) ? $config['custom_block_html'] : ''
    ];

    return $form;
  }

  /**
   * @inheritDoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // TODO: Implement submitForm() method.
  }
}
