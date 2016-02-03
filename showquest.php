<?php
header('Content-Type: text/html; charset=ISO-8859-1');   //ISO-8859-1
?>
<!DOCTYPE html>
<html>
<head>
<?php require './scripts/standardHEAD.php' ?>
<?php
$DNS = "localhost";  // "www.meta4systems.com";   // 
@$file_selected = $_GET['file'];
@$qtype = $_GET['qtype'];    
if (strlen($file_selected) < 1 ) { $file_selected='question.txt'; }
if (strlen($qtype) < 1 ) { $qtype='oneline'; }



require './scripts/getData.php';
$output = getData($file_selected);
$instructions = getInstructions($file_selected);


require './scripts/showQuestion.php';



$fulllines = explode(PHP_EOL, $output );
$piece = explode('|', $fulllines[0]);
$questions[] = $piece;
for ($i=1; $i<sizeof($fulllines); $i++) {
   $piece = explode('|', $fulllines[$i]);
   array_push($questions, $piece);
}



?>


<?php require  './scripts/ajaxDataRequest.php' ?>



<script  type='text/javascript' language='javascript' >

   var questions = []



 
 function loaddata() {
     file_selected =  '<?php echo $file_selected; ?>'; 
     qtype = '<?php echo $qtype ?>';	 
	 //alert("new load: file requested "+ file_selected);
     var data = ajaxDataRequest(file_selected);
	 processCurrentData();
    }
  
 
  function processCurrentData() {
     data = localStorage.allContent;
     //alert(data);
     fulllines = data.split('\r');
 	 questions.length=0;
	 var answers = [];
	 for (i=0; i<fulllines.length; i++) {
	    aquestion = fulllines[i].split('|');
		//alert("parts to aquestion are "+aquestion.length);
		questions[i] = aquestion;
		answers[i] = 0;
	 }
	//alert("number of question is "+questions.length);
    //alert("parts per question is "+questions[0].length);	
	// alert(questions2string(questions));
	return answers;
  }


 
 function questions2string(questions) {
    astring = "";
	
	for (i=0; i<questions.length; i++) {
	 for (j=0; j< questions[0].length; j++) {
	    astring = astring + " " + questions[i][j];
	 }
	 astring = astring + "\n";
	}
	
   return  astring;
} 
  
   
 function look() {
	alert(questions2string(questions));
  } 
 
    
 function changeimages() {
 	 var data = ajaxDataRequest('<?php echo $file_selected; ?>');
	 processCurrentData();
	 data = localStorage.allContent;
	 answers = processCurrentData(data);
	 var correctAnswer = "";
	 var x = "";
     var answer = []	 
     for (i=0; i<questions.length; i++) {
	   pixid = 'pix'+i;
      // document.getElementById(pixid).src = './images/ex.jpg';

	   // start getting the text in a text box
	   ansid = 'ans'+i;
	   answer[i] = document.getElementById(ansid).value;
	   
	   //alert("answer for "+ansid+" is "+answer[i] );  
	   answer[i] = answer[i].trim();
	   questions[i][2] = questions[i][2].trim();
	   answer[i] = answer[i].toLowerCase();
	   questions[i][2] = questions[i][2].toLowerCase();
	   
	   if (answer[i] == "" ) {
         document.getElementById(pixid).src = './images/clear.png';
	   }  else 
 	   if (answer[i] == questions[i][2]) {
	     // alert(answer[i]+" IS CORRECT");
         document.getElementById(pixid).src = './images/check.png';
		} else
		 if (stripVowelAccent(answer[i]) == stripVowelAccent(questions[i][2])) {
	     // alert(answer[i]+" IS  ALMOST CORRECT");
         document.getElementById(pixid).src = './images/questicon.png';
		  }   
		  else {
		 // alert(answer[i]+" IS WRONG");
          document.getElementById(pixid).src = './images/ex.jpg';
		  }
	   
       // create a new complete sentense
	   stripped1 = removeParenthesis(questions[i][1]);
	   stripped0 = removeParenthesis(questions[i][0]);
	   //alert(stripped);
	   correctAnswer = "<br>"+stripped0+questions[i][2]+stripped1;
	   //alert(correctAnswer);
	   x = document.getElementById(i.toString()).innerHTML;	
	   //alert(x);
	   x = removeCorrectLine(x);
	   x = removeBR(x);
	   x = x + correctAnswer;
	   document.getElementById(i.toString()).innerHTML = x;
   
	   
	   // restore the answer
	   document.getElementById(ansid).value =  answer[i];
	   
	   
 	 }  
  } 

  function removeCorrectLine(innerhtml) {
     var z = innerhtml.lastIndexOf('>');
	 shortened = innerhtml.substr(0,z+1);
	 return shortened;
	  }

   function removeBR(x) {
       var l = x.length;
	   //alert(x.substr(l-4));
       if ( x.substr(l-4) == "<br>" ) {
	      x  = x.substr(0,l-4);
	   }
	   return x
   } 
  
  function removeParenthesis(text) {
       var reduced = "";
	   var ignore = false;
       for (j=0; j<text.length; j++){
	     if  (text.charAt(j) == '(' ) {
			 ignore = true;
		 } else if (text.charAt(j) == ')' ) {
		     ignore= false;
		 } else if (!ignore) {
		    reduced = reduced + text.charAt(j);
		 }
		 
	   }
     return reduced;
  }
 

 function stripVowelAccent(str)
{

 var rExps=[
 {re:/[\xC0-\xC6]/g, ch:'A'},
 {re:/[\xE0-\xE6]/g, ch:'a'},
 {re:/[\xC8-\xCB]/g, ch:'E'},
 {re:/[\xE8-\xEB]/g, ch:'e'},
 {re:/[\xCC-\xCF]/g, ch:'I'},
 {re:/[\xEC-\xEF]/g, ch:'i'},
 {re:/[\xD2-\xD6]/g, ch:'O'},
 {re:/[\xF2-\xF6]/g, ch:'o'},
 {re:/[\xD9-\xDC]/g, ch:'U'},
 {re:/[\xF9-\xFC]/g, ch:'u'},
 {re:/[\xD1]/g, ch:'N'},
 {re:/[\xF1]/g, ch:'n'} ];

  var len =   rExps.length;
  
 for(var i=0; i<len; i++)
  str=str.replace(rExps[i].re, rExps[i].ch);
  
  
  // alert("rExps length "+ str);
 return str;

}
 
 
 function clearall() {
    window.location ='http://<?php echo $DNS; ?>/question/showquest.php?file='+file_selected+'&qtype='+qtype;
 
 }
 
 
 
 
 
  
