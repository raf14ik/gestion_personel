<?php
// created by rafik hammas
// rdv related functions 

//create rdv
function Createrdv($conn,$idpersonnel,$sujet)
{	
    if($idpersonnel!=NULL)
    {  	
	$datetoday = date('Y-m-d'); 
	mysqli_query($conn,"INSERT INTO `rdv` ( `pid`, `sujet`, `reponse`, `created`) VALUES
		('$idpersonnel', '$sujet','1','$datetoday')"); 
			$response ='success';
			return $response;
    }
    else{
        $response ='error';
        return $response;
    }
} 
//get rdv list
function GetrdvList($conn,$pid)
{
    $sqlq = mysqli_query($conn,"SELECT rdv.rdvid, rdv.pid, rdv.sujet, rdv.reponse, rdv.created FROM rdv INNER JOIN personnel on personnel.pid = rdv.pid where rdv.pid=$pid");
    $data =array();
    while($row =mysqli_fetch_assoc($sqlq))
    {
        $data[] = $row; 
    }    
    return $data;
}
?>