<?php

class pageComponents extends sfComponents
{

  public function executeSlider(sfWebRequest $request)
  {
    $this->terms = Doctrine::getTable('Term')->getTerms4Slider();
  }

}
?>
