<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><style>
html,body,h1,h2,h3,h4,h5 {font-family: "RobotoDraft", "Roboto", sans-serif;}
.w3-bar-block .w3-bar-item{padding:16px}
</style>
<body>

<br><br><br>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card-2" style="z-index:3;width:320px;" id="mySidebar">

  <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" 
  class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align" onclick="document.getElementById('id01').style.display='block'">New Message <i class="w3-padding fa fa-pencil"></i></a>
  <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-inbox w3-margin-right"></i>Inbox (<?=$countmail?>)<i class="fa fa-caret-down w3-margin-left"></i></a>

  <div id="Demo1" class="w3-hide w3-animate-left">

  <?php 
$to = $this->session->userdata('email');
$que = "SELECT * FROM tblmail WHERE mailto = '$to'";
$query = $this->db->query($que);

foreach ($query->result() as $row)
{
?> 
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('Borge');w3_close();" id="firstTab">
        <div class="w3-container">
            <img class="w3-round w3-margin-right" src='<?= base_url()."assets/img/wonder.png" ?>' style="width:15%;"><span class="w3-opacity w3-large">Wonder Woman</span>
            <h6>Subject: <?=$row->subject?></h6>
            <p><?=$row->message?></p>
        </div>
    </a>
<?php
}
?>

  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-paper-plane w3-margin-right"></i>Sent</a>
</nav>

<!-- Modal that pops up when you click on "New Message" -->
<form action='<?= base_url()."user/send_mail"?>' id="contact-form" method='POST'>
<div id="id01" class="w3-modal" style="z-index:4">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-padding w3-red">
       <span onclick="document.getElementById('id01').style.display='none'"
       class="w3-button w3-red w3-right w3-xxlarge"><i class="fa fa-remove"></i></span>
      <h2>Send Mail</h2>
    </div>
    <div class="w3-panel">
      <label>To</label>
      <input class="w3-input w3-border w3-margin-bottom" id="prependedInput" size="16" type="text" name="send" placeholder="Email">
      <label>From</label>
      <input class="w3-input w3-border w3-margin-bottom" id="prependedInput" size="16" type="text" name="from" placeholder="From">
      <label>Subject</label>
      <input class="w3-input w3-border w3-margin-bottom" name="subject" type="text">
      <input class="w3-input w3-border w3-margin-bottom" style="height:150px" name="message" placeholder="What's on your mind?">
      <div class="w3-section">
        <a class="w3-button w3-red" onclick="document.getElementById('id01').style.display='none'">Cancel  <i class="fa fa-remove"></i></a>
        <input type="submit" class="btn btn-warning" value="Send Message">
      </div>    
    </div>
  </div>
</div>
</form>
<!-- Overlay effect when opening the side navigation on small screens -->

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>

<!-- Page content -->

<div class="w3-main" style="margin-left:320px;">
<i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
<a href="javascript:void(0)" class="w3-hide-large w3-red w3-button w3-right w3-margin-top w3-margin-right" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-pencil"></i></a>

<?php 
$to = $this->session->userdata('email');
$que = "SELECT * FROM tblmail WHERE mailto = '$to'";
$query = $this->db->query($que);

foreach ($query->result() as $row)
{
?>
<div id="Borge" class="w3-container person">
  <br>
  <h5 class="w3-opacity">Subject: <?=$row->subject?></h5>
  <h4><i class="fa fa-clock-o"></i> From <?=$row->mailfrom?>  </h4>
  <a class="w3-button w3-light-grey w3-show" href="javascript:void(0)">Reply<i class="w3-margin-left fa fa-mail-reply"></i></a>
  <hr>
  <p><?=$row->message?></p>
</div>    
<?php
}
?>


<!--
<div id="Jane" class="w3-container person">
  <br>
  <h5 class="w3-opacity">Subject: None</h5>
  <h4><i class="fa fa-clock-o"></i> From Admin Alyssa, July 2, 2017.</h4>
  <a class="w3-button w3-light-grey">Reply<i class="w3-margin-left fa fa-mail-reply"></i></a>
  <a class="w3-button w3-light-grey">Forward<i class="w3-margin-left fa fa-arrow-right"></i></a>
  <hr>
  <p>Thank you for registering, we'll do our best to give you the best rescue shelter in the philippines</p>
  <p>Best Regards,<br>Admin Alyssa</p>
</div> 
-->
     
</div>

<script>
var openInbox = document.getElementById("myBtn");
openInbox.click();

function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

function myFunc(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show"; 
        x.previousElementSibling.className += " w3-red";
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-red", "");
    }
}

openMail("Borge")
function openMail(personName) {
    var i;
    var x = document.getElementsByClassName("person");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    x = document.getElementsByClassName("test");
    for (i = 0; i < x.length; i++) {
       x[i].className = x[i].className.replace(" w3-light-grey", "");
    }
    document.getElementById(personName).style.display = "block";
    event.currentTarget.className += " w3-light-grey";
}
</script>

<script>
var openTab = document.getElementById("firstTab");
openTab.click();
</script>

</body>
</html> 
