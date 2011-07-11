<?php
  if($terms)
  {
    $items = array();
    $i = 0;
    foreach($terms as $key=>$term)
    {
      $items[$i][] = $term;
      if($key%10 == 9)
      {
        $i++;
      }
    }

    foreach($items as $index=>$template)
    {
      include_partial('page/charColumn', array('terms' => $items[$index]));
    }
  }
?>
<div class="clear"></div>