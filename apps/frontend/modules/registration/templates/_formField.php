<div class="form-group<?php $formField->hasError() and print ' errors' ?>">
    <?php echo $formField->renderLabel() ?>
    <?php echo $formField->render() ?>
</div>