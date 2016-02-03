/**
 *  Just a message
 */

var counter = -2;
var rowcontent = [];



function init() {
//alert( "what the hell is going on?" );

//Check for the various File API support.

 if (window.File && window.FileReader && window.FileList && window.Blob) {
   // Continue
 } else {
   alert('The File APIs are NOT fully supported in this browser.');
 }
  var x;  
  x = document.getElementById('thetable');
  x.innerHTML = displayCurrent();
  
} // end function init( )


function displayCurrent( ) {
	current = "<table border=0><tr><td>Select the type of words that you want to test.</td></tr></table>";
	return current;
}




function next() {
      //alert("INSIDE executing NEXT ");
	 
      var contents =   localStorage.allContent;
	  contents_length = contents.length;
	  //alert( "length of contents is "+contents.length );
	  var rowcontent = [];
      rowcontent = contents.split("\r");
	  var rows = rowcontent.length;
	  //alert("number of rows is "+rows);
      counter++;
      if (counter==rows) counter=0;
	  var split_row = rowcontent[counter].split("|")
	  //alert(split_row[0]);
      var english = split_row[0];
      document.getElementById('card').innerHTML =  english;   
      document.getElementById('current').innerHTML = counter+1; 
      document.getElementById('total').innerHTML = rows; 
     
 }





 
 function pick() {
   var contents =   localStorage.allContent;
	  var rowcontent = [];
     rowcontent = contents.split("\r");
     var rows = rowcontent.length;
    // counter++;
     counter = Math.floor(Math.random()*(rows-1)); 
    // if (counter==rows) counter=0;
     var english = rowcontent[counter].split("|")[0];
     document.getElementById('card').innerHTML = english;   
     document.getElementById('current').innerHTML = counter+1; 
     document.getElementById('total').innerHTML = rows; 
     
}
 
 
 function goback(){
   var contents =  localStorage.allContent;
	  var rowcontent = [];
      rowcontent = contents.split("\r");
      var rows = rowcontent.length;
      counter = counter-1;
      if (counter<0) counter= rows-1;
      var english = rowcontent[counter].split("|")[0];
      document.getElementById('card').innerHTML = english;   
      document.getElementById('current').innerHTML = counter+1; 
      document.getElementById('total').innerHTML = rows; 
 }

 function answer() {
   var contents =  localStorage.allContent;
	  var rowcontent = [];
      rowcontent = contents.split("\r");
      var rows = rowcontent.length;
      var spanish = rowcontent[counter].split("|")[1];
      document.getElementById('card').innerHTML = spanish;    
 }
 
 function review()  {
   var contents =  localStorage.allContent;
	  var rowcontent = [];
      rowcontent = contents.split("\r");
      var rows = rowcontent.length;
      var english = rowcontent[counter].split("|")[0];
      var spanish = rowcontent[counter].split("|")[1];
      document.getElementById('card').innerHTML = english+"<br>"+spanish;    	 
 }
 
 function morewords(){
 	 location.href="../flashcards.html";
 }
 
 
 
