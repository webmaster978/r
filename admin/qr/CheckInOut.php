<?php
    session_start();
	include '../../config/data.php';

    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['studentID'])){
        
        $studentID =$_POST['studentID'];
		$date = date('Y-m-d');
		$time = date('H:i:s A');

		$sql = "SELECT * FROM tbl_agent WHERE STUDENTID = '$studentID'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = ' Code invalide '.$studentID;
		}else{
				$row = $query->fetch_assoc();
				$id = $row['STUDENTID'];
				$sql = "SELECT * FROM attendance WHERE STUDENTID='$id' AND LOGDATE='$date'";
				$query=$conn->query($sql);
				if($query->num_rows>0){
					echo'err';
				}else{
				$sql ="SELECT * FROM attendance WHERE STUDENTID='$id' AND LOGDATE='$date' AND STATUS='0'";
				$query=$conn->query($sql);
			}
			if($query->num_rows>0){
				$sql = "UPDATE attendance SET TIMEOUT='$time', STATUS='1' WHERE STUDENTID='$studentID' AND LOGDATE='$date'";
				$query=$conn->query($sql);

				$myAudioFile = "audio/96.wav";
                            echo '<audio autoplay="true" style="display:none;">
                                <source src="'.$myAudioFile.'" type="audio/wav">
                            </audio>';
				
				$_SESSION['success'] = 'Au revoir: '.$row['nom_complet'];
			}else{
					$sql = "INSERT INTO attendance(STUDENTID,TIMEIN,LOGDATE,STATUS) VALUES('$studentID','$time','$date','0')";
					if($conn->query($sql) ===TRUE){

                      $myAudioFile = "audio/96.wav";
                            echo '<audio autoplay="true" style="display:none;">
                                <source src="'.$myAudioFile.'" type="audio/wav">
                            </audio>';

					 $_SESSION['success'] = 'Bienvenue: '.$row['nom_complet'];

                   

			 }else{
				
			  $_SESSION['error'] = $conn->error;
		   }	
		}
	}

	}else{
		$_SESSION['error'] = 'Please scan your QR Code number';
}
header("location: index.php");
	   
$conn->close();
?>