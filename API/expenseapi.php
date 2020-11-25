<?php

class expenseapi
{

  function Select()
  {

    $mysqli = new mysqli("localhost:8080", "root", "WoI34DVV72McuhuJ", "trippe");

    $expenses = array();
    $sql_data = $mysqli->query("SELECT * FROM group_entries ORDER BY tripid");

    while ($row = $sql_data->fetch_assoc()) {
      $expenses[$row['entryid']] = array(
        'tripid' => $row['tripid'],
        'description' => $row['description'],
        'value' => $row['value']
      );
    }
    return json_encode($expenses);
  }
}

$API = new expenseapi;
header('Content-Type:application/json');
echo $API->Select();

