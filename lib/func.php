<?php
	function print_pre($data){
		echo"<pre>";
		print_r($data);
		echo"</pre>";
	}

	function secure_input($con,$data)
	{
		$data = trim($data);
		$data = mysqli_real_escape_string($con,$data);
		$data = htmlentities($data);
		return $data;
	}

	function active_menu($str){
		if(isset($_GET['page']))
		if($_GET['page']==$str)
		return 'class="active"';

	}

	//redirect $url  $time=seconds
	function redirect($url, $time=0)
	{
		if (!headers_sent())
		{
			header("refresh:$time URL=$url");
			exit;
		}
		else
		{
			echo "<meta http-equiv=\"refresh\" content=\"$time;url=$url\">\r\n";
		}
	}

	function date_ymd ($date){

		if($date != '00-00-0000' && $date != ''&& $date != '01-01-1970')
		$date_formated = date('Y-m-d',strtotime($date));
		else
		$date_formated = '0000-00-00';

		return $date_formated;

	}

	function date_dmy($date){

		if($date != '0000-00-00' && $date != ''&& $date != '1970-01-01')
		$date_formated = date('d-m-Y',strtotime($date));
		else
		$date_formated = '';

		return $date_formated;
	}

	function str_rand($length = 8, $seeds = 'alphanum')
	{
		// Possible seeds
		$seedings['alpha'] = 'abcdefghijklmnopqrstuvwqyz';
		$seedings['numeric'] = '0123456789';
		$seedings['alphanum'] = 'abcdefghijklmnopqrstuvwqyz0123456789';
		$seedings['hexidec'] = '0123456789abcdef';

		// Choose seed
		if (isset($seedings[$seeds]))
		{
			$seeds = $seedings[$seeds];
		}

		// Seed generator
		list($usec, $sec) = explode(' ', microtime());
		$seed = (float) $sec + ((float) $usec * 100000);
		mt_srand($seed);

		// Generate
		$str = '';
		$seeds_count = strlen($seeds);

		for ($i = 0; $length > $i; $i++)
		{
			$str .= $seeds{mt_rand(0, $seeds_count - 1)};
		}

		return $str;
	}


	function send_notif($email, $name, $message, $title){

		$mail = new PHPMailer;

		$mail->SMTPDebug = 2;                               // Enable verbose debug output comment bila x nak ade error log

		//commen-here start
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'etest488@gmail.com';                 // SMTP username
		$mail->Password = '123456789@S';                           // SMTP password
		$mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		//commen-here end



		$mail->setFrom('no-reply@'.DOMAIN, 'ADMIN_SCORE');

		$mail->addAddress($email, $name);     // Add a recipient

		$mail->addReplyTo('no-reply@'.DOMAIN, 'No-Reply');


		$mail->isHTML(true);


		$mail->Subject =$title ;
		$mail->Body =$message ;
		// $mail->Send();

		if (!$mail->Send()) {
			//			$err = "Check Internet Connection OR SMTP settings";
			die;redirect('index.php?emailerror=true');
			}else{
			$err = "Check Internet Connection OR SMTP settings";
			echo '<div class="alert alert-success text-center" role="alert">
			<h5>Email Dapat Dihantar </h5>
			</div>';

		}

	}

	function kategori_name($con,$k_id){

		$query_k = "SELECT * FROM tb_kategori JOIN tb_mohon_keluar ON mk_kategori = k_id WHERE k_id = '$k_id'";
		$result_k = mysqli_query($con,$query_k);
		$row_k = mysqli_fetch_array($result_k);
		$lain2 = $row_k['mk_kategori_lain'];

		if($row_k['k_id'] == '6'){
			return ($row_k['k_name'] . '&nbsp;<b>( '.$lain2.' )</b>');
		}
		else
		return $row_k['k_name'];
	}

	function maklumat_pelajar($con,$no_kp){
		$query2 = "SELECT *

		FROM tb_pelajar a

		LEFT JOIN
		tb_kelas b ON a.plj_kelas = b.kls_id

		LEFT JOIN
		tb_dorm c ON a.plj_kamar = c.drm_id


		WHERE plj_noKp = '$no_kp' ";
		return mysqli_query($con,$query2);

	}


	function send_noti_mobile($tokens, $message)
	{
		require('../../config/db.php');
		$sql = "SELECT * FROM tb_conf_msg";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);

		$url = $row['cm_fcm_url'];//SESSION
		$auth_key = $row['cm_auth_key'];
		$fields = array(
		'registration_ids' => $tokens,
		'data' => $message,
		'sound' => 1
		);
		$headers = array(
		'Authorization:key =  '.$auth_key.'',
		'Content-Type: application/json'
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		else
		$success = "<div class=\"container\">
		<div class=\"alert alert-success\" align=\"center\"><strong>Success!</strong> Message Had Been Sent.</div>
		</div>";

		curl_close($ch);
		return $success;
	}

	function send_noti_mobile_warden($message)
	{
		require('../../config/db.php');
		$sql = "SELECT * FROM tb_warden";
		$query = mysqli_query($conn, $sql);


		$message = array("message" => $message);

		while($row = mysqli_fetch_array($query)){
		$tokens = array($row['wrd_Token']);
				/* $tokens = array();
		 $tokens[] = $row['wrd_Token']; */
			send_noti_mobile($tokens, $message);

		}

	}
