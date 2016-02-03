 
 $(function(){
      $("#includeUrl").load("url.html"); 
      $("#includeTitle").load("title.html"); 
      $("#includeLeftbar").load("leftbar.html"); 
      $("#includeRightbar").load("rightbar.html"); 
      $("#includeTrailer").load("trailer.html"); 
      $("#includeDropNav").load("dropnav.php"); 
      $("#includeHeader").load("header.html"); 
    });

f	
function Verificar() {

	if(document.frm.name.value == "") {
		alert("Please enter a name");
		document.frm.name.focus();
		return false;
	}

	if(document.frm.email.value == "") {
		alert("Please enter an E-Mail");
		document.frm.email.focus();
		return false;
	}

	if(document.frm.commentaries.value == "") {
		alert("Please enter a message");
		document.frm.commentaries.focus();
		return false;
	}

	return true;
}	
	