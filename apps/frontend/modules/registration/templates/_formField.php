<div class="form-group<?php $formField->hasError() and print ' has-error' ?>">
    <?php echo $formField->renderError() ?>
    <?php echo $formField->renderLabel(null, array('class' => 'control-label')) ?>
    <?php echo $formField->render(array('class' => 'form-control')) ?>
</div>