<?php
    include "header.php";
?>

<div class="container" style="padding-bottom: 250px;">
    <h2 style="width: 100%; border-bottom: 4px solid #2341d6;"><b>Login</b></h2>
    <?php
        if (array_key_exists('error', $_GET)) {
            echo "
                <p style='color: red;'>Salah Username atau Password</p>
            "; 
        }
    ?>

    <form action="proses/login.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username" style="width: 500px;">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password" style="width: 500px;">
        </div>
        <button type="submit" class="btn btn-success">Login</button>
        <a href="register.php" class="btn btn-primary">Daftar</a>
    </form>
</div>

<?php
    include "footer.php";
?>