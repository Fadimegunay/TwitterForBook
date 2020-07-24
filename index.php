<?php
	include('function/connect.php');
	include('function/login.php');

	LoginChecker(); # checking the session
?>
<!DOCTYPE html>
<html>
<head>
	<link href="/css/index.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="/js/jquery/jquery.min.js" ></script>
	<title>Twitter for Book</title>
</head>

<body>

<ul>
  <li><a class="active" href="#home">Ana sayfa</a></li>
  <li><a href="/tweet_list">Geçmiş Tweetler</a></li>
  <li><a href="/log_out">Çıkış</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
	<div class="row" style="color: white; padding: 12px 20px;
	  margin: 8px 0;">
	    <div class="col-sm-4" >    
		    <button type="submit" id="excerpt" href="/">Alıntı Yap</button>
		    
		</div>
	</div>
	<div  >
	  	<div class="row" style="padding: 12px 20px; margin: 8px 0;">
		    <div class="col-sm-8">
		      	<label for="subject">Alıntıyı Görüntülemek için Lütfen bekleyiniz.</label>
		    </div>
		</div>
		<div class="row" style="padding: 12px 20px; margin: 8px 0;">
		    <div class="col-sm-8">
		      	<textarea id="subject" name="subject" disabled placeholder="Alıntıyı Kontrol Edebilirsiniz.." style="height:200px; width: 100%;"></textarea>
		    </div>

		</div> 
		<div class="row b" style="padding: 12px 20px; margin: 8px 0;" id ="a">
			<div class="col-sm-8" id="tweet">
				<p></p>
			</div>
		</div>
		
	</div>
</div>
<script type="text/javascript">
		
	$(document).ready(function () { 
		 
		//This function for  Bring a Quote  and add to 'Share Tweet' button. have not a Twitter API so add to this button for complete to project.
        $('#excerpt').click(function() { 

            $.ajax({
        		url: "/url_get",  
		        type: "POST"
		    }).done(function(result) {
                console.log(result);
                if(result != "") { 
                    $("#subject").val(result); //Firstly get the quote 
                    $("#tweet").empty(); // and add to button
                    $("#tweet").append("<a id='deger' href='https://twitter.com/share?ref_src=twsrc%5Etfw' class='twitter-share-button' data-text='"+ result +"' data-show-count='false'>Tweet </a><script async src='https://platform.twitter.com/widgets.js' charset= 'utf-8' > </cript>"); 

                }else{
                	//console.log(result);
                	//window.location = "/login"
                }
            });

        	
        });

       

    }); 
    
    
</script>

</body>
</html>