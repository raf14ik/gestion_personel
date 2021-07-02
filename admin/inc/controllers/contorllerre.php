<?php
// created by rafik hammas
// reclamation related functions 


//get reclamation list
function GetreclamationList($conn)
{
    $sqlq = mysqli_query($conn,"SELECT reclamation.reclamationid,reclamation.pid, reclamation.cause, reclamation.reponse, reclamation.created, personnel.matricule FROM `reclamation` , `personnel` where personnel.pid =reclamation.pid ");
    $data =array();
    while($row =mysqli_fetch_assoc($sqlq))
    {
        $data[] = $row; 
    }    
    return $data;
}

//update reclamation detail
function ChangereclamationStt($conn,$reclamationid,$reponse)
{		
    if($reclamationid!=NULL)
    {        mysqli_query($conn,"UPDATE `reclamation` SET `reponse`='$reponse' WHERE `reclamation`.`reclamationid` = $reclamationid");
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