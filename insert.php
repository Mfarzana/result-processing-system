<?php

include_once "dbcon.php";

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

if($TotalMark>79){
	$Grade="A+";
}
elseif($TotalMark>74){
	$Grade="A";
}
elseif($TotalMark>69){
	$Grade="A-";
}
elseif($TotalMark>64){
	$Grade="B+";
}
elseif($TotalMark>59){
	$Grade="B";
}
elseif($TotalMark>54){
	$Grade="B-";
}
elseif($TotalMark>49){
	$Grade="C+";
}
elseif($TotalMark>44){
	$Grade="C";
}
elseif($TotalMark>39){
	$Grade="D";
}
else{
	$Grade="F";
}


//echo "Grade: $Grade";
//echo " Total Mark is: $TotalMark";


$sql="INSERT INTO marks(Marks_attandence,Marks_ClassTestAvg,`Marks_presentation`,`Marks_assignment`,`Marks_midExam`,`Marks_finalExam`,Marks_total,Marks_grade,`Marks_courseSemester`,`CourseDetail_courseCode`,`StudentDetail_studentId`)
VALUES($AttMark,$ClassTest,$Presentation,$Assignment,$Mid,$FinalMark,$TotalMark,'$Grade',$CourseSemester,'$CourseCode','$StudentID')";


if(!mysqli_query($conn,$sql)){
	echo "Not inserted";
}else
	echo "Inserted";


?>