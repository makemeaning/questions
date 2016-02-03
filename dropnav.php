<nav class="navbar navbar-default "   width="100%"  >
  <?php
  $DNS = "localhost"; // "www.meta4systems.com";  // 
  ?>
  
  
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" style="float: left; margin-left:30px" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
	 
	
    <div class="collapse navbar-collapse" id="myNavbar">	  
	 <strong>
      <ul class="nav navbar-nav  " > <!--  style="background-color: #7094B7; color: #ffffff;"   -->
        <li class="dropdown"><a style="color: #000000;"  class="dropdown-toggle" data-toggle="dropdown" href="#" >Choose an Exercise</a></li>
        <li class="dropdown"><a style="color: #000000;"  class="dropdown-toggle" data-toggle="dropdown" href="#">Beginner<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a target="_self" href="http://<?php echo $DNS; ?>/question/showquest.php?file=question.txt&qtype=oneline" >Exercise 1</a></li>
            <li><a target="_self" href="http://<?php echo $DNS; ?>/question/showquest.php?file=question2.txt&qtype=oneline" >Exercise 2</a></li>
          </ul>
        </li>
       <li class="dropdown"><a style="color: #000000;"  class="dropdown-toggle" data-toggle="dropdown" href="#">Advanced<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a target="_self" href="http://<?php echo $DNS; ?>/question/showquest.php?file=question3.txt&qtype=oneline" >Exercise 3</a></li>
            <li><a target="_self" href="http://<?php echo $DNS; ?>/question/showquest.php?file=question4.txt&qtype=twoline" >Exercise 4</a></li>
       </ul>
        </li>
       <li class="dropdown"><a style="color: #000000;"  class="dropdown-toggle" data-toggle="dropdown" href="#">Vocabulary<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a target="_self" href="http://<?php echo $DNS; ?>/flashcards/flashcards.php" >Flash Cards</a></li>
        </ul>
        </li>       
      </ul>
	</strong>
   </div>
 </div>
</nav>