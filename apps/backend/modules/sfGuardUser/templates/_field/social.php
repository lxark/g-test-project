<?php if (!$form->isNew()): ?>
    <div class="sf_admin_form_row sf_admin_text">
        <div>
          <label>Facebook id</label>
            <div class="content">
                <input type="text" readonly="readonly" value="<?php echo $form->getObject()->getFacebookId() ?>">
            </div>
        </div>
    </div>

    <div class="sf_admin_form_row sf_admin_text">
        <div>
          <label>Twitter id</label>
          <div class="content">
              <input type="text" readonly="readonly" value="<?php echo $form->getObject()->getTwitterId() ?>">
          </div>
        </div>
    </div>
<?php endif; ?>