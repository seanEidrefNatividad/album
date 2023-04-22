<?php include 'template/header.php';?>


    <div class="register_div1">
        <form action="../controller/create.php" method="post">
            <div class="register_div2">
                <input id="login_tb_username" class="login_tb" type="text" id="username" name="username" placeholder="Username" autocomplete="off">
                <input class="login_tb" type="password" id="password" name="password" placeholder="Password" autocomplete="off">
                <button class="login_btn btn btn-success" type="submit" name="submit">Sign Up</button>   
            </div>
        </form>
    </div>
    
    <?php include 'template/register_validate.php';?>

<?php include 'template/footer.php';?>
