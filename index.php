<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quick Hash Generator</title>
<script type="text/javascript">
function funhash(id){
	var ajaxRequest;
	var key = document.getElementById('key').value;
	var salt = document.getElementById('salt').value;
	var hasharea = document.getElementById('hasharea');
	if(salt != ''){
		
		hasharea.innerHTML = '<img src="loader.gif"/>';
			try{
				// Opera 8.0+, Firefox, Safari
				ajaxRequest = new XMLHttpRequest();
			} catch (e){
				// Internet Explorer Browsers
				try{
					ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (e) {
					try{
						ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e){
						// Something went wrong
						alert("Your browser broke!");
						return false;
					}
				}
			}
		ajaxRequest.open('GET','hash.php?id='+id+'&key='+key+'&salt='+salt,true);
		ajaxRequest.send(null);
		
		ajaxRequest.onreadystatechange = function(){
			if(ajaxRequest.readyState ==4){
				hasharea.innerHTML = ajaxRequest.responseText+'<img src="tick.png"/>';
			}
			else{
				hasharea.innerHTML = 'Cant carry the request'; 
			}
		}
	}
	else{
		hasharea.innerHTML = 'Enter the key or salt';
	}
}
</script>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
  	<div class="input">
    	<span><label for="key">Pass</label><input type="text" id="key" placeholder="Enter the passcode here"/></span>
        <span><label for="salt">Salt</label><input type="text" id="salt" placeholder="Enter the salt here"/></span>
    </div>
    <div id="hasharea"></div>
    <div id="functions">
    <?php
	$hash_alg = hash_algos();
	foreach($hash_alg as $hash_no=>$hash){
		echo '<input type="button" value="'.$hash.'" onclick="funhash('.$hash_no.')" class="buttons">';
	}
    ?>
    </div>
  </div>  
</body>
</html>
