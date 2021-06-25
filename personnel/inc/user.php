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
		$query =mysqli_query($conn,"SELECT * FROM `personnel` WHERE matricule ='$matricule' and motdepasse ='$motdepasse'");	
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
?>
