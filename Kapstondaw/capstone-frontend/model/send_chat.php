<?php
    include "../server/server.php";

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    if (isset($_POST['message'])) {
        $message = $_POST['message'];
        $from = $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname'];

        $stmt = $conn->prepare("INSERT INTO chat_messages (messages, `from`) VALUES (?,?)");
        $stmt->bind_param("ss", $message, $from);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        // Redirect back to the main chat page
        header('Location: ../main.php');
        exit();
    }
?>