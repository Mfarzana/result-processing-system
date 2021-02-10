<?php
include_once('dbcon.php');

	if(isset($_POST['update'])){

		$AttMark = $_POST['attMark'];
		$ClassTest=$_POST["classTest"];
		$Presentation=$_POST["presentation"];
		$Assignment=$_POST["assignment"];
		$Mid=$_POST["mid"];
		$FinalMark=$_POST["finalMark"];
		$CourseSemester=$_GET["semester"];
		$CourseCode=$_GET["code"];
		$StudentID=$_GET["std_id"];

		$sql="UPDATE marks 
		SET Marks_attandence=$AttMark,Marks_ClassTestAvg=$ClassTest,Marks_presentation=$Presentation,Marks_assignment=$Assignment,Marks_midExam=$Mid,Marks_finalExam=$FinalMark
		WHERE StudentDetail_studentId='$StudentID' AND `CourseDetail_courseCode`='$CourseCode' AND `Marks_courseSemester`=$CourseSemester";
	
	if(!mysqli_query($conn,$sql)){
	echo "<script>alert('ঢুকে না্ই !!');</script>";

	}else
    echo "<script>alert('ঢুকছে ');</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Marks</title>
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

	form{
		margin-top:100px;
	}

</style>

</head>
<body>
<form action="" method="post">
		<h1 align="center">Mark Edit</h1>
 <div align="center" style="margin-top: 30px">
			
			<?php
			$std_id=$_GET["std_id"];
			$course_code=$_GET["code"];
			$semester=$_GET["semester"];
			?>

            <table align="center" border="1" cellspacing="0" cellpadding="0" width="700">
                <thead>
                <th>Student Id</th>
                <th>Course Code</th>
                <th>Atta</th>
                <th>CT</th>
                <th>Pres</th>
                <th>Assign</th>
                <th>Mid</th>
                <th>Final</th>
                </thead>

                <?php
                
                $sql=  mysqli_query($conn,"SELECT `StudentDetail_studentId`,`Marks_attandence`,`Marks_ClassTestAvg`,`Marks_presentation`,`Marks_assignment`,`Marks_midExam`,`Marks_finalExam`,`Marks_total`,`Marks_grade`,`Marks_GPA` FROM `marks` WHERE StudentDetail_studentId='$std_id' AND `CourseDetail_courseCode`='$course_code' AND `Marks_courseSemester`=$semester");

                /*$sql=  mysqli_query($conn,"SELECT `StudentDetail_studentId`,`Marks_attandence`,`Marks_ClassTestAvg`,`Marks_presentation`,`Marks_assignment`,`Marks_midExam`,`Marks_finalExam`,`Marks_total`,`Marks_grade`,`Marks_GPA` FROM `marks` WHERE StudentDetail_studentId='$std_id' AND `CourseDetail_courseCode`='$course_code' AND `Marks_courseSemester`=$semester");*/
                $row = mysqli_fetch_array($sql);
                ?>

               <tr>
               <td><label><?php echo $std_id ?></label></td>
               <td><label><?php echo $course_code ?></label></td>
               <td><input type="text" name="attMark" value="<?php echo $row[1]?>"></td>
			   <td><input type="text" name="classTest" value="<?php echo $row[2]?>"></td>
			   <td><input type="text" name="presentation" value="<?php echo $row[3]?>"></td>
			   <td><input type="text" name="assignment" value="<?php echo $row[4]?>"></td>
			   <td><input type="text" name="mid" value="<?php echo $row[5]?>"></td>
			   <td><input type="text" name="finalMark" value="<?php echo $row[6]?>"></td>
			   </tr>
<!--               	while ($row = mysqli_fetch_array($sql)) {
                    echo "<tr>
                    <td>".$row[0]."</td>
                    <td>".$row[1]."</td>
                    <td>".$row[2]."</td>
                    <td>".$row[3]."</td>
                    <td>".$row[4]."</td>
                    <td>".$row[5]."</td>
                    <td>".$row[6]."</td>
                    <td>".$row[7]."</td>
                    <td>".$row[8]."</td>
                    <td>".$row[9]."</td>
                    </tr>";
                    }
                    ?>
-->
                
                
            </table>
            <br>
            <input type="submit" name="update" value="SUBMIT" style="float: center;">
 </div>
</form>

</body>
</html>