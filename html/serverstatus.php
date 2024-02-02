<?php
 
 
//Get the data from the Server
$data_server = json_decode( file_get_contents( 'php://input' ), true );
$data_player = file_get_contents('players.txt');
 
// Grab all the data we need
$lastLoadingStateTime                 = $data_server['lastLoadingStateTime'];
$timeClusterWentIntoLoadingState       = $data_server['timeClusterWentIntoLoadingState'];
$clusterName                        = $data_server['clusterName'];
$totalPlayerCount                     = $data_server['totalPlayerCount'];
$highestPlayerCount                    = $data_player;
$lastUpdated                        = time();
 
//Create the array based on the data provided
$return = array(
    'clusterName' => $clusterName,
    'lastUpdated' => $lastUpdated,
    'totalPlayerCount' => $totalPlayerCount,
    'highestPlayerCount' => $highestPlayerCount,
    'lastLoadingStateTime' => $lastLoadingStateTime,
    'timeClusterWentIntoLoadingState' => $timeClusterWentIntoLoadingState);
 
//Write this data to the Metrics File
file_put_contents('status.txt', json_encode($return), LOCK_EX);
 
if($totalPlayerCount > $highestPlayerCount) {
    file_put_contents('players.txt', $totalPlayerCount, LOCK_EX);
}
 
 
