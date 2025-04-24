<?php 
include 'connection.php';

$result = $conn->query("SELECT * FROM poll_options");
$totalvotes =0;
$options = [];

while($row = $result->fetch_assoc()){
    $options[] = $row;
     $totalvotes += $row['votes'];

}

echo '<h2>Poll Result</h2>';
foreach($options as $option){
    $percentage = ($totalvotes > 0) ? ($option['votes'] / $totalvotes) * 100 : 0;
    echo '<p>'.$option['option_text'].' : '.$option['votes'].' votes ('.number_format($percentage, 2).'% of total votes)</p>';
}

echo '<p>Total votes: '.$totalvotes.'</p>';
echo "<ul>";
echo '<p>Thank you for voting!</p>';
echo '<a href="index.php">Back to Poll</a>';
?>