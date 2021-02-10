<html>
<head>
    <title>
    Student Detail Entry
    </title>
   <link href="/rps/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form class="form-horizontal" style="margin-top:10px">
<fieldset>

<!-- Form Name -->
    <legend><h2 align="center">Student Registration Form</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Full name</label>  
  <div class="col-md-4">
  <input id="fn" name="fn" type="text" placeholder="full name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Parmanent Address</label>  
  <div class="col-md-4">
  <textarea class="form-control" id="address" rows="3" placeholder="parmanent address"></textarea>
      <!--<input id="address" name="address" type="text" placeholder="parmanent address" class="form-control input-md" required=""> -->
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="email" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mobile">Mobile no</label>  
  <div class="col-md-4">
  <input id="mobile" name="mobile" type="text" placeholder="mobile no" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="city">Date of Birth</label>  
  <div class="col-md-4">
  <input id="dob" name="dob" type="date" placeholder="date of birth" class="form-control input-md" required="">
    
  </div>
</div>
    
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Select Gender</label>
  <div class="col-md-4">
    <select id="gender" name="gender" class="form-control input-md">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Student ID</label>  
  <div class="col-md-4">
  <input id="studentid" name="studentid" type="text" placeholder="student id" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Department</label>  
  <div class="col-md-4">
  <input id="department" name="department" type="text" placeholder="department" class="form-control input-md" required="">
    
  </div>
</div>




<!-- Multiple Radios (inline) 
<div class="form-group">
  <label class="col-md-4 control-label" for="Dinner">Would you like to attend our Networking Dinner on September 4, 2015?</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="Dinner-0">
      <input type="radio" name="Dinner" id="Dinner-0" value="dinner_yes" checked="checked">
      Yes
    </label> 
    <label class="radio-inline" for="Dinner-1">
      <input type="radio" name="Dinner" id="Dinner-1" value="dinner_no">
      No
    </label>
  </div>
</div>
-->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">SUBMIT</button>
  </div>
</div>

</fieldset>
</form>
    </body>
</html>