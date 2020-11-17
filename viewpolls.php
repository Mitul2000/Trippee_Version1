<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

if(isset($_POST)){
    $tripid = $_POST['tripid'];    
}


$sql_data = $mysqli -> query("SELECT p.*, GROUP_CONCAT(pa.options ORDER BY pa.pollid) AS answers FROM `polls` AS p LEFT JOIN `poll_answers` AS pa ON pa.pollid = p.pollid WHERE p.tripid = '$tripid' GROUP BY p.pollid");
?>
  
<div class="content home">
    <h2>Polls</h2>
    <p>Welcome to the polls page, you can view the list of polls below.</p>
    <form method="post" action="createpoll.php">
        <?php        
            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        ?>
    <input id="submit" type="submit" value="Create Poll">
    </form>
    <table>
        <thead>
            <tr>
                <td>Question</td>
                <td>Answers</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php while($poll = $sql_data->fetch_assoc()){?>
            <tr>
                <td><?=$poll['question']?></td>
                <td><?=$poll['answers']?></td>
                <td>
                    <form method="post" action="vote.php">
                        <?php
                            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
                            echo '<input type="hidden" name="pollid" value="'.$poll['pollid'].'">';
                        ?>
                        <input id="submit" type="submit" value="Answer Poll">
                    </form>
                    </td>
                    <td>
                    <form method="post" action="deletepoll.php">
                        <?php
                            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
                            echo '<input type="hidden" name="pollid" value="'.$poll['pollid'].'">';
                        ?>
                        <input id="submit" type="submit" value="Delete Poll">
                    </form>
            </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>