<?php
// created by rafik hammas
// conge related functions 

//create conge
function Createconge($conn,$idpersonnel,$startDate, $finishDate, $cause)
{	
    if($idpersonnel!=NULL)
    {  	
	$datetoday = date('Y-m-d'); 
	mysqli_query($conn,"INSERT INTO `conge` ( `pid`, `datedeb`, `datefin`, `cause`, `reponse`, `created`) VALUES
		('$idpersonnel','$startDate', '$finishDate', '$cause','1','$datetoday')"); 
			$response ='success';
			return $response;
    }
    else{
        $response ='error';
        return $response;
    }
} 
//get conge list
function GetcongeList($conn,$pid)
{
    $sqlq = mysqli_query($conn,"SELECT conge.cid, conge.pid, conge.datedeb, conge.datefin, conge.cause, conge.reponse, conge.created FROM conge INNER JOIN personnel on personnel.pid = conge.pid where conge.pid=$pid");
    $data =array();
    while($row =mysqli_fetch_assoc($sqlq))
    {
        $data[] = $row; 
    }    
    return $data;
}
?>