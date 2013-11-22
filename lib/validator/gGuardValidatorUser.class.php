<?php

/**
 * Class gGuardValidatorUser
 */
class gGuardValidatorUser extends sfGuardValidatorUser
{

  protected function doClean($values)
  {
    $username = isset($values[$this->getOption('username_field')]) ? $values[$this->getOption('username_field')] : '';
    $password = isset($values[$this->getOption('password_field')]) ? $values[$this->getOption('password_field')] : '';

    $allowEmail = sfConfig::get('app_sf_guard_plugin_allow_login_with_email', true);
    $method = $allowEmail ? 'retrieveByUsernameOrEmailAddress' : 'retrieveByUsername';

    // don't allow to sign in with an empty username
    if ($username)
    {
       if ($callable = sfConfig::get('app_sf_guard_plugin_retrieve_by_username_callable'))
       {
           $user = call_user_func_array($callable, array($username));
       } else {
           $user = $this->getTable()->$method($username);
       }
        // user exists?
       if($user)
       {
          // password is ok?
          if ($user->getIsActive() && $user->checkPassword($password))
          {
            return array_merge($values, array('user' => $user));
          }
       }
    }

    if ($this->getOption('throw_global_error'))
    {
      throw new sfValidatorError($this, 'invalid');
    }

    throw new sfValidatorErrorSchema($this, array($this->getOption('username_field') => new sfValidatorError($this, 'invalid')));
  }
}
