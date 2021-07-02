<?php
// created by rafik hammas
// ds related functions 

//create ds
function Createdes($conn,$idpersonnel,$per ,$cause)
{	
    if($idpersonnel!=NULL)
    {  	
	$datetoday = date('Y-m-d'); 
	mysqli_query($conn,"INSERT INTO `ds` ( `pid`, `periode`, `cause` , `reponse`,`created`) VALUES
		('$idpersonnel', '$per','$cause','1','$datetoday')"); 
			$response ='success';
			return $response;
    }
    else{
        $response ='error';
        return $response;
    }
} 
//get ds list
function GetdesList($conn,$pid)
{
    $sqlq = mysqli_query($conn,"SELECT ds.dsid, ds.pid, ds.periode, ds.cause, ds.reponse, ds.created FROM ds INNER JOIN personnel on personnel.pid = ds.pid where ds.pid=$pid");
    $data =array();
    while($row =mysqli_fetch_assoc($sqlq))
    {
        $data[] = $row; 
    }    
    return $data;
}
?>