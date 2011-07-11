
<div class="page">
  <?php
    if(count($terms) > 0)
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
    }else
    {
      echo '<strong>'.$sf_params->get('term').'</strong> <span>isn\'t defined </span>'. 
              link_to('yet', 'page/new', array('class' => 'underlined'));
    }
  ?>
  <div class="clear"></div>

</div>