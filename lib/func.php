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
