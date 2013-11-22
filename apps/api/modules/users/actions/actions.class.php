<?php

/**
 * users actions.
 *
 * @package    G-test-project
 * @subpackage users
 * @author     alix.chaysinh@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usersActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->getResponse()->setContentType('application/json');

    $users = sfGuardUserTable::getInstance()->findAll();

    return $this->renderText(json_encode($users->toArray()));
  }
}
