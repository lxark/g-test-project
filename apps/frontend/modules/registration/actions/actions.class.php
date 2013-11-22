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

    // Handle form
    if ($request->isMethod(sfWebRequest::POST))
    {
        // Bind form
        $this->form->bind($request->getParameter($this->form->getName()));
        if ($this->form->isValid())
        {
            // Save and notifies event that send email
            $user = $this->form->save();
            $this->dispatcher->notify(new sfEvent($this, 'user.created', array('user' => $user)));

            // Redirect
            $this->getUser()->setFlash('notice', 'User was successfully registered!');
            $this->redirect('registration_form');
        }
    }
  }
}
