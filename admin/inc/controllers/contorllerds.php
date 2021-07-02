<?php
// created by rafik hammas
// ds related functions 


//get ds list
function GetdsList($conn)
{
    $sqlq = mysqli_query($conn,"SELECT ds.dsid,ds.pid, ds.periode, ds.cause, ds.reponse, ds.created, personnel.matricule FROM `ds` , `personnel` where personnel.pid =ds.pid ");
    $data =array();
    while($row =mysqli_fetch_assoc($sqlq))
    {
        $data[] = $row; 
    }    
    return $data;
}

//update ds detail
function ChangedsStt($conn,$dsid,$reponse)
{		
    if($dsid!=NULL)
    {        mysqli_query($conn,"UPDATE `ds` SET `reponse`='$reponse' WHERE `ds`.`dsid` = $dsid");
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