</script>

<style>
.solidblue {
    border: 3px solid blue;
}

section {
    margin-left: 10px;
    //border: 3px solid red;
}

.box {
    text-align: left;
    padding-left: 20px;
    width: 700px;
    height: 250px;
    border: 1px solid blue;
    box-sizing: border-box;
}

.hiddenbox {
    text-align: left;
    padding-left: 20px;
 }

</style>
<!--
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" >
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  -->


   <!-- link rel="stylesheet" href="/resources/demos/style.css"  -->  
 
 <script src="./boot/jquery.js"></script> 
  <link rel="stylesheet" href="./boot/bootstrap.min.css">
  <script src="./boot/javascript.js"></script>
  <script src="./boot/bootstrap.min.js"></script>
  



</head>
<body  onload='javascript: loaddata();'  onunload()='javascript: localStorage.clear();' >

<!-- div>
<img src='./images/check.png' />
<img src='./images/clear.png' />
<img src='./images/ex.jpg' />
</div -->
<div class="container-fluid"  id="includeDropNav" > </div>


<section>
    <br><center>
<div class='box' >	
    <br><span><b>Instructions</b></span>
<p><?php echo $instructions ?><central><img src='./images/line.jpg' width='650px' height='3px' /></central><br>
Click "Check Your Answers" at any time.  The completed sentence will appear below
each test sentence.<br>For sentences with an answer, an icon will appear. 
Click the Restart Button to clear all.<br>
Green Check Mark:<img src='./images/check.png' />    Correct<br>
Question Mark:<img src='./images/questicon.png' />    Some letters need an accent mark<br>
Red Cross Mark:<img src='./images/ex.jpg' />    Incorrect (try again)<br></p>
</div></center>
<center>
<input type='button' value='Check Your Answers'  onClick='changeimages();' />
<input type='button' value='Restart'  onClick='clearall();' />
</center>
<p>

<div class='hidddenbox' >
<?php

if ($qtype == "oneline") {
for ($i=0; $i<sizeof($questions); $i++) {
echo showQuestion($i, $questions[$i][0], $questions[$i][1], $questions[$i][2]);
} 
}else if ( $qtype == "twoline") {
  for ($i=0; $i<sizeof($questions); $i++) {
  echo showQuestionPair($i, $questions[$i][0], $questions[$i][1], $questions[$i][2], $questions[$i][3], $questions[$i][4], $questions[$i][5]);
  }
}
?>	
</div>	
	
	
	
</section>



</div>






</body>


<!--
	Á	193<p>

	É	201<p>

	Ó	211<p>

	Ú	218<p>

	Û	220<p>
	
	BEGIN VIEW PHP PRODUCED TEXT <p>

	< ?php
	
	
	echo "NOW VIEW PHP GENERATED CODE<br>";

	$A = chr(193)."<br>";
	$E = chr(201)."<br>";
	echo $A.$E."<br>";
	
	
    ?>
	
-->

