<?php
// created by rafik hammas
// rdv related functions 


//get rdv list
function GetrdvList($conn)
{
    $sqlq = mysqli_query($conn,"SELECT rdv.rdvid, rdv.pid, rdv.sujet, rdv.reponse, rdv.created, personnel.matricule FROM `rdv` , `personnel` where personnel.pid =rdv.pid ");
    $data =array();
    while($row =mysqli_fetch_assoc($sqlq))
    {
        $data[] = $row; 
    }    
    return $data;
}

//update rdv detail
function ChangeSt($conn,$rdvid,$reponse)
{		
    if($rdvid!=NULL)
    {        mysqli_query($conn,"UPDATE `rdv` SET `reponse`='$reponse' WHERE `rdv`.`rdvid` = $rdvid");
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