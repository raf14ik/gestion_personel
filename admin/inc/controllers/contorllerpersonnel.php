<?php
// created by rafik hammas
// personnel related functions 

//create personnel
function CreatePersonnel($conn,$matricule, $nom, $prenom, $email,$password, $datenaissance, $adresse, $dateembauche, $poste)
{		
    $datetoday = date('Y-m-d'); 
	if($matricule==NULL || $nom==NULL ||
    $prenom==NULL || $email==NULL || 
    $password==NULL || $datenaissance==NULL || 
    $adresse==NULL || $dateembauche==NULL || 
    $poste==NULL)
	{
		$response ='error';
		return $response;
	}
	else{
		$pass=md5(sha1($password));
		mysqli_query($conn,"INSERT INTO `personnel` ( `matricule`, `nom`, `prenom`, `email`, `motdepasse`, `datenaissance`, `adresse`, `dateembauche`, `poste`, `creation`, `statut`) VALUES
		('$matricule', '$nom', '$prenom', '$email','$pass', '$datenaissance', '$adresse', '$dateembauche', '$poste','$datetoday','1')"); 

			$response ='success';
			return $response;
	}
}

//get personnel list
function GetpersonnelList($conn)
{
    $sqlq = mysqli_query($conn,"SELECT * FROM `personnel` ");
    $data =array();
    while($row =mysqli_fetch_assoc($sqlq))
    {
        $data[] = $row; 
    }    
    return $data;
}

//update personnel detail
function Changepersonnel($conn,$pid,$matricule, $nom, $prenom, $email,$newpass, $datenaissance, $adresse, $dateembauche, $poste)
{		
    if($pid!=NULL)
    {

        $password=md5(sha1($newpass));
        mysqli_query($conn,"UPDATE `personnel` SET `matricule`='$matricule', `nom`='$nom', `prenom`='$prenom', `email`='$email', `motdepasse`='$password', `datenaissance`='$datenaissance', `adresse`='$adresse', `dateembauche`='$dateembauche', `poste`='$poste' WHERE `personnel`.`pid` = $pid");
        $response ='success';
        return $response;
    }
    else
    {
        $response ='pwmiss';
        return $response;
    }


}

//delete personnel
function Deletepersonnel($conn,$pid)
{
    mysqli_query($conn,"DELETE FROM personnel WHERE pid ='$pid'"); 
}	

?>
