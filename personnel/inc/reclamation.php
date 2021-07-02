<?php
// created by rafik hammas
// reclamation related functions 

//create reclamation
function Createrec($conn,$idpersonnel,$cause)
{	
    if($idpersonnel!=NULL)
    {  	
	$datetoday = date('Y-m-d'); 
	mysqli_query($conn,"INSERT INTO `reclamation` ( `pid`, `cause` , `reponse`,`created`) VALUES
		('$idpersonnel','$cause','1','$datetoday')"); 
			$response ='success';
			return $response;
    }
    else{
        $response ='error';
        return $response;
    }
} 
//get reclamation list
function GetrecList($conn,$pid)
{
    $sqlq = mysqli_query($conn,"SELECT reclamation.reclamationid, reclamation.pid, reclamation.cause, reclamation.reponse, reclamation.created FROM reclamation INNER JOIN personnel on personnel.pid = reclamation.pid where reclamation.pid=$pid");
    $data =array();
    while($row =mysqli_fetch_assoc($sqlq))
    {
        $data[] = $row; 
    }    
    return $data;
}
?>