<?php

/**
 * registration actions.
 *
 * @package    G-test-project
 * @subpackage registration
 * @author     alix.chaysinh@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registrationActions extends sfActions
{
 /**
  * Executes form action
  *
  * @param sfRequest $request A request object
  */
  public function executeForm(sfWebRequest $request)
  {
    $this->form = new gUserRegistrationForm();
  }
}
