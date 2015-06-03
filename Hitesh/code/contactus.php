<!doctype html>
<html lang='EN'>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
   <link rel="stylesheet" href="css/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/script.js"></script>
   <title>Online Exhibition</title>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='index.php'><img src="images/logo.jpg"></a></li>
   
   <li><a href='index.php'>Home</a></li>
   <li><a href='services.php'>Services</a></li>
   <li><a href='about.php'>About Us</a></li>
   <li class='active'><a href='contactus.php'>Contact Us</a></li>
   
   <li><a href='register.php'>Sign Up</a></li>
   <li><a href='login.php'>Log in</a></li>
 
</ul>
</div>

<!--contact form-->
<br>
<br>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script><!--Jquery JS-->


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"><!--bootstrap CSS-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script><!--bootstrap JS-->



<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css" rel="stylesheet"><!--Jquery UI CSS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script><!--Jquery UI JS-->





<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<center><legend>Reach Us</legend></center>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cname">Organization Name</label>  
  <div class="col-md-6">
  <input id="cname" name="cname" type="text" placeholder="name of company/organization" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="domain">Domain</label>
  <div class="col-md-4">
    <select id="domain" name="domain" class="form-control">
      <option value="1">Medical</option>
      <option value="2">Housing / Infrastructure</option>
      <option value="3">Electronics</option>
      <option value="4">Consumer Goods</option>
      <option value="5">Manufacturing</option>
      <option value="6">I.T.</option>
      <option value="7">Travel / Tourism</option>
      <option value="8">Telecom</option>
      <option value="9">Entertainment</option>
      <option value="10">Sports</option>
      <option value="11">Education</option>
      <option value="12">Investment / Insurance</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pocname">Your Name</label>  
  <div class="col-md-5">
  <input id="pocname" name="pocname" type="text" placeholder="enter your name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pocemail">Email</label>  
  <div class="col-md-5">
  <input id="pocemail" name="pocemail" type="text" placeholder="enter your email" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="poccontact">Contact No.</label>  
  <div class="col-md-5">
  <input id="poccontact" name="poccontact" type="text" placeholder="enter your contact no." class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pocsubject">Subject </label>  
  <div class="col-md-5">
  <input id="pocsubject" name="pocsubject" type="text" placeholder="enquiry / general / feedback / etc. " class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>


</body>
<html>
