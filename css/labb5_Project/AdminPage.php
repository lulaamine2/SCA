
<?php
    $page = 'AdminPage';
    include("includes/connect.php");
    include("menu.php");
?>    


<div id="admin_div">
    <li>
    <?php
            if (isset($_SESSION['AdminID'])) { ?>
                <a href="javascript:void(0);" onclick="loadPage('Admin_user.php')">Home</a>
                <?php } else {
                    echo "Error";
                }
        ?>
    </li>
    <li>
        <?php
                if (isset($_SESSION['AdminID'])) { ?>
                    <a href="javascript:void(0);" onclick="loadPage('Admin_users.php')">Users</a>
            <?php } else {
                    echo "Error";
                }
        ?>
    </li>
    <li>
        <?php
            if (isset($_SESSION['AdminID'])) { ?>
                <a href="javascript:void(0);" onclick="loadPage('creat_product.php')">Creat Product</a>

            <?php } else {
                echo "Error";
            }
        ?>
    </li>
</div>


<h1>
    Welcome to Admin Page
    <span id="span"><?php echo $_SESSION['AdminID']; ?></span>
</h1>

<iframe id="contentFrame" src="" frameborder="0"></iframe>




<script>
        function loadPage(page) {
            document.getElementById('contentFrame').src = page;
        }
</script>