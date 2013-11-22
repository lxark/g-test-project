<h1>Registration</h1>
<form>
    <?php include_partial('formField', array('formField' => $form['first_name'])) ?>
    <?php include_partial('formField', array('formField' => $form['last_name'])) ?>
    <?php include_partial('formField', array('formField' => $form['email_address'])) ?>
    <?php include_partial('formField', array('formField' => $form['username'])) ?>
    <?php include_partial('formField', array('formField' => $form['password'])) ?>
    <?php include_partial('formField', array('formField' => $form['password_again'])) ?>
</form>