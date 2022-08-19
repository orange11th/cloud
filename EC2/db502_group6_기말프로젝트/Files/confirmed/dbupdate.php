<?php
$db ='
(DESCRIPTION =
        (ADDRESS_LIST=
                (ADDRESS = (PROTOCOL = TCP)(HOST = 203.249.87.57)(PORT = 1521))
        )
        (CONNECT_DATA =
        (SID = orcl)
        )
)';
//enter user name & password
        $username="db502group6";
        $password="test1234";
        //connect with oracle_db
        $connect = oci_connect($username,$password,$db);//연결
        //oracle db connection error message
        if(!$connect){
                $e = oci_error();
                trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);
                }

    $id=$_POST['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    if(isset($_POST["gender"]) && ($_POST["gender"] == "M" || $_POST["gender"] == "W"))
    	$gender=$_POST['gender'];
    $residence=$_POST['residence'];
    if(isset($_POST["gender"]) && ($_POST["vaccine"] == "Y" || $_POST["vaccine"] == "N"))
    	$vaccine=$_POST['vaccine'];

$sql = "
  update confirmedcase
	set name=:v_name,
	age=:v_age,
	gender=:v_gender,
	residence=:v_residence,
	vaccine=:v_vaccine
	where id=:v_id";
$stid=oci_parse($connect,$sql);
oci_bind_by_name($stid,":v_id",$id);
oci_bind_by_name($stid,":v_name",$name);
oci_bind_by_name($stid,":v_age",$age);
oci_bind_by_name($stid,":v_gender",$gender);
oci_bind_by_name($stid,":v_residence",$residence);
oci_bind_by_name($stid,":v_vaccine",$vaccine);
oci_execute($stid);
oci_free_statement($stid);
oci_close($connect);
?>
<html>
<head>

   <meta charset = "utf-8" />
   <title> 수정 완료 </title>

   <style>
	*{ margin:0 auto;
	  padding:0;
	width: 500px;
	height: 100px }
	
      .title {
            font-size : 28pt;
            color:black;
            }
	.but{
	margin:20px;
	padding:20px;
	}
        

 </style>
</head>
<body>
	<h2> < 수정 완료됐습니다! > </h2>
<div class="but">
<button type="button"
        onclick="location.href='update.php'">수정 페이지로</button>	
<button type="button"
        onclick="location.href='main.php'">테이블 확인</button>
</div>
</body>
</html>
