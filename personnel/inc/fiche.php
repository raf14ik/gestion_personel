<?php
// created by rafik hammas
// fdp related functions 

//create fdp
function Createfdp($conn,$idpersonnel,$periode)
{	
    if($idpersonnel!=NULL)
    {  	
	$datetoday = date('Y-m-d'); 
	mysqli_query($conn,"INSERT INTO `fdp` ( `pid`, `periode`, `reponse`, `created`) VALUES
		('$idpersonnel', '$periode','1','$datetoday')"); 
			$response ='success';
			return $response;
    }
    else{
        $response ='error';
        return $response;
    }
} 
//get fdp list
function GetfdpList($conn,$pid)
{
    $sqlq = mysqli_query($conn,"SELECT fdp.fpid, fdp.pid, fdp.periode, fdp.reponse, fdp.created FROM fdp INNER JOIN personnel on personnel.pid = fdp.pid where fdp.pid=$pid");
    $data =array();
    while($row =mysqli_fetch_assoc($sqlq))
    {
        $data[] = $row; 
    }    
    return $data;
}
?>