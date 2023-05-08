<?php

namespace Drupal\newsletter_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

/*
 *
 */
class NewsletterForm extends FormBase {
  /*
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'newsletter-form';
  }
  /*
   *
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['nom'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Votre nom'),
      '#placeholder' => $this
        ->t('Martin'),
      '#size' => 60,
      '#maxlength' => 128,
      '#required' => TRUE,
      '#attributes' => [
        'class' => [
          'form-control',
        ],
      ],
    );

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Votre adresse email'),
      '#placeholder' => $this
        ->t('dupont.martin@gmail.com'),
      '#required' => TRUE,
      '#attributes' => [
        'class' => [
          'form-control',
        ],
      ],
    ];

    $form['gender'] = array(
      '#type' => 'select',
      '#title' => $this->t('Civilité'),
      '#options' => array(
        'monsieur' => $this->t('Monsieur'),
        'madame' => $this->t('Madame'),
      ),
      '#required' => TRUE,
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('SEND'),
      '#button_type' => 'btn-primary',
      '#attributes' => [
        'class' => [
          'form-control',
        ],
      ],
    ];

    return $form;
  }

  /*
   *
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    // On récupere le champ email 
    $email = $form_state->getValue('email');

    // validation de l'email par les fonctions php
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // Si l'adresse e-mail n'est pas valide on rentre dans l'erreur
      $form_state->setErrorByName('email', $this->t('Invalid email address'));
    } 
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Récupération des champs par le formstate
    $nom = $form_state->getValue('nom');
    $email = $form_state->getValue('email');
    $gender = $form_state->getValue('gender');
    $timestamp = time();

    //On assigne les champs correspondant pour créer le node
    $node_in = Node::create([
      'type'        => 'inscription_newsletter',
      'title'       => $email . '_' . $timestamp,
      'field_in_name'=> $nom,
      'field_in_mail'=> $email,
      'field_in_gender'=> $gender,
    ]);
    $node_in->save();

    // Redirection vers la page d'accueil
    $form_state->setRedirect('<front>', [], ['query' => ['message' => \Drupal::service('messenger')->addStatus("Votre soumission a bien été prise en compte.")]]);
  }
  
 
}



