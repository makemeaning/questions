<script type="text/javascript" language='javascript' >
function ajaxDataRequest(file_name) {
var xhttp = new XMLHttpRequest();
xhttp.open("GET", "./scripts/callfile.php?file="+file_name, true );
	
    xhttp.send();
    xhttp.onreadystatechange = function() {
	if (xhttp.readyState == 4 && xhttp.status == 200) {
      data = xhttp.responseText;
        	  split_file_text = data.split("\n");
	  file_text = "";
	  for (i=0; i<split_file_text.length; i++) {
	    if (split_file_text[i].length > 3) {
	      file_text = file_text + split_file_text[i];
	   }
	   }
	   
      var a = file_text.indexOf("<body>");
	  
	  var b =  file_text.indexOf("</body>");

	  var newfile_text = file_text.substr(a+6,b-(a+7));
	  
	  newfile_text = newfile_text.trim(); 
	  localStorage.clear(); 
	  localStorage.allContent = newfile_text;


	} 
  }
    
}  
</script>


<!--
//Send the proper header information along with the request
    var params = "file='< ?php echo $file_selected ?>'";
	xhttp.send(params);
	//xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//xhttp.setRequestHeader("Content-length", params.length);
	//xhttp.setRequestHeader("Connection", "close");
-->

