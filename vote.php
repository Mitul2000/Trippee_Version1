<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

if(isset($_POST)){
    $tripid = $_POST['tripid'];
    $pollid = $_POST['pollid']; 
}

$sql_data_poll = $mysqli -> query("SELECT * FROM polls WHERE pollid = '$pollid'");
$sql_data_answer = $mysqli -> query("SELECT * FROM poll_answers WHERE pollid = '$pollid'");

$poll = $sql_data_poll->fetch_assoc();
?>
  
<div class="content home">
    <h2><?=$poll['question'];?></h2>
    <p><?=$poll['description'];?></p>
    <form method="post" action="result.php">
        <?php        
            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
            echo '<input type="hidden" name="pollid" value="'.$pollid.'">';
            echo '<input type="hidden" name="question" value="'.$poll['question'].'">';
        ?>
        <?php while($poll_answer = $sql_data_answer->fetch_assoc()){ ?>
                    <label>
                        <input type="radio" name="poll_answer" value="<?=$poll_answer['options']?>">
                            <?php echo $poll_answer['options'] ?>
                    </label>
            <?php } ?>
    <input id="submit" type="submit" value="Vote">
    </form>

    <form method="post" action="result.php">

    <?php
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="pollid" value="'.$pollid.'">';
        echo '<input type="hidden" name="question" value="'.$poll['question'].'">';
    ?>
        <input id="submit" type="submit" value="Results">
    </form>
    
</div>