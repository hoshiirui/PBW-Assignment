<?php
    require 'function.php';
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $amount = isset($_GET['q'])?(int)$_GET['q'] : 10;

    $checkmaxpage = mysqli_query($conn, "SELECT count(*) AS jumlah from user");
    $checkresult = mysqli_fetch_assoc($checkmaxpage);
    if($checkresult['jumlah'] == $amount){
        $maxpage = intdiv($checkresult['jumlah'], $amount);
    }else{
        $maxpage = intdiv($checkresult['jumlah'], $amount)+1;
    }
    

    if($halaman<1){
        $halaman = 1;
    }
    if(($halaman * $amount - $amount) > $checkresult['jumlah']){
        $halaman = $maxpage;
    }

    $beginning = ($halaman>1) ? ($halaman * $amount) - $amount : 0;
    $query = "SELECT * FROM user LIMIT $beginning, $amount";
    $data_buku = mysqli_query($conn, $query); // Query data buku
    $numbering = $beginning+1;
   
?>

<html>
    <head>
        <!-- Meta Tags -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Title -->
        <title>Data User SIPOMAS</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="https://img.icons8.com/doodle/1x/bookshop.png" type="image/x-icon">

        <!-- Style -->
        <link rel="stylesheet" href="style.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>

        <!-- Tabel data buku -->
        <table class="tabel-buku">
            <tr>
                <th colspan="4" class="header-text">All User Data</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Display Name</th>
                <th>Email</th>
                <th>Role</th>
                <!-- <th colspan="2"></th> -->
            </tr>
            <!-- Looping data buku -->
            <?php $i = 1; ?>
            <?php while($data = mysqli_fetch_assoc($data_buku)) : ?>
                <tr>
                    <td><?= $numbering++ ?></td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['role']?></td>
                </tr>
            <?php endwhile; ?>
            <!-- End looping -->
            <tr>
                <td colspan="2">
                    Pagination: 
                    <a href="?halaman=1&q=<?= $amount ?>" class="add-btn">First</a>
                    <a href="?halaman=<?= $halaman-1 ?>&q=<?= $amount ?>" class="add-btn">Prev</a>
                    <?php
                        for($x=1; $x<=$maxpage; $x++){
                    
                    ?>
                        <a href="?halaman=<?= $x ?>&q=<?= $amount ?>" class="add-btn"><?= $x ?></a>
                    <?php
                        }
                    ?>
                    <a href="?halaman=<?= $halaman+1 ?>&q=<?= $amount ?>" class="add-btn">Next</a>
                    <a href="?halaman=<?= $maxpage ?>&q=<?= $amount ?>" class="add-btn">Last</a>
                </td>
                <td colspan="2">
                    Amount:
                    <a href="?halaman=<?= $halaman ?>&q=10" class="add-btn">10</a>
                    <a href="?halaman=<?= $halaman ?>&q=25" class="add-btn">25</a>
                    <a href="?halaman=<?= $halaman ?>&q=50" class="add-btn">50</a>
                    <a href="?halaman=<?= $halaman ?>&q=100" class="add-btn">100</a>
                    <a href="?halaman=<?= $halaman ?>&q=<?= $checkresult['jumlah'] ?>" class="add-btn">All</a>
                </td>
            </tr>
        </table>
    </body>
</html>