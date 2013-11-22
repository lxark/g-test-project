<?php

/**
 * authentication actions.
 *
 * @package    G-test-project
 * @subpackage authentication
 * @author     alix.chaysinh@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class authenticationActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfWebRequest $request A request object
     */
  public function executeRequest(sfWebRequest $request)
  {
    sfConfig::set('sf_web_debug', false);
    $query = array(
        'message' => 'Wrong parameters',
        'success' => 'false'
    );

    $email = $request->getParameter('email');
    $pass  = $request->getParameter('password');

    if ($email && $pass)
    {
      $admin = sfGuardUserTable::getInstance()->findOneAdminByEmail($email);

      if ($admin && $admin->checkPassword($pass))
      {
        $query = array(
           'token'   => 'TOKEN',
           'message' => 'success',
           'success' => 'true',
        );
      }
      else
      {
        $query['message'] = 'Could not find user';
      }
    }

    return $this->renderText(http_build_query($query));
  }
}
