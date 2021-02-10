<!DOCTYPE html>
<html>
<head>
	<title>Search Result</title>
	<link href="/rps/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<form action="" method="POST" class="form-horizontal" style="margin-top:10px">

<fieldset>
<div class="container">
	 <h2 align="center">Search your result</h2>

	 <!-- Student ID Input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Student Id</label>  
  <div class="col-md-4">
  <input id="studentId" name="studentId" type="text" placeholder="student id" class="form-control input-md" required="">
</div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="semester">Semester</label>
  <div class="col-md-4">
    <select id="semester" name="semester" class="form-control input-md" required="">
      <option value="">--Select Semester--</option>
      <?php
				include_once "dbcon.php";
				$query="SELECT distinct Marks_courseSemester FROM Marks order by Marks_courseSemester";
				$getCourseSemester = mysqli_query($conn,$query);
				while($row1 = mysqli_fetch_array($getCourseSemester)):;
				?>
				
				<option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
				<?php
				endwhile;
	   ?>
      
    </select>
  </div>
</div>

<!-- Button Show Result -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Show Result</button>
  </div>
</div>
</div>

<!-- Viewing Result Here -->

		<div align="center" class="container" style="margin-top: 30px;">
		<label><h2>Academic Result</h2></label>
		<table class="table table-bordered">
		
		<!--<table align="center" border="1" cellspacing="0" cellpadding="0" width="600">-->
			<thead>
				<th class="col-md-2">Course Code</th>
				<th class="col-md-4">Title</th>
				<th class="col-md-1">Credit</th>
				<th class="col-md-1">Grade Point</th>
			</thead>


			<?php
			  include_once('dbcon.php');
			  	@$course_semester = $_POST['semester'];
			    @$student_id = $_POST['studentId'];
			  @$sql = mysqli_query($conn,"SELECT marks.StudentDetail_studentId,marks.CourseDetail_courseCode,marks.Marks_courseSemester,marks.Marks_GPA,coursedetail.CourseDetail_courseCredit,coursedetail.CourseDetail_courseName FROM marks,coursedetail WHERE marks.CourseDetail_courseCode=coursedetail.CourseDetail_courseCode AND marks.Marks_courseSemester=$course_semester AND marks.StudentDetail_studentId='$student_id'");

			  
			  $cgpa = 0;
			  $total_credit = 0;
			  $gpa_into_credit = 0;
			  $total_of_gpa_credit = 0;
			  //$credit_and_sgpa_message = null;
			  $message= null;

			  if(isset($_POST['submit'])){
			  	$rows = mysqli_num_rows($sql);
			  	if ($rows>0){

			   while ($row = mysqli_fetch_array($sql)) {

			  	$total_credit = $total_credit+$row[4];
			  	$gpa_into_credit = $row[3]*$row[4];
			  	$total_of_gpa_credit = $total_of_gpa_credit+$gpa_into_credit;
			  	
			  	echo "<tr>
				<td>".$row[1]."</td>
				<td>".$row[5]."</td>
				<td>".$row[4]."</td>
				<td>".$row[3]."</td>	
			</tr>";
			  }

			  echo "<br>";
			  echo "Viewing Result of Student ID: ".$student_id." Semester: ".$course_semester;
			  echo "<br>";

			  $cgpa = number_format($total_of_gpa_credit/$total_credit,2);
			  echo "<br>";
			  //echo $cgpa;
			  $message = "Total Credit Taken: ".$total_credit." SGPA: ".$cgpa;

			}else{
			echo "<br>";
			echo "Viewing Result of Student ID: ".$student_id." Semester: ".$course_semester;
			$message="No Result Found";
		}
		}

			?>

		</table>

		<?php
			echo "<br>";
			echo $message;
			echo "<br";
			//echo $credit_and_sgpa_message;
			echo "<br>";
			
		?>
			

		</div>
</fieldset>
	</form>

</body>
</html>