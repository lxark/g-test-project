<?php

/**
 * gGuardUserAdminForm for admin generators
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class gGuardUserAdminForm extends BasesfGuardUserAdminForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
      $this->validatorSchema['first_name']->setOption('required', true);
      $this->validatorSchema['last_name']->setOption('required', true);

      $this->validatorSchema['email_address'] = new sfValidatorEmail(array(
          'required' => true
      ));

      $this->validatorSchema['password'] = new sfValidatorRegex(array(
          'required'   => true,
          'min_length' => 8,
          'pattern'    => '/(.)*[0-9](.)*[0-9](.)*/i'
      ));
      $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];
  }
}
