<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendance_app/database/database.php";
function clearTable($dbo, $tabName)
{
    $c = "delete from :tabname";
    $s = $dbo->conn->prepare($c);
    try {
      $s->execute([":tabname" => $tabName]);
    } catch (PDOException $oo) {
    }
}
$dbo = new Database();
$dbo=new Database();

$c="create table student_details
(
    id int auto_increment primary key,
    roll_no varchar(20) unique,
    name varchar(50)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>student_details created");
}
catch(PDOException $o)
{
echo("<br>student_details not created");
}

$c="create table course_details
(
    id int auto_increment primary key,
    code varchar(20) unique,
    title varchar(50),
    credit int
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>course_details created");
}
catch(PDOException $o)
{
echo("<br>course_details not created");
}

$c="create table faculty_details
(
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>faculty_details created");
}
catch(PDOException $o)
{
echo("<br>faculty_details not created");
}

$c="create table session_details
(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique (year,term)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>session_details created");
}
catch(PDOException $o)
{
echo("<br>session_details not created");
}

$c="create table course_registration
(
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id,course_id,session_id)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>course_registration created");
}
catch(PDOException $o)
{
echo("<br>course_registration not created");
}

$c="create table course_allotment
(
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id,course_id,session_id)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>course_allotment created");
}
catch(PDOException $o)
{
echo("<br>course_allotment not created");
}

$c="create table attendance_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id,course_id,session_id,student_id,on_date)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>attendance_details created");
}
catch(PDOException $o)
{
echo("<br>attendance_details not created");
}


$c="insert into student_details
(id,roll_no,name)
values
(1,'BTCSE2401','Rahul Raj'),
(2,'BTCSE2402','Priti Sharma'),
(3,'BTCSE2403','Vihaan Mehta'),
(4,'BTCSE2404','Ishaan Kapoor'),
(5,'BTCSE2405','Arjun Nair'),
(6,'BTCSE2406','Karthik Iyer'),
(7,'BTCSE2407','Aditya Reddy'),
(8,'BTCSE2408','Rahul Verma'),
(9,'BTCSE2409','Siddharth Singh'),
(10,'BTCSE2410','Vikram Joshi'),
(11,'BTCSE2411','Neha Bhatia'),
(12,'BTCSE2412','Priya Malhotra'),
(13,'BTCSE2413','Ananya Desai'),
(14,'BTCSE2414','Tanvi Kulkarni'), 
(15,'BTCSE2415','Meera Ghosh'),
(16,'BTCSE2416','Sanya Bhattacharya'),
(17,'BTCSE2417','Divya Pandey'),
(18,'BTCSE2418','Pooja Rao'),
(19,'BTCSE2419','Sneha Menon'),
(20,'BTCSE2420','Ritika Chatterjee'),
(21,'BTCSE2421','Amit Patil'),
(22,'BTCSE2422','Rakesh Tripathi'),
(23,'BTCSE2423','Harsha Venkatesh'),
(24,'BTCSE2424','Suraj Thakur')";

$s=$dbo->conn->prepare($c);
try {
    $s->execute();
}
catch(PDOException $o)
{
   echo("<br>duplicate entry");
}

$c="insert into faculty_details
(id,user_name,password,name)
values
(1,'bt501','123','Dr. Rajesh Pratap Kumar'),
(2,'bt502','123','Prof. Anil Ramesh Mehta'),
(3,'bt503','123','Dr. Vinay Shankar Sharma'),
(4,'bt504','123','Prof. Suresh Nandan Reddy'),
(5,'bt505','123','Dr. Arvind Keshav Patel'),
(6,'bt506','123','Prof. Ramesh Bhanu Choudhary')";

$s=$dbo->conn->prepare($c);
try {
    $s->execute();
}
catch(PDOException $o)
{
   echo("<br>duplicate entry");
}

$c="insert into session_details
(id,year,term)
values
(1,2024,'SUMMER SEM'),
(2,2024,'WINTER SEM')";


$s=$dbo->conn->prepare($c);
try {
    $s->
    execute();
}
catch(PDOException $o)
{
   echo("<br>duplicate entry");
}

$c="insert into course_details
(id,title,code,credit)
values
(1,'Database management system lab','bt550',2),
(2,'Pattern Recognition','bt551',3),
(3,'Data Mining & Data Warehousing','bt552',4),
(4,'ARTIFICIAL INTELLIGENCE','bt553',4),
(5,'THEORY OF COMPUTATION ','bt554',3),
(6,'DEMYSTIFYING NETWORKING ','bt555',1)";

$s=$dbo->conn->prepare($c);
try {
    $s->execute();
}
catch(PDOException $o)
{
   echo("<br>duplicate entry");
}

//if any record already there in the table delete them
clearTable($dbo, "course_registration");
$c = "insert into course_registration
  (student_id,course_id,session_id)
  values
  (:sid,:cid,:sessid)";
$s = $dbo->conn->prepare($c);
//iterate over all the 24 students
//for each of them chose max 3 random courses, from 1 to 6

for ($i = 1; $i <= 24; $i++) {
    for ($j = 0; $j < 3; $j++) {
      $cid = rand(1, 6);
      //insert the selected course into course_registration table for 
      //session 1 and student_id $i
      try {
        $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 1]);
      } catch (PDOException $pe) {
      }
          //repeat for session 2
         $cid = rand(1, 6);
         //insert the selected course into course_registration table for 
         //session 2 and student_id $i
         try {
         $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 2]);
         } catch (PDOException $pe) 
          {
         }
    }
}



//if any record already there in the table delete them
clearTable($dbo, "course_allotment");
$c = "insert into course_allotment
  (faculty_id,course_id,session_id)
  values
  (:fid,:cid,:sessid)";
$s = $dbo->conn->prepare($c);
//iterate over all the 6 teachers
//for each of them chose max 2 random courses, from 1 to 6

for($i=1;$i<=6;$i++)
{
    for($j=0;$j<2;$j++)
    {
         $cid=rand(1,6);
         //insert the selected course into course_allotment table for 
         //session 1 and fac_id $i
         try {
            $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 1]);
          } catch (PDOException $pe)
          {
          }
          //repeat for session 2
         $cid = rand(1, 6);
         //insert the selected course into course_allotment table for 
         //session 2 and student_id $i
         try {
         $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 2]);
         } catch (PDOException $pe) 
          {
         }
    }
}
?>