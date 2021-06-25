<?php
// created by rafik hammas
// conge related functions 


//get conge list
function GetcongeList($conn)
{
    $sqlq = mysqli_query($conn,"SELECT conge.cid,conge.pid, conge.datedeb, conge.datefin, conge.cause, conge.reponse, conge.created, personnel.matricule FROM `conge` , `personnel` where personnel.pid =conge.pid ");
    $data =array();
    while($row =mysqli_fetch_assoc($sqlq))
    {
        $data[] = $row; 
    }    
    return $data;
}

//update conge detail
function ChangeStatuts($conn,$cid,$reponse)
{		
    if($cid!=NULL)
    {        mysqli_query($conn,"UPDATE `conge` SET `reponse`='$reponse' WHERE `conge`.`cid` = $cid");
        $response ='success';
        return $response;
    }
    else
    {
        $response ='error';
        return $response;
    }

}
?>