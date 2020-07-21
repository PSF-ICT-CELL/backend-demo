<html>
<head>
<title>Demo PHP PSF seed api </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div style="width:700px; margin:0 auto;">

<h3>Demo Create and Consume Simple REST API in PHP</h3>   

<form action="api.php" method="post">
 
  <div class="form-group">
    <label>Firstname</label>
    <input type="text" class="form-control" name="firstname" placeholder="Enter firstname">

  </div>
  
  <div class="form-group">
    <label>Lastname</label>
    <input type="text" class="form-control" name="lastname"  placeholder="Enter firstname">
  </div>
  
  <div class="form-group">
    <label>Date of Birth</label>
    <input type="text" class="form-control" name="dateofbirth" aria-describedby="info" placeholder="Enter e.g 2000-12-25.">

  </div>
  
 <div class="form-group">
    <label>Gender</label>
    <select  class="form-control" name="gender" >
      <option>M</option>
      <option>F</option>
    </select>
  
  </div>
  
    <div class="form-group">
    <label>Cell</label>
    <input type="text" class="form-control" name="cell"  placeholder="Enter firstname">
  </div>
  
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
<button name="read" type="submit" class="btn btn-primary">Read json data</button>
</form>

<br />

</div>
</body>
</html>