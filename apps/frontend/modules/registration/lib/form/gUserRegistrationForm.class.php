<?php

/**
 * gUserRegistrationForm for admin generators
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class gUserRegistrationForm extends BasesfGuardUserAdminForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
      unset(
          $this['last_login'],
          $this['created_at'],
          $this['updated_at'],
          $this['salt'],
          $this['algorithm'],
          $this['groups_list'],
          $this['permissions_list']
      );

      $this->validatorSchema['first_name']->setOption('required', true);
      $this->validatorSchema['last_name']->setOption('required', true);
  }
}
