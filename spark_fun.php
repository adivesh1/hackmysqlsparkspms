<?php
/***************************************************************************									 *
 * Function to Delete the Spark Room                                       *              
 *                                                                         *
 ***************************************************************************/
 function create_room($spark_rname) {

$data = array(
				'title' => $spark_rname
			  );
  
$url = "https://api.ciscospark.com/v1/rooms";    
$content = json_encode($data);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-type: application/json','Authorization:Bearer M2RkMmE1ZmQtYWYwNy00OTIzLTlhOTEtNjI1ZjI5MzAwNGUwNTk3Zjk3NjItNGEw'));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

$response = json_decode($json_response, true);

	if ( $status == 200 ) {
	
		$reg_sparkroom_id=$response['id'];
		$RoomTitle=$response['title'];
		$Created_Date=$response['created'];
		$type=$response['type'];
		$is_locked=$response['isLocked'];
	
		$full_string=$reg_sparkroom_id.",".$RoomTitle.",".$Created_Date.",".$type.",".$is_locked."\n";
		}
		else{
             die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
		}
		
		return $reg_sparkroom_id;
}

/***************************************************************************									 *
 * Function to Delete the Spark Room                                       *              
 *                                                                         *
 ***************************************************************************/
 function delete_spark_room($spark_roomid) {

$token = 'ZjA2YzY3YWItMzlmOC00N2E4LWE4YzAtN2QwYjI4M2RkM2Y4NGNiYjNkNjItMTk5';
$url = 'https://api.ciscospark.com/v1/rooms/'.$spark_roomid;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Authorization: Bearer '.$token));

// Make the REST call, returning the result
$response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
echo json_decode($response, true);
if (!$response) {
   echo "Connection Failure.n";
}
}

/***************************************************************************									 *
 * Function to Add Preson in Spark Room                                    *              
 *                                                                         *
 ***************************************************************************/
function add_preson_in_spark_room($spark_rid,$person_email_add,$rnum)
 {
	$data = array(
				'roomId' => $spark_rid,
				'personEmail'=>$person_email_add,
				'isModerator'=>'false'
			  );
  
$url = "https://api.ciscospark.com/v1/memberships";    
$content = json_encode($data);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-type: application/json','Authorization:Bearer M2RkMmE1ZmQtYWYwNy00OTIzLTlhOTEtNjI1ZjI5MzAwNGUwNTk3Zjk3NjItNGEw'));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

$response = json_decode($json_response, true);

	if ( $status == 200 ) {
	    $membership=$response['id'];
	/*Connect Mysql DB*/
	$mysql_hostname = "sql6.freemysqlhosting.net";
	$mysql_user = "sql6139629";
	$mysql_password = "FKeMD1yudJ";
	$mysql_database = "sql6139629";

   $conn = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password);
   
   if ($conn->connect_error){
	   die("Connection failed: " . $conn->connect_error);
   }
	/*Query to Insert Patient Information*/
    $sql = "INSERT INTO $mysql_database.spark_rum_info(rnum,memid,eid)VALUES('$rnum','$membership','$person_email_add')";
	
	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
		}
     else{
		  die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
	 }		
 }

/***************************************************************************									 *
 * Function to Remove Preson in Spark Room                                    *              
 *                                                                         *
 ***************************************************************************/
function remove_preson_in_spark_room($spark_membership_id)
 {
	$url = "https://api.ciscospark.com/v1/rooms/".$spark_membership_id;    
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
	curl_setopt($curl, CURLOPT_HTTPHEADER,array('Content-type: application/json','Authorization:Bearer M2RkMmE1ZmQtYWYwNy00OTIzLTlhOTEtNjI1ZjI5MzAwNGUwNTk3Zjk3NjItNGEw'));
	$json_response = curl_exec($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

	curl_close($curl);		

	$response = json_decode($json_response, true);

if ( $status != 204 ) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}

	if ( $status == 204 ) {
	
		echo "<script>
		alert('Invalid Login Please Try Again');
		window.location.href='index.php';
		</script>";
	}
	else
	{
		print $staus;
	} 
 }
 /***************************************************************************									 *
 * Function to Send Message in Spark Room                                    *              
 *                                                                         *
 ***************************************************************************/
function send_smg_in_spark_room($spark_room_title,$msg)
{
	$comp_msg="**SPMS UPDATE**".$msg;
  	$data = array(
				'roomId' => $spark_room_title,
				'markdown'=>$comp_msg,
			  );
  
$url = "https://api.ciscospark.com/v1/messages";    
$content = json_encode($data);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-type: application/json','Authorization:Bearer M2RkMmE1ZmQtYWYwNy00OTIzLTlhOTEtNjI1ZjI5MzAwNGUwNTk3Zjk3NjItNGEw'));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

$response = json_decode($json_response, true);

	if ( $status != 200 ) {
		  die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
	 }
}
/***************************************************************************
 *
 *
 *
 *
 ****************************************************************************/
function curPageURL()
{	
$isHTTPS = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on");	
 $port = (isset($_SERVER["SERVER_PORT"]) && ((!$isHTTPS && $_SERVER["SERVER_PORT"] != "80")
                                             || ($isHTTPS && $_SERVER["SERVER_PORT"] != "443")));
 $port = ($port) ? ':'.$_SERVER["SERVER_PORT"] : '';	
 $url = ($isHTTPS ? 'https://' : 'http://').$_SERVER["SERVER_NAME"].$port.$_SERVER["REQUEST_URI"]; 
 return $url;
}

/***************************************************************************									 *
 * Function to Send Message with attachment in Spark Room                                    *              
 *                                                                         *
 ***************************************************************************/
function send_attachment_in_spark_room($spark_room_title,$msg,$attachment)
{	
 
$URL=curPageURL();
echo $URL;
echo <br>;

$filename=$URL."/"."dbfile/".$attachment;/*Creating http link*/

echo $filename;

$data = array(    "roomId" => $spark_room_title,   
                  'files' => $filename     );  
$url = "https://api.ciscospark.com/v1/messages";   
$content = json_encode($data);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-type: application/json;charset=utf-8','Authorization:Bearer YWE0OTE3MzItYTNhZi00MjZmLWFkYjgtOGExNGYxMDgzZjMyNTZiZTYyMTktNWEz'));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);$response = json_decode($json_response, true); 

if ( $status == 200 ) {  
 
 echo "File Send Successfully!!";
}else{
	die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}	
}
?>