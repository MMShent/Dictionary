<table cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th>Id</th>
      <th>Word</th>
      <th>Author name</th>
      <th>Likes</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($term_list as $term): ?>
    <tr>
      <td><a href="<?php echo url_for('term/edit?id='.$term->getId()) ?>"><?php echo $term->getId() ?></a></td>
      <td><?php echo $term->getWord() ?></td>
      <td><?php echo $term->getAuthorName() ?></td>
      <td><?php echo $term->getLikes() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>