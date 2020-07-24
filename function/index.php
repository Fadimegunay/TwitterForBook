<?php
	function url(){ # this function, request to url for quote.

		while(true){ 
			$url = "http://extensions.biryudumkitap.com/quote"; 

			// api 
			$json = file_get_contents ($url); 
			$json = json_decode ($json); 
			$quote = $json->quote; 
			$source = $json->source;  
			$source_ = explode(",", $source);
			$alltweet =  $quote."\n".$source_[0]."\n"."Shared By".$_SESSION['username'];

			if(strlen($alltweet) < 280){ # cheching to string length

				#in this way get the tweet list  for don't have twitter api . Firstly add to database and then get the data 

				$query = sprintf("INSERT INTO excerpt (quote, source,username) VALUES ('%s', '%s','%s' )", $quote, $source_[0], $_SESSION['username'] );
				$result = mysqli_query($GLOBALS['con'], $query);
				if($result){ #if this process succeed to record data  
					echo $quote."\n".$source_[0]."\n"."Shared By"." ".$_SESSION['username'];
					break;
				}
				else{ # else display the error message
					echo "Beklenmedik bir hata oluştu. Lütfen Tekrar Deneyiniz!";
					break;
				}
			}
		}

	}
?>
