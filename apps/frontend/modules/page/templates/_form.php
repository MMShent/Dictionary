<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('page/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('@homepage') ?>">Cancel</a>
          <input type="submit" value="<?php echo $form->getObject()->isNew() ? 'Save' : 'Verify' ?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['word']->renderLabel() ?></th>
        <td>
          <?php echo $form['word']->renderError() ?>
          <?php echo $form['word'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['definition']->renderLabel() ?></th>
        <td>
          <?php echo $form['definition']->renderError() ?>
          <?php echo $form['definition'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['example']->renderLabel() ?></th>
        <td>
          <?php echo $form['example']->renderError() ?>
          <?php echo $form['example'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['authorName']->renderLabel() ?></th>
        <td>
          <?php echo $form['authorName']->renderError() ?>
          <?php echo $form['authorName'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['authorEmail']->renderLabel() ?></th>
        <td>
          <?php echo $form['authorEmail']->renderError() ?>
          <?php echo $form['authorEmail'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
