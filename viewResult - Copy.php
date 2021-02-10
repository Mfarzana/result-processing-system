<!DOCTYPE html>
<html>
<head>
	<title>Search Result</title>
	<link href="/rps/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<form action="" method="POST" class="form-horizontal" style="margin-top:10px">

<fieldset>

	 <h2 align="center">Your Result</h2>

	 <!-- Student ID Input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Student Id</label>  
  <div class="col-md-4">
  <input id="fn" name="fn" type="text" placeholder="student id" class="form-control input-md" required="">
</div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="semester">Semester</label>
  <div class="col-md-4">
    <select id="semester" name="semester" class="form-control input-md">
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

<!-- Viewing Result Here -->

		<div align="center" style="margin-top: 30px">
		<table align="center" border="1" cellspacing="0" cellpadding="0" width="600">
			<thead>
				<th>Student ID</th>
				<th>Course Code</th>
				<th>Semester</th>
				<th>GPA</th>
				<th>Credit</th>
			</thead>

			<?php
			  include_once('dbcon.php');
			  $sql = mysqli_query($conn,"SELECT marks.StudentDetail_studentId,marks.CourseDetail_courseCode,marks.Marks_courseSemester,marks.Marks_GPA,coursedetail.CourseDetail_courseCredit FROM marks,coursedetail WHERE marks.CourseDetail_courseCode=coursedetail.CourseDetail_courseCode AND marks.Marks_courseSemester=4 AND marks.StudentDetail_studentId='152-15-5892'");

			  $cgpa = 0;
			  $total_credit = 0;
			  $gpa_into_credit = 0;
			  $total_of_gpa_credit = 0;

			  while ($row = mysqli_fetch_array($sql)) {

			  	$total_credit = $total_credit+$row[4];
			  	$gpa_into_credit = $row[3]*$row[4];
			  	$total_of_gpa_credit = $total_of_gpa_credit+$gpa_into_credit;
			  	echo "<tr>
				<td>".$row[0]."</td>
				<td>".$row[1]."</td>
				<td>".$row[2]."</td>
				<td>".$row[3]."</td>
				<td>".$row[4]."</td>
				<td>".$gpa_into_credit."</td>
				
			</tr>";
			  }
			  echo $total_of_gpa_credit;
			  echo "<br>";
			  echo $total_credit;
			  $cgpa = number_format($total_of_gpa_credit/$total_credit,2);
			  echo "<br>";
			  //echo $cgpa;
			?>

		</table>

		<?php
			echo $cgpa;
		?>
			

		</div>
</fieldset>
	</form>

</body>
</html>