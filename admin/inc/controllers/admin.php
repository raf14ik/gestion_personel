<?php
// created by rafik hammas
// admin related functions 

//get admin details
	function GetAdmin($conn,$aid)
	{
		$sqlq = mysqli_query($conn,"SELECT * FROM `admins` WHERE `aid`=$aid");
        $rowadmins =mysqli_fetch_array($sqlq);        
		$admins['name'] = $rowadmins['name']; 
		$admins['email'] = $rowadmins['email']; 
		$admins['password'] = $rowadmins['password']; 
		$admins['created'] = $rowadmins['created']; 
		$admins['status'] = $rowadmins['status']; 
		return $admins;
	}	

//admin login
	function AdminLogin($conn,$email,$pass,$rem)
	{
		//encrypting new pasword
		$password=md5(sha1($pass));

		$query =mysqli_query($conn,"SELECT * FROM `admins` WHERE email ='$email'and password ='$password'");	
		$rowcounts = mysqli_num_rows($query);	
			if($rowcounts==1)
			{
				$row =mysqli_fetch_array($query);		
				$stat=$row['status'];
				if($stat==1)
				{
					$_SESSION['admin'] = $row['aid'];

					$response ='success';
					return $response;
					if($rem==1)
					{
						setcookie('aid',$row['aid'], time() + (86400 * 365), "/");
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
	function AdminLogout($conn)
	{
		session_destroy();		
		setcookie("aid", "", time() - 3600);
		echo"<script> window.setTimeout(function() { window.location.href = './index.php'; }, 0);</script>";
	}

//get admins list
	function GetAdminList($conn)
	{
		$sqlq = mysqli_query($conn,"SELECT * FROM `admins` ");
    	$data =array();
        while($row =mysqli_fetch_assoc($sqlq))
        {
            $data[] = $row; 
        }    
        return $data;
	}

