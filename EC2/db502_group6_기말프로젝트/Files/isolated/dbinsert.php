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
        $date=strval($_POST['date']);
	$symptom=$_POST['symptom'];
	$sql = "
	INSERT INTO isolated(id,hospitalenter,leavehospital,symptom)
		VALUES(:v_id,to_date('".$date."','yyyy-mm-dd'),to_date('".$date."','yyyy-mm-dd')+14,:v_symptom)";
        $stid=oci_parse($connect,$sql);
	oci_bind_by_name($stid,":v_id",$id);
	oci_bind_by_name($stid,":v_symptom",$symptom);
	oci_execute($stid);
	oci_free_statement($stid);	
    
oci_close($connect);
?>
<html>
<head>

   <meta charset = "utf-8" />
   <title> 입력 완료 </title>

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
	<h2> < 입력 완료됐습니다! > </h2>
<div class="but">
<button type="button"
        onclick="location.href='insert.php'">입력 페이지로</button>	
<button type="button"
        onclick="location.href='main.php'">테이블 확인</button>
</div>
</body>
</html>
