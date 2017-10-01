    <?php  
//export.php  
    $dbhost = "localhost";
          $dbuser = "banatith_arpit";
          $dbpass = "support123";
$link = mysqli_connect($dbhost, $dbuser, $dbpass, "banatith_form");
$output = '';
if(isset($_GET["submit"]))
{
 $query = "SELECT * FROM students";
 $result = mysqli_query($link, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th>  
                         <th>Email Address</th>  
                         <th>Mobile Number</th>  
                         <th>Colllege Name</th>
                         <th>Year</th>
                         <th>Department</th>
                         <th>About</th>

                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["name"].'</td>  
                         <td>'.$row["email"].'</td>  
                         <td>'.$row["mobile_number"].'</td>  
                         <td>'.$row["college_name"].'</td>  
                         <td>'.$row["year"].'</td>
                         <td>'.$row["department"].'</td>
                         <td>'.$row["about"].'</td>

                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?> 