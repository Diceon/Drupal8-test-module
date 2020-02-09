<?php

namespace Drupal\my_custom_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;


/**
 * Provides a 'Custom' Block.
 *
 * @Block(
 *   id = "my_custom_module_custom_block",
 *   admin_label = @Translation("Custom block"),
 *   category = @Translation("Custom block"),
 * )
 */
class CustomBlock extends BlockBase implements BlockPluginInterface
{

  /**
   * @inheritDoc
   */
  public function build()
  {
    $config = $this->getConfiguration();

    $html = $config['custom_block_html']['value'];

    return [
      '#markup' => $this->t("<strong>Link:</strong><div><a href='@link'>@link</a></div><strong>Text:</strong><div>@text</div><strong>HTML:</strong><div>$html</div>", [
        '@link' => $config['custom_block_link'],
        '@text' => $config['custom_block_text'],
        '@html' => $config['custom_block_html']['value']
      ])
    ];
  }

  public function blockForm($form, FormStateInterface $form_state)
  {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();
    $form['custom_block_link'] = [
      '#type' => 'url',
      '#title' => $this->t('Custom link'),
      '#description' => $this->t('My custom module block link'),
      '#default_value' => isset($config['custom_block_link']) ? $config['custom_block_link'] : ''
    ];

    $form['custom_block_text'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Custom block text'),
      '#description' => $this->t('My custom module block text'),
      '#default_value' => isset($config['custom_block_text']) ? $config['custom_block_text'] : ''
    ];

    $form['custom_block_html'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Custom block html'),
      '#description' => $this->t('My custom module block html'),
      '#default_value' => isset($config['custom_block_html']) ? $config['custom_block_html']['value'] : ''
    ];


    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state)
  {
    parent::blockSubmit($form, $form_state);

    $values = $form_state->getValues();

    $this->configuration['custom_block_link'] = $values['custom_block_link'];
    $this->configuration['custom_block_text'] = $values['custom_block_text'];
    $this->configuration['custom_block_html'] = $values['custom_block_html'];
  }
}
