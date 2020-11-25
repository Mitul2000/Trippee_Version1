<?php

class tripsapi
{
    function Select()
    {

        $mysqli = new mysqli("localhost:8080", "root", "WoI34DVV72McuhuJ", "trippe");

        $trips = array();
        $sql_data = $mysqli->query("SELECT * FROM trips");

        while ($row = $sql_data->fetch_assoc()) {
            $trips[$row['tripid']] = array(
                'tripid' => $row['tripid'],
                'owner' => $row['owner'],
                'tripname' => $row['tripname'],
                'datecreated' => $row['datecreated']
            );
        }

        return json_encode($trips);
    }
}

$API = new tripsapi;
header('Content-Type:application/json');
echo $API->Select();
