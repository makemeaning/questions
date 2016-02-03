<?php
function showQuestion($id, $str1, $str2, $answer) {
$idm = $id + 1;
$quest = <<<EOT
       <div class='hiddenbox' id='$id' >
	   $idm:&nbsp;&nbsp;$str1
	   <input id="ans$id" type='textbox' size='10px'  name='$answer'  value="" />
	   $str2
	   <img id="pix$id" src='./images/clear.png' />
	   </div>
	   <p>\n
EOT;
return $quest;
}

function showQuestionPair($id, $str1, $str2, $str3, $str4, $answer, $answer2) {
$idm = $id + 1;
$quest = <<<EOT
       <div class='hiddenbox' id='$id' >
	   $idm:&nbsp;&nbsp;$str1
	   <input id="ans$id" type='textbox' size='10px'  name='$answer'  value="" />
	   $str2
	   <img id="pix$id" src='./images/clear.png' />
	   &nbsp;&nbps;&nbsp;$str3
	   <input id="ans2$id" type='textbox' size='10px'  name='$answer2'  value="" />
	   $str4
	   <img id="pix2$id" src='./images/clear.png' />
	   </div>
	   <p>\n
EOT;
return $quest;
}
?>