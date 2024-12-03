<?php
    include("header.php");
?>

<nav id="">
    <ul id="menu">
        <li id="hem"><a <?php if($page == 'Home'){echo "class='active'";}?> href="index.php">Home</a></li>
        <li id="produkt"><a <?php if($page == 'produkter'){echo "class='active'";}?> href="category.php">Category</a></li>
        <li id="kontakt"><a <?php if($page == 'kontakt'){echo "class='active'";}?> href="kontakt.php">Contact</a></li>
        <li id="about" ><a <?php if($page == 'about'){echo "class='active'";}?> href="about.php">About</a></li>

        <ul id="sign_menu_design">
            <li><a <?php if($page == 'cart'){echo "class='active'";}?> href="cart_check.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
            <?php
                if (isset($_SESSION['UserID']) && !isset($_SESSION['AdminID'])) { ?>

                    <div id='signin_menu'><a <?php if($page == 'UserPage'){echo "class='active'";}?> href='UserPage.php'>User Profile</a></div>
                    <div id='signup_menu'><a href='logout.php'>Logout</a></div>
                <?php } elseif (!isset($_SESSION['UserID']) && isset($_SESSION['AdminID'])) { ?>

                    <div id='signin_menu'><a <?php if($page == 'AdminPage'){echo "class='active'";}?> href='AdminPage.php'>Admin Profile</a></div>
                    <div id='signup_menu'><a href='logout.php'>Logout</a></div>
                <?php } else { ?>

                    <div id='signin_menu'><a <?php if($page == 'signin'){echo "class='active'";}?> href='signin.php'>Sign in</a></div>
                    <div id='signup_menu'><a <?php if($page == 'signup'){echo "class='active'";}?> href='signup.php'>Sign up</a></div>
                <?php }?>
        </ul>

        <form id="search_form" action="search.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="search_name" id="search_input">
            <input type="submit" name="search"  id="search_button" value="Search">
        </form>
    </ul>
</nav>
