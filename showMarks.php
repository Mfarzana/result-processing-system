<html>
    <head>
        <title>Showing Inserted Marks</title>
		<link href="/rps/css/bootstrap.min.css" rel="stylesheet">
        <style>
            div{
                margin-left: 50px;
            }
            
        </style>   
    </head>
    <body>
	 <form action="" method="post">
        <div align="center">
         <h2>Marks Inserted by Faculty</h2><br>
            
         <table>
             <tr>
                <td>
                <label>Please Select Course Code:   </label>  
                </td>
                <td align="right">
                <select name="courseCode1">
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
            </tr>
            <tr>
                <td>
                <label>Please Select Semester:   </label>  
                </td>
                <td align="right">
                <select name="CourseSemester1">
			    <option value="" selected>--Select Semester--</option>
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
                </td>
            </tr>
            <tr>
                <td></td>
                <td> <br>
                <input type="submit" name="submit" value="SUBMIT" style="float: right;">
                </td>
            </tr>
          </table>
        </div>
	 </form>		
        <br>
        <br>
		
		<div align="center">
            <table align="center" border="1" cellspacing="0" cellpadding="0" width="700">
                <thead>
                <th>Student Id</th>
                <th>Atta</th>
                <th>CT</th>
                <th>Pres</th>
                <th>Assign</th>
                <th>Mid</th>
                <th>Final</th>
                <th>Total</th>
                <th>Grade</th>
                <th>GPA</th>
                <th>Action</th> 
                </thead> 
		
		<?php
		include_once('dbcon.php');
        $abc='';

		@$couresCode1 = $_POST['courseCode1'];
		@$courseSemester1 = $_POST['CourseSemester1'];
		@$sql=  mysqli_query($conn,"SELECT `StudentDetail_studentId`,`Marks_attandence`,`Marks_ClassTestAvg`,`Marks_presentation`,`Marks_assignment`,`Marks_midExam`,`Marks_finalExam`,`Marks_total`,`Marks_grade`,`Marks_GPA` FROM `marks` WHERE `CourseDetail_courseCode`='$couresCode1' AND `Marks_courseSemester`='$courseSemester1'");
		//echo "SELECT `StudentDetail_studentId`,`Marks_attandence`,`Marks_ClassTestAvg`,`Marks_presentation`,`Marks_assignment`,`Marks_midExam`,`Marks_finalExam`,`Marks_total`,`Marks_grade`,`Marks_GPA` FROM `marks` WHERE `CourseDetail_courseCode`='$couresCode1' AND `Marks_courseSemester`=$courseSemester1";
		
		if(isset($_POST['submit'])){
			//echo "<script>alert('dhukse');</script>";
            $course_code_for_edit=$couresCode1;
            $course_semester_for_edit=$courseSemester1;

            echo $course_code_for_edit;
            echo "<br>";
            echo $course_semester_for_edit;

            $std_id='';
            $course_code='';

                $i=1;
                    while ($row = mysqli_fetch_array($sql)) {
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
                    <td align='center'>
                    <a href='edit.php?std_id=$row[0]&code=$course_code_for_edit&semester=$course_semester_for_edit'>Edit</a> |
                    <a href=#''>Delete</a>
                    </td>
                    </tr>";
                    $i++;
                }
		}
				
                ?>         
            </table>    
        </div>	
    </body> 
</html>