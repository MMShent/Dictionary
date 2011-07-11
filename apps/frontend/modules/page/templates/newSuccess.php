<h1>New Term</h1>

<?php echo $sf_user->getFlash('new');?>

<?php include_partial('form', array('form' => $form, 'terms' => $terms)) ?>
