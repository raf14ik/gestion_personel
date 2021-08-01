<?php
// created by rafik hammas
// personnel related functions 

//get personnel details
	function Getpersonnel($conn,$pid)
	{
		$sqlq = mysqli_query($conn,"SELECT * FROM `personnel` WHERE `pid`=$pid");
        $rowpersonnels =mysqli_fetch_array($sqlq);        
		$personnels['matricule'] = $rowpersonnels['matricule']; 
		$personnels['nom'] = $rowpersonnels['nom']; 
		$personnels['prenom'] = $rowpersonnels['prenom']; 
		$personnels['email'] = $rowpersonnels['email'];
        $personnels['motdepasse'] = $rowpersonnels['motdepasse'];  
		$personnels['datenaissance'] = $rowpersonnels['datenaissance']; 
        $personnels['adresse'] = $rowpersonnels['adresse']; 
        $personnels['dateembauche'] = $rowpersonnels['dateembauche']; 
        $personnels['poste'] = $rowpersonnels['poste']; 
        $personnels['creation'] = $rowpersonnels['creation']; 
        $personnels['statut'] = $rowpersonnels['statut']; 
		return $personnels;
	}	

//personnel login
	function personnelLogin($conn,$matricule,$motdepasse,$rem)
	{
		//encrypting new pasword
		$password=md5(sha1($motdepasse));

		$query =mysqli_query($conn,"SELECT * FROM `personnel` WHERE matricule ='$matricule' and motdepasse ='$password'");	
		$rowcounts = mysqli_num_rows($query);	
			if($rowcounts==1)
			{

				$row =mysqli_fetch_array($query);		
				$stat=$row['statut'];
				if($stat==1)
				{
					$_SESSION['personnel'] = $row['pid'];

					$response ='success';
					return $response;
					if($rem==1)
					{
						setcookie('pid',$row['pid'], time() + (86400 * 365), "/");
					}
				}
			}
			else
			{
				$response ='error';
				return $response;	 	 		
			}
	}
	

//logout
	function personnelLogout($conn)
	{
		session_destroy();		
		setcookie("pid", "", time() - 3600);
		echo"<script> window.setTimeout(function() { window.location.href = './index.php'; }, 0);</script>";
	}

//get personnels list
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

	//get personnel informations
	function GetperList($conn,$userid) {
		$sqlq = mysqli_query($conn,"SELECT * FROM `personnel` where pid=$userid ");
    	$data =array();
        while($row =mysqli_fetch_assoc($sqlq))
        {
            $data[] = $row; 
        }    
        return $data;

	}
	//update personnel detail
function Changepersonnel($conn,$pid, $nom, $prenom, $email,$newpass, $datenaissance, $adresse, $dateembauche, $poste)
{		
    if($pid!=NULL)
    {

        $password=md5(sha1($newpass));
        mysqli_query($conn,"UPDATE `personnel` SET `nom`='$nom', `prenom`='$prenom', `email`='$email', `motdepasse`='$password', `datenaissance`='$datenaissance', `adresse`='$adresse', `dateembauche`='$dateembauche', `poste`='$poste' WHERE `personnel`.`pid` = $pid");
        $response ='success';
        return $response;
    }
    else
    {
        $response ='pwmiss';
        return $response;
    }


}
?>
