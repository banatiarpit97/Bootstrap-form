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
      <?php
      if($_GET['submit']){
        if(!$_GET["Studentname"]){
          $errors .= "<p>Enter your name<p>";
        }
        if(!($_GET['email'])){
          $errors .= "<p>Enter your email<p>";
        }
        if(!($_GET['number'])){
          $errors .= "<p>Enter your Mobile Number`<p>";
        }
        if(!($_GET['year'])){
          $errors .= "<p>Enter your year<p>";
        }
        if(!($_GET['department'])){
          $errors .= "<p>Enter your departemnt<p>";
        }


      if($errors){
        echo "<div class = 'alert alert-danger'>$errors</div>";
      }
      else{
        $name = $_GET['Studentname'];
        $email = $_GET['email'];
        $number = $_GET['number'];
        $college = $_GET['college'];
        $year = $_GET['year'];
        $department = $_GET['department'];
        $about = $_GET['about'];
        $to = $email;
        $subject = "your Class Form response";
        $message = "<html><body>
                    <h3>Your 'Class Form' response</h3>
                    <div><span><b>Name : </b></span><span> $name</span></div>
                    <div><span><b>Email : </b></span><span> $email</span></div>
                    <div><span><b>Mobile Number : </b></span><span> $number</span></div>
                    <div><span><b>College Name : </b></span><span> $college</span></div>
                    <div><span><b>Year : </b></span><span> $year</span></div>
                    <div><span><b>Department : </b></span><span> $department</span></div>
                    <div><span><b>Something about yourself : </b></span><span> $about</span></div>
                     </body></html>";
        $headers = "Content-type:text/html" ."\r\n";
        $headers .= "From: arpit@banati.in" ."\r\n";
        $headers .= "Bcc: arpitbanati97@gmail.com" ."\r\n";
          if(isset($_GET['getmail'])){
              $mail = mail($to, $subject, $message, $headers);
          }
          $dbhost = "localhost";
          $dbuser = "banatith_arpit";
          $dbpass = "support123";
          $link = mysqli_connect($dbhost, $dbuser, $dbpass, "banatith_form");

          if(!$link){
          	die("Could not Connect".mysql_error());
          }
          else{
              $name = filter_var($name, FILTER_SANITIZE_STRING);
          		$name = mysqli_real_escape_string($link, $name);
              $email = filter_var($email, FILTER_SANITIZE_EMAIL);
          		$email = mysqli_real_escape_string($link, $email);
          		$number = mysqli_real_escape_string($link, $number);
              $college = filter_var($college, FILTER_SANITIZE_STRING);
          		$college = mysqli_real_escape_string($link, $college);
          		$year = mysqli_real_escape_string($link, $year);
              $department = filter_var($department, FILTER_SANITIZE_STRING);
          		$department = mysqli_real_escape_string($link, $department);
              $about = filter_var($about, FILTER_SANITIZE_STRING);
          		$about = mysqli_real_escape_string($link, $about);
          		$sql ="INSERT INTO students (name, email, mobile_number, college_name, year, department, about) VALUES('$name', '$email', '$number', '$college', '$year', '$department', '$about')";
          		$retval = mysqli_query($link, $sql);

          		if(!$retval){
                echo "values not inserted".mysqli_error($link);
          		}
          		else{
                         echo "<script> location.href='http://banati.thecompletewebhosting.com/Bootstrap-form/thanks.php'; </script>";
                         exit;
          		}
          	}
          

      }
    }

      ?>




          <form method="get" action="" name="classform" id="form">
          <div class="form-group">
            <label for="">Name <span class="required">*</span></label>
            <input type="text" name="Studentname" class="form-control" ng-model="name">
          </div>

          <div class="form-group">
            <label for="">Email <span class="required">*</span></label>
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
            <label for="">Year <span class="required">*</span></label> <br>
            <input type="radio" name="year" value="1" ng-model = "year">1 <br>
            <input type="radio" name="year" value="2" ng-model = "year">2 <br>
            <input type="radio" name="year" value="3" ng-model = "year">3 <br>
            <input type="radio" name="year" value="4" ng-model = "year">4 <br>
          </div>

          <div class="form-group">
            <label for="">Department <span class="required">*</span></label> <br>
            <input type="radio" name="department" value="CSE" ng-model="department">CSE <br>
            <input type="radio" name="department" value="IT" ng-model="department">IT <br>
            <input type="radio" name="department" value="ECE" ng-model="department">ECE <br>
            <input type="radio" name="department" value="EEE" ng-model="department">EEE <br>
            <input type="radio" name="department" value="Civil" ng-model="department">Civil <br>
            <input type="radio" name="department" value="Mechanical" ng-model="department">Mechanical <br>
          </div>

          <div class="form-group">
            <label>Something about yourself</label>
              <textarea name="about" rows="5" cols="40" class="form-control" ng-model = "about"></textarea>
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
            <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg submit" >
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

</script>
</body>

</html>
