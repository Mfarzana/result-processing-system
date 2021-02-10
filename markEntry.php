<?php

include_once "dbcon.php";
if(isset($_POST['submit'])){
	
$AttMark = $_POST['attMark'];
$ClassTest=$_POST["classTest"];
$Presentation=$_POST["presentation"];
$Assignment=$_POST["assignment"];
$Mid=$_POST["mid"];
$FinalMark=$_POST["finalMark"];
$CourseSemester=$_POST["semester"];
$CourseCode=$_POST["courseCode"];
$StudentID=$_POST["studentId"];

$TotalMark = $AttMark+$ClassTest+$Presentation+$Assignment+$Mid+$FinalMark;
$Grade=null;
$GPA=null;

//25/11/2016
/*$sql_for_credit = mysqli_query($conn, "SELECT CourseDetail_courseCredit FROM coursedetail WHERE CourseDetail_courseCode='$CourseCode'");
$query_result = mysqli_fetch_array($sql_for_credit);*/

if($TotalMark>79){
	$Grade="A+";
	$GPA=4.00;
}
elseif($TotalMark>74){
	$Grade="A";
	$GPA=3.75;
}
elseif($TotalMark>69){
	$Grade="A-";
	$GPA=3.50;
}
elseif($TotalMark>64){
	$Grade="B+";
	$GPA=3.25;
}
elseif($TotalMark>59){
	$Grade="B";
	$GPA=3.00;
}
elseif($TotalMark>54){
	$Grade="B-";
	$GPA=2.75;
}
elseif($TotalMark>49){
	$Grade="C+";
	$GPA=2.50;
}
elseif($TotalMark>44){
	$Grade="C";
	$GPA=2.25;
}
elseif($TotalMark>39){
	$Grade="D";
	$GPA=2.00;
	
}
else{
	$Grade="F";
	$GPA=0.00;
}

//25/11/2016
/*$credit_into_GPA = $GPA*$query_result[0];
echo $query_result[0];
echo "creditIntoGPA: $credit_into_GPA";*/

//echo "Grade: $Grade";
//echo " Total Mark is: $TotalMark";


$sql="INSERT INTO marks(Marks_attandence,Marks_ClassTestAvg,`Marks_presentation`,`Marks_assignment`,`Marks_midExam`,`Marks_finalExam`,Marks_total,Marks_grade,`Marks_GPA`,`Marks_courseSemester`,`CourseDetail_courseCode`,`StudentDetail_studentId`)
VALUES($AttMark,$ClassTest,$Presentation,$Assignment,$Mid,$FinalMark,$TotalMark,'$Grade',$GPA,$CourseSemester,'$CourseCode','$StudentID')";


if(!mysqli_query($conn,$sql)){
	echo "<script>alert('ঢুকে না্ই !!');</script>";

}else
   echo "<script>alert('ঢুকছে ');</script>";

}

?>


<html>
<head>
<title>Entry Result</title>
<link href="/rps/css/bootstrap.min.css" rel="stylesheet">

<style>
   th,td,table{
		border: 1px solid black;
		border-collapse: collapse;
   }
   th,td{
		padding: 3px;	
   }
   
   input[type="text"]
      {
         width: 60px;
         border: 1px solid #CCC;
      }
	  select
      {
         width: 120px;
		 }
	form{
		margin-top:100px;
	}

</style>

</head>
<body>
	
	<form action="" method="post">
		<h1 align="center">Mark Entry</h1>
	<div style="overflow-x:auto;" align="center">
		<table>
			<tr>
			  <th style="width:20px">Course Code</th>
			  <th style="width:20px">Student ID</th>
			  <th colspan="6">Mark</th>
			  <th>Semester</th>
			</tr>
			
			<tr>
			  <td> </td>
			  <td> </td>
			  <td>Att</td>
			  <td>CT</td>
			  <td>Pres</td>
			  <td>Assign</td>
			  <td>Mid</td>
			  <td>Final</td>
			  <td> </td>
			</tr>
			
	
			<tr>
			   <td>
			   <select name="courseCode">
			   <option value="" selected>--Select Course--</option>
			<?php
					include_once "dbcon.php";
					$query="SELECT * FROM coursedetail";
					
					$getCourseCode = mysqli_query($conn,$query);
					while($row1 = mysqli_fetch_array($getCourseCode)):;
				?>
				<option value="<?php echo $row1[2]; ?>"><?php echo $row1[2]; ?></option>
				<?php
					endwhile;
				?>
			   </select>
			   
			   </td>
			   <td>
			   	<select name="studentId">
			   <option value="" selected>--Select Student--</option>
					<?php
					include_once "dbcon.php";
					$query="SELECT * FROM StudentDetail";
					
					$getCourseCode = mysqli_query($conn,$query);
					while($row1 = mysqli_fetch_array($getCourseCode)):;
					?>
				<option value="<?php echo $row1[1]; ?>"><?php echo $row1[1]; ?></option>
					<?php
					endwhile;
					?>
			   </select> </td>
			   
			   <td><input type="text" name="attMark"></td>
			   <td><input type="text" name="classTest" ></td>
			   <td><input type="text" name="presentation"></td>
			   <td><input type="text" name="assignment"></td>
			   <td><input type="text" name="mid"></td>
			   <td><input type="text" name="finalMark"></td>
			   <td><input type="text" name="semester"></td>
			</tr>	
		</table>
		<br>
		<br>
		<input type="submit" name="submit" value="SUBMIT" style="float: center;">
		
	</div>
	</form>
	<!--
	<br><br><br><br>
		AttMark: <input type="text" name="attMark"><br>
		ClassTest: <input type="text" name="classTest"><br>
		Presentation: <input type="text" name="presentation"><br>
		Assignment: <input type="text" name="assignment"><br>
		Mid: <input type="text" name="mid"><br>
		Final: <input type="text" name="finalMark"><br>
		CourseSemester: <input type="text" name="semester"><br>
		CourseCode: <input type="text" name="courseCode"><br>
		StudentID: <input type="text" name="studentId"><br><br>
		-->
	
</body>
</html>