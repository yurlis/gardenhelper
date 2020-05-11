<ul class="nav">

    <li class="nav-item <?php if($page == "home"){ echo 'active';} ?>">
        <a class="nav-link" href="/admin">
            <i class="nc-icon nc-chart-pie-35"></i>
            <p>Главная</p>
        </a>
    </li>
    <li class="nav-item <?php if($page == "products"){ echo 'active';} ?>">
        <a class="nav-link" href="products.php">
            <i class="nc-icon nc-app"></i>
            <p>Список растений</p>
        </a>
    </li>
    <li class="nav-item <?php if($page == "facilities"){ echo 'active';} ?>">
        <a class="nav-link" href="facilities.php">
            <i class="nc-icon nc-app"></i>
            <p>Список средств</p>
        </a>
    </li>
    <li class="nav-item <?php if($page == "categories"){ echo 'active';} ?>">
        <a class="nav-link" href="category.php">
            <i class="nc-icon nc-bullet-list-67"></i>
            <p>Список сортов</p>
        </a>
    </li>

    <li class="nav-item <?php if($page == "order"){ echo 'active';} ?>">
        <a class="nav-link" href="order.php">
            <i class="nc-icon nc-watch-time"></i>
            <p>Записи в календарь</p>
        </a>
    </li>
    <li class="nav-item <?php if($page == "log out"){ echo 'active';} ?>">
        <a class="nav-link" href="logout.php">
            <i class="nc-icon nc-refresh-02"></i>
            <p>Выход</p>
        </a>
    </li>

</ul>