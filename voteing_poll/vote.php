<?php 
include 'connection.php';

$vote = $_POST['vote'] && is_numeric($_POST['vote']);{
    $vote = $_POST['vote'];

if(is_numeric($vote)){
    $stmt = $conn->prepare("UPDATE poll_options set votes = votes +1 Where id = ?");
    $stmt->bind_param("i", $vote);
    $stmt->execute();

//set cookie for 1 day
    setcookie("voted", "true", time() + (86400 * 1), "/"); // 86400 = 1 day

    
    
}

}

include 'poll_result.php';

?>