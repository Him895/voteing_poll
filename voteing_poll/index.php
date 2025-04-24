<?php 
include 'connection.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="poll_container">
    <h2>who is your favourate cricketer</h2>
    <form id="pollForm" method="POST" action="">
       <?php
       
       $result = $conn->query("SELECT * FROM poll_options");
       while ($row = $result->fetch_assoc()) {
        echo '<label><input type="radio" name="vote" value="'.$row['id'].'"> <span class="player-name">'.$row['option_text'].'</span></label><br>';

       }
    
       ?>
       <br>
       <button type="submit">Submit Vote</button>
    </form>
    <div id="result"></div>
    </div>

<script>
      
    document.getElementById('pollForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        const formData = new FormData(this);
        fetch('vote.php',{
            method: 'POST',
            body: formData
            
        })
        .then(response=>response.text())
        .then(data=>{
            document.getElementById('result').innerHTML = data;
            
            document.getElementById('pollForm').remove(); // Remove the form after submission
            


        });
      
    });
</script>
    
</body>
</html>