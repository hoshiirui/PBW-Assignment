<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
include 'function.php';


// Function to retrieve komentar recursively
function getkomentar($topicId, $parentId = 0, $indent = 0) {
    global $conn;
    $sql = "SELECT * FROM komentar INNER JOIN user ON komentar.iduser=user.iduser WHERE idtopik = $topicId AND idsebelum = $parentId";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        // echo str_repeat('&nbsp;&nbsp;', $indent) . $row['isikomentar'] . '<br>';
        ?>
            <div class="comment-card" style="margin-left: <?php echo $indent*20 ?>px; margin-top: 20px; margin-bottom: 20px">
                <img src="img/<?php echo $row['pp'] ?>" width="50" height="50" style="border-radius: 1000px">
                <div class="comment-tulisan">
                    <div class="comment-timestamp">
                        <?php
                            if($parentId != 0){
                                ?>
                                    <p class="comment-uname"><?php echo $row['namauser'] ?> replied</p>
                                <?php
                            }else{
                        ?>
                        <p class="comment-uname"><?php echo $row['namauser'] ?> commented</p>
                        <?php
                            }
                        ?>
                        <p class="comment-uname"><?php echo $row['waktukomentar'] ?></p>
                    </div>
                    <div class="comment-timestamp">
                        <p class="comment-content"><?php echo $row['isikomentar'] ?></p>
                        <p class="comment-reply" id="trigger<?php echo $row['idkomentar'] ?>" onclick="tampilreply(this.id)">Reply</p>
                    </div>
                </div>
            </div>

            <!-- commentar reply -->
            <form action="" id="komentar<?php echo $row['idkomentar'] ?>" method="post" style="margin-left: <?php echo $indent*20 ?>px" hidden>
                <input type="hidden" name="topic_id" value="<?php echo $row['idtopik']; ?>">
                <input type="hidden" name="parent_id" value="<?php echo $row['idkomentar']; ?>">
                <div class="comment-timestamp">
                    <textarea name="content" class="reply-text" required></textarea>
                    <button type="submit" name="add_comment">Reply Comment</button>
                </div>
            </form>
    
        <?php
        getkomentar($topicId, $row['idkomentar'], $indent + 1);
    }
}

// Create a new topic
if (isset($_POST['create_topic'])) {
    $title = $_POST['title'];

    $sql = "INSERT INTO topik (judultopik, waktutopik, iduser) VALUES ('$title', NOW(), '$_SESSION[username]')";
    $conn->query($sql);
}

// Add a new comment
if (isset($_POST['add_comment'])) {
    $topicId = $_POST['topic_id'];
    $parentId = $_POST['parent_id'];
    $content = $_POST['content'];

    $sql = "INSERT INTO komentar (idtopik, idsebelum, isikomentar, waktukomentar, iduser) 
            VALUES ('$topicId', '$parentId', '$content', NOW(), '$_SESSION[username]')";
    $conn->query($sql);
}

// Retrieve topik
$sql = "SELECT * FROM topik ORDER BY waktutopik DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Forum</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Simple Forum</h1>
    <a href="logout.php"><button type="button" name="logout">Log Out</button></a>

    <!-- Create a new topic -->
    <form action="" method="post">
        <label for="title">Topic Title:</label>
        <input type="text" name="title" required>
        <button type="submit" name="create_topic">Create Topic</button>
    </form>

    <!-- Display existing topik -->
    <?php while ($row = $result->fetch_assoc()) { ?>
        <h2><?php echo $row['judultopik']; ?></h2>
        <form action="" method="post">
            <input type="hidden" name="topic_id" value="<?php echo $row['idtopik']; ?>">
            <input type="hidden" name="parent_id" value="0">
            <div class="comment-timestamp">
                <textarea name="content" class="reply-text" required></textarea>
                <button type="submit" name="add_comment">Add Comment</button>
            </div>
        </form>
        <?php getkomentar($row['idtopik']); ?>
    <?php } ?>

</body>
<script>
    function tampilreply(idnya){
        var idnya = "komentar" + idnya.replace("trigger", "");
        document.getElementById(idnya).style.display = "block";
    }
</script>
</html>

<?php
// Close the database connection
$conn->close();

