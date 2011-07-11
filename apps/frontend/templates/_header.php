<div id="header">
    <h1><a href="<?php echo url_for('@homepage')?>">Tacticaldictionary.com</a></h1>
    <?php include_partial('global/search')?>

    <div id="letters" class="rounded">
        <a href="<?php echo url_for('@char?char=a')?>">A</a>
        <a href="<?php echo url_for('@char?char=b')?>">B</a>
        <a href="<?php echo url_for('@char?char=c')?>">C</a>
        <a href="<?php echo url_for('@char?char=d')?>">D</a>
        <a href="<?php echo url_for('@char?char=e')?>">E</a>
        <a href="<?php echo url_for('@char?char=f')?>">F</a>
        <a href="<?php echo url_for('@char?char=g')?>">G</a>
        <a href="<?php echo url_for('@char?char=h')?>">H</a>
        <a href="<?php echo url_for('@char?char=i')?>">I</a>
        <a href="<?php echo url_for('@char?char=j')?>">J</a>
        <a href="<?php echo url_for('@char?char=k')?>">K</a>
        <a href="<?php echo url_for('@char?char=l')?>">L</a>
        <a href="<?php echo url_for('@char?char=m')?>">M</a>
        <a href="<?php echo url_for('@char?char=n')?>">N</a>
        <a href="<?php echo url_for('@char?char=o')?>">O</a>
        <a href="<?php echo url_for('@char?char=p')?>">P</a>
        <a href="<?php echo url_for('@char?char=q')?>">Q</a>
        <a href="<?php echo url_for('@char?char=r')?>">R</a>
        <a href="<?php echo url_for('@char?char=s')?>">S</a>
        <a href="<?php echo url_for('@char?char=t')?>">T</a>
        <a href="<?php echo url_for('@char?char=u')?>">U</a>
        <a href="<?php echo url_for('@char?char=v')?>">V</a>
        <a href="<?php echo url_for('@char?char=w')?>" class="active">W</a>
        <a href="<?php echo url_for('@char?char=x')?>">X</a>
        <a href="<?php echo url_for('@char?char=y')?>">Y</a>
        <a href="<?php echo url_for('@char?char=z')?>">Z</a>
        <a href="<?php echo url_for('@char?char=0')?>">#</a>
        <?php
          if($sf_user->isAuthenticated())
          {
            echo link_to('new', 'term/new');
            echo link_to('logout', 'security/signout');
          } else
          {
            echo link_to('new', 'page/new');
          }
        ?>
    </div>
</div>