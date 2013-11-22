<h1>Registration</h1>

<?php if ($sf_user->getFlash('notice')): ?>
    <p class="text-success"><?php $sf_user->getFlash('notice') ?></p>
<?php elseif ($form->hasErrors()): ?>
    <p class="text-danger">An error occured</p>
<?php endif; ?>

<form method="post" action="">
    <?php include_partial('formField', array('formField' => $form['first_name'])) ?>
    <?php include_partial('formField', array('formField' => $form['last_name'])) ?>
    <?php include_partial('formField', array('formField' => $form['email_address'])) ?>
    <?php include_partial('formField', array('formField' => $form['username'])) ?>
    <?php include_partial('formField', array('formField' => $form['password'])) ?>
    <?php include_partial('formField', array('formField' => $form['password_again'])) ?>
    <?php echo $form->renderHiddenFields() ?>
    <input type="submit">
</form>