<?php
// created by rafik hammas
// fdp related functions 


//get fdp list
function GetfdpList($conn)
{
    $sqlq = mysqli_query($conn,"SELECT fdp.fpid,fdp.pid, fdp.periode, fdp.reponse, fdp.created, personnel.matricule FROM `fdp` , `personnel` where personnel.pid =fdp.pid ");
    $data =array();
    while($row =mysqli_fetch_assoc($sqlq))
    {
        $data[] = $row; 
    }    
    return $data;
}

//update fdp detail
function ChangeStt($conn,$fpid,$reponse)
{		
    if($fpid!=NULL)
    {        mysqli_query($conn,"UPDATE `fdp` SET `reponse`='$reponse' WHERE `fdp`.`fpid` = $fpid");
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