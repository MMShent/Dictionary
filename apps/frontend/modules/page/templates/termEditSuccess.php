<h1>Edit Term</h1>

<?php echo $sf_user->getFlash('new');?>

<?php include_partial('form', array('form' => $form, 'terms' => $terms)) ?>