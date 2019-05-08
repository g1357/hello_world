<?php

namespace Drupal\hello_world\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Определение формы конфигурации для приветсвенного сообщения.
 */
class SatulationConfigurationForm extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['hello_world.custom_salutation'];
  }

  /**
   * {@inheritdoc}
   */
  public function  getFormId() {
    return 'salutation_configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function  buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('hello_world.custom_salutation');

    $form['salutation'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Salutation'),
      '#description' => $this->t('Please provide the salutation you want to use.'),
      "#default_value" => $config->get('salutation')
    );
    return parent::biuldForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function  submitdForm(array $form, FormStateInterface $form_state) {
    $this->config('hello_world.custom_salutation')
      -> set('salutation', $form_state->getValue('salutation'))
      -> save();

    parent::submitForm($form, $form_state);
  }
}
