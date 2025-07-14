<?php
require_once 'core/init.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_comment_id'])) {
    $commentIdToDelete = (int) $_POST['delete_comment_id'];
    $ticketing = new ticketing();
    $currentUser = new User();
    $currentUserID = $currentUser->data()->User_ID;
    echo'have data</br>';
    try {
        echo'in try';
            $ticketing->deleteComment($commentIdToDelete, $currentUserID);
            // Redirect of geef een succesmelding
            header("Location: " . $_SERVER['HTTP_REFERER']);
            echo'end try</br>';
            exit;
    } catch (Exception $e) {
            echo "<p style='color:red;'>Fout bij verwijderen: " . $e->getMessage() . "</p>";
    }
} else {
    // Ongeldige toegang, redirect of toon fout
    header("Location: index.php");
    exit;
}
?>