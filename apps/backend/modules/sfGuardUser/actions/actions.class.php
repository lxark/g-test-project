<?php

require_once(sfConfig::get('sf_plugins_dir').'/sfDoctrineGuardPlugin/modules/sfGuardUser/lib/BasesfGuardUserActions.class.php');

class sfGuardUserActions extends BasesfGuardUserActions
{
    /**
     * Ugly override to notify user created
     *
     * @param sfWebRequest $request
     * @param sfForm $form
     * @return string
     */
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $created = $form->getObject()->isNew();
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {
                $sf_guard_user = $form->save();
            } catch (Doctrine_Validator_Exception $e) {

                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors) {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $sf_guard_user)));

            // Override
            if ($created)
            {
                $this->dispatcher->notify(new sfEvent($this, 'user.created', array('user' => $sf_guard_user)));
            }


            if ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

                $this->redirect('@sf_guard_user_new');
            }
            else
            {
                $this->getUser()->setFlash('notice', $notice);

                $this->redirect(array('sf_route' => 'sf_guard_user_edit', 'sf_subject' => $sf_guard_user));
            }
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }
}