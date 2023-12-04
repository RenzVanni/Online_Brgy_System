<header class="hide" id="website-header">

    <div class="menu">
        <img src="./assets/menu.png" alt="menu" id="menu" />
    </div>
    
    <div class="logo-container">
        <img src="../BACKENDMONATO/uploads/logo/<?php echo $brgy_logo ?>" alt="Barangay Logo" />
    </div>

    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href=" #frontendAnnouncement">Announcement</a></li>
        <li><a href=" #frontendAwareness">Awareness</a></li>
        <li><a href="#contact-us">Contact Us</a></li>
        <?php if(isset($_SESSION['username'])) { ?>
        <li><a href="./Cart.php">Request</a></li>
        <?php } ?>
    </ul>

    <div class="user">
        <?php if(isset($_SESSION['username'])) { ?>
        <p><?php echo $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname']?></p>
        <p><a href="./frontendModel/logout.php?username=<?= $_SESSION['username'] ?>">Logout</a></p>
        <?php } else {?>
            <div class="login-div">
                <p id=""><a href="./login_page.php">Login</a></p>
            </div>
        <?php } ?>
    </div>

    <div class="header-image">
        <img src="../BACKENDMONATO/uploads/logo/<?= $header_image ?>" alt="Header">
    </div>
</header>

<div class="hide subHeader" id="subHeader">
    <div class="layer1">
        <div class="logo">
            <img src="../BACKENDMONATO/uploads/logo/<?php echo $brgy_logo ?>" alt="brgy-logo" />
        </div>
        <div class="brgy">
            <span>Republic of the Philippines</span>
            <h2><?= $brgy_name. " ". $town_name. " ". $province_name?></h2>
        </div>
    </div>

    <ul class="sub-menu">
        <li><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#frontendAnnouncement">Announcement</a></li>
        <li><a href=" #frontendAwareness">Awareness</a></li>
        <li><a href="#contact-us">Contact Us</a></li>
        <?php if(isset($_SESSION['username'])) { ?>
        <li><a href="./Cart.php">Request</a></li>
        <li><?php echo $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname']?></li>
        <li><a href="./frontendModel/logout.php?username=<?= $_SESSION['username'] ?>">Logout</a></li>
        <?php } else {?>
        <li class="" id=""><a href="./login_page.php">Login</a></li>
        <?php } ?>
    </ul>
</div>

<div class="active-menu" id="active-menu">
    <div class="container" id="active-container">
        <div class="sub-container">
            <div>
                <h2 id="close-menu">x</h2>
            </div>
            <ul>
                <?php if(isset($_SESSION['username'])) { ?>
                <li><a href="./Cart.php">Request    </a></li>
                <li><?php echo $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname']?></li>
                <li><a href="./frontendModel/logout.php?username=<?= $_SESSION['username'] ?>">Logout</a></li>
                <?php } else {?>
                <li class="login" id="login">Login</li>
                <?php } ?>
                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#frontendAnnouncement">Announcement</a></li>
                <li><a href=" #frontendAwareness">Awareness</a></li>
                <li><a href="#contact-us">Contact Us</a></li>
            </ul>
        </div>
    </div>
</div>