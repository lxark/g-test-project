<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');

    // Events
    $dispatcher = $this->getEventDispatcher();
    $dispatcher->connect('user.created', array('UserListener', 'sendRegistrationEmail'));
  }
}
