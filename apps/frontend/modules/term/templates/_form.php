<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('term/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('term/index') ?>">Cancel</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'term/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
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

<script type="text/javascript">

jQuery(document).ready(function() {

    jQuery('#mycarousel').jcarousel({
        vertical: true,
        scroll: 1
    });
});
</script>

<?php slot('leftBar') ?>
  <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
      <?php
        if($terms)
        {
          foreach($terms as $key=>$term)
          {
            if($key%28 == 0) { echo '</li>'; }
            if($key%28 == 0 || $key == 0) { echo '<li>'; }

            echo '<p>'.link_to($term->getWord(), '@term?term='.$term->getSlug()).'</p>';
          }
        }
      ?>
  </ul>
<?php end_slot() ?>