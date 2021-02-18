<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Railway", sans-serif}
.menu {display: none}
</style>
<body>


<!-- Menu Container -->
<div class="w3-container w3-padding-64 w3-medium" id="menu">
  <div class="w3-content">
  
    <h4 class="w3-center w3-xxlarge" style="margin-bottom:30px">Pet's Information</h4>
    <?= form_hidden('petid', $animals->petid) ?>
    <font color="red"><?=isset($error)?$error: ""?></font>

    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Profile');" id="myLink">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Profile</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Health');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Health</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Videos');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Videos</div>
      </a>
    </div>

    <div id="Profile" class="w3-container menu w3-padding-32 w3-white">
      <h4><b>Pet's Name</b></h4>
      <p class="w3-text-grey"><?= $animals->petname ?></p>
      <hr>
   
      <h4><b>Pet's Age</b></h4>
      <p class="w3-text-grey"><?= $animals->petage ?></p>
      <hr>
      
      <h4><b>Description</b></h4>
      <p class="w3-text-grey"><?= $animals->description ?></p>
      <hr>

      <h4><b>Location of Rescue</b></h4>
      <p class="w3-text-grey"><?= $animals->locationrescue ?></p>
      <hr>

      <h4><b>Date of Rescue</b></h4>
      <p class="w3-text-grey"><?= $animals->daterescue ?></p>
      <hr>
    </div>

    <div id="Health" class="w3-container menu w3-padding-32 w3-white">
      <h4><b>Health</b></h4>
      <p class="w3-text-grey"><?= $animals->health ?></p>
      <hr>
    </div>


    <div id="Videos" class="w3-container menu w3-padding-32 w3-white">
      <h4><b></b> <span class="w3-right w3-tag w3-dark-grey w3-round"></span></h4>
      <p class="w3-text-grey">No uploaded videos yet:(</p>
    </div><br>

  </div>
</div>


<!-- Add Google Maps -->
<script>

// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>

</body>
</html>
