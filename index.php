<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="" type="image/png">
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body ng-app = "bootstrap-form">

<div class="header">
  <h1>Class Form</h1>
</div>
<div class="container">
  <div class="description">
    <h3>All Students need to fill this form as soon as possible</h3>
    <p>* Required</p>
  </div>
  <div class="row">
    <div class="formPart">

          <form class="" action="" method="post">
          <div class="form-group">
            <label for="">Name <span class="required">*</span></label>
            <input type="text" name="name" class="form-control" ng-model="name">
          </div>

          <div class="form-group">
            <label for="">Email </label>
            <input type="email" name="email" class="form-control" ng-model="emailadd">
          </div>

          <div class="form-group">
            <label for="">Mobile Number <span class="required">*</span></label>
            <input type="tel" name="number" class="form-control" ng-model="mobilenumber">
          </div>

          <div class="form-group">
            <label for="">College Name</label>
            <input type="text" name="college" class="form-control" ng-model="collegename">
          </div>

          <div class="form-group">
            <label for="">Year</label> <br>
            <input type="radio" name="year" value="1" ng-model = "year">1 <br>
            <input type="radio" name="year" value="2" ng-model = "year">2 <br>
            <input type="radio" name="year" value="3" ng-model = "year">3 <br>
            <input type="radio" name="year" value="4" ng-model = "year">4 <br>
          </div>

          <div class="form-group">
            <label for="">Department</label> <br>
            <input type="radio" name="department" value="CSE" ng-model="department">CSE <br>
            <input type="radio" name="department" value="IT" ng-model="department">IT <br>
            <input type="radio" name="department" value="ECE" ng-model="department">ECE <br>
            <input type="radio" name="department" value="EEE" ng-model="department">EEE <br>
            <input type="radio" name="department" value="Civil" ng-model="department">Civil <br>
            <input type="radio" name="department" value="Mechanical" ng-model="department">Mechanical <br>
          </div>

          <div class="form-group">
            <label>Something about yourself</label>
              <textarea name="name" rows="5" cols="40" class="form-control" ng-model = "about"></textarea>
          </div>

          <div class="row checkboxes">
            <div class="col-sm-6">
          <div class="checkbox getEmail">
            <label><input type="checkbox" name="getmail" value="getmail" class="getEmailCheck">Receive email of your response</label>
          </div>
          </div>

          <div class="col-sm-6">
          <div class="checkbox preview">
            <label><input type="checkbox" name="preview" value="preview" class="previewCheck" >Preview your response</label>
          </div>
          </div>
          </div>

          <div class="buttons">
            <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg submit">
            <input type="reset" name="reset" value="Reset" class="btn btn-warning btn-lg reset">
          </div>

          </form>
      </div>

      <div class="hidden responsePart">
        <h1 class="response">Your Response</h1>
        <div class="row">
          <div class="col-md-6 center">
            <span class="reslabel">Name : </span>
          </div>
          <div class="col-md-6">
            <span ng-bind="name"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 center">
            <span class="reslabel">Email : </span>
          </div>
          <div class="col-md-6">
            <span ng-bind="emailadd"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 center">
            <span class="reslabel">Mobile Number : </span>
          </div>
          <div class="col-md-6">
            <span ng-bind="mobilenumber"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 center">
            <span class="reslabel">College Name : </span>
          </div>
          <div class="col-md-6">
            <span ng-bind="collegename"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 center">
            <span class="reslabel">Year : </span>
          </div>
          <div class="col-md-6">
            <span ng-bind="year"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 center">
            <span class="reslabel">Department : </span>
          </div>
          <div class="col-md-6">
            <span ng-bind="department"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 center">
            <span class="reslabel">Something about yourself : </span>
          </div>
          <div class="col-md-6">
            <span ng-bind="about"></span>
          </div>
        </div>


      </div>

</div>



<!--Script FIles included here -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<!--Script FIles included here -->
<script >
    angular.module('bootstrap-form',[]);

</script>
<script type="text/javascript">
  $(".previewCheck").click(function(){
    if($(".previewCheck").is(":checked") == true){
      $(".responsePart").addClass("col-md-6");
      $(".responsePart").removeClass("hidden");
      $(".formPart").addClass("col-md-6");
    }
    else{
      $(".responsePart").removeClass("col-md-6");
      $(".responsePart").addClass("hidden");
      $(".formPart").removeClass("col-md-6");
    }
  })
  console.log($(".previewCheck").is(":checked"))

</script>
</body>

</html>
