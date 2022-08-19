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
$sql = "
  delete from vaccinepass
        where id=:v_id";
$stid=oci_parse($connect,$sql);
oci_bind_by_name($stid,":v_id",$id);
oci_execute($stid);
$sql = "
  delete from vaccination
	where id=:v_id";
$stid=oci_parse($connect,$sql);
oci_bind_by_name($stid,":v_id",$id);
oci_execute($stid);
oci_free_statement($stid);
oci_close($connect);
?>
<html>
<head>
</head>
<body>
<button type="button"
        onclick="location.href='delete.php'">삭제 페이지로</button>
<button type="button"
        onclick="location.href='main.php'">테이블 확인</button>
</body>
</html>

