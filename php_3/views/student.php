<?php 
    $is_image=$url=="/student/image";
    $is_info=$url=="/student/info";
    ?>
<h1>Король Стейтен-Айленда</h1>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?php if ($is_image) { ?>active<?php } ?>" href="/student/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($is_info) { ?>active<?php } ?>" href="/student/info">Описание</a>
  </li>
</ul>


<ul class="list-group">
  <li class="list-group-item">
    
    <?php 
    
    if ($is_image) { ?>
        <img src="/images/student.jpg" alt="" style="height: 350px"><?php 
    } elseif ($is_info) {
        require "../views/student-about.php";
    }
 ?>
  </li>
</ul>