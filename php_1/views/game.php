<?php 
    $is_image=$url=="/game/image";
    $is_info=$url=="/game/info";
    ?>
<h1>Игра в кальмара</h1>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?php if ($is_image) { ?>active<?php } ?>" href="/game/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($is_info) { ?>active<?php } ?>" href="/game/info">Описание</a>
  </li>
</ul>


<ul class="list-group">
  <li class="list-group-item">
    
    <?php 
    
    if ($is_image) { ?>
        <img src="/images/gra-v-kalmara.jpg" alt="" style="height: 350px"><?php 
    } elseif ($is_info) {
        require "../views/game-about.php";
    }
 ?>
  </li>
</ul>
