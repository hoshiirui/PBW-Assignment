<?php
    session_start();
    include 'function.php';

    if (isset($_POST['login-button'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
    
        $sql = "SELECT * FROM user WHERE iduser='$username' AND passworduser='$password'";
        $logincheck = mysqli_query($conn, $sql);
        if(mysqli_num_rows($logincheck)>=1){
            $hasilcheck = mysqli_fetch_assoc($logincheck);

            $_SESSION['username'] = $hasilcheck['iduser'];
            echo $sql;
            header("Location: index.php");
        }else{
            ?>
                <script>
                    alert("Username atau password salah!");
                </script>
            <?php
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Forum | Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Login</h1>

    <!-- Create a new topic -->
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" required>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <button type="submit" name="login-button">Login</button>
    </form>

</body>
</html>

<?php
// Close the database connection
$conn->close();

