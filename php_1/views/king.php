<?php 
    $is_image=$url=="/king/image";
    $is_info=$url=="/king/info";
    ?>
<h1>Король Стейтен-Айленда</h1>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?php if ($is_image) { ?>active<?php } ?>" href="/king/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($is_info) { ?>active<?php } ?>" href="/king/info">Описание</a>
  </li>
</ul>


<ul class="list-group">
  <li class="list-group-item">
    
    <?php 
    
    if ($is_image) { ?>
        <img src="/images/king.jpg" alt="" style="height: 350px"><?php 
    } elseif ($is_info) {
        require "../views/king-about.php";
    }
 ?>
  </li>
</ul>