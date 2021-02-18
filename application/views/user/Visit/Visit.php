<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400"/>
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"/>
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/visit/style.css">

  
</head>

<body>
  <!-- =============================================================================
    
    Title: Simple Hotel booking form
    Description: Simple Clean form for booking a room
    Nerds name: Andi
    Site: http://andi.io
    Twitter: @gitmash
    Location: Zurich, Switzerland 

    ==== THANKS ==== 

    Forked from @soulrider911 https://codepen.io/soulrider911/pen/ugnyl/
    font: Lato (google font)
    Icon font:   http://fontawesome.io/icons/

    ==== @TODO ====

    Make <select> easier to select

========================================================================== -->
<form action="">
  <!--  General -->
  <div class="grid">
    <br>
  <div class="form-group">
    <h2 class="heading">Shelter of Hope Bacoor</h2>
    <div class="controls">
      <input type="text" id="name" class="floatLabel" name="name">
      <label for="name">Name</label>
    </div>
    <div class="controls">
      <input type="text" id="email" class="floatLabel" name="email">
      <label for="email">Email</label>
    </div>       
    <div class="controls">
      <input type="tel" id="phone" class="floatLabel" name="phone">
      <label for="phone">Mobile</label>
    </div>
      <div class="grid">
        <div class="col-2-3">
          <div class="controls">
           <input type="text" id="street" class="floatLabel" name="street">
           <label for="street">Street</label>
          </div>          
        </div>
        <div class="col-1-3">
          <div class="controls">
            <input type="text" id="street-number" class="floatLabel" name="street-number">
            <label for="street-number">City</label>
          </div>          
        </div>
      </div>
      <div class="grid">
        <div class="col-2-3">
          <div class="controls">
            <input type="text" id="city" class="floatLabel" name="city">
            <label for="city">City</label>
          </div>         
        </div>
        <div class="col-1-3">
          <div class="controls">
            <input type="text" id="post-code" class="floatLabel" name="post-code">
            <label for="post-code">Province</label>
          </div>         
        </div>
      </div>
  </div>

  <!--  Details -->
  <div class="form-group">
    <h2 class="heading">Details and Purpose</h2>
    <div class="grid">
    <div class="col-1-4 col-1-4-sm">
      <div class="controls">
        <input type="date" id="arrive" class="floatLabel" name="arrive" value="<?php echo date('Y-m-d'); ?>">
      
      </div>      
    </div>
    <div class="col-1-4 col-1-4-sm">
      <div class="controls">
        <input type="time" id="depart" class="floatLabel" name="depart" value="<?php echo time('h-m'); ?>" />
        
      </div>      
    </div>
      </div>
      <div class="grid">
    <div class="col-1-3 col-1-3-sm">
      <div class="controls">
        <i class="fa fa-sort"></i>
        <select class="floatLabel">
          <option value="blank"></option>
          <option value="1">1</option>
          <option value="2" selected>2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="more">More</option>
        </select>
        <label for="fruit"><i class="fa fa-male"></i>&nbsp;&nbsp;People</label>
      </div>      
    </div>
    <div class="col-1-3 col-1-3-sm">
    <div class="controls">
      <i class="fa fa-sort"></i>
      <select class="floatLabel">
        <option value="blank"></option>
        <option value="thesis" selected>Thesis</option>
        <option value="adoption">Adoption Visit</option>
        <option value="donation">Donation drop-off</option>
      </select>
      <label for="fruit">Purpose</label>
     </div>     
    </div>
      
     </div>
      <div class="grid">
        <br>
        <div class="controls">
          <textarea name="comments" class="floatLabel" id="comments"></textarea>
          <label for="comments">Comments</label>
          </div>
          <input type="checkbox" id="city" name="city">I agree to cancellation policy
          <br>
          <p class="info-text">No cancellation or rescheduling is permitted within 48 hour(s) of the appointment time.</p>
         <br>
            <button type="submit" value="Submit" class="col-1-4">Submit</button>
      </div>  
  </div> <!-- /.form-group -->
</form>
</div
  <script src='<?php echo base_url(); ?>http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='<?php echo base_url(); ?>http://raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery-ui-autocomplete.js'></script>
<script src='<?php echo base_url(); ?>http://raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery.select-to-autocomplete.js'></script>
<script src='<?php echo base_url(); ?>http://raw.githubusercontent.com/andiio/selectToAutocomplete/master/jquery.select-to-autocomplete.min.js'></script>

    <script src="<?php echo base_url(); ?>js/visit/index.js"></script>

</body>
</html>
