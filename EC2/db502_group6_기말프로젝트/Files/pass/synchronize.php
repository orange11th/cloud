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

$sql = "
  delete from vaccinepass
	where expiration<SYSDATE";
$stid=oci_parse($connect,$sql);
oci_execute($stid);
oci_free_statement($stid);
oci_close($connect);
?>
<html>
<head>
<meta charset = "utf-8" />
   <title> 격리병동DB 동기화 </title>

   <style>
      .title {
            font-size : 28pt;
            }
       body {
            width:960px;
           margin: 0 auto;
            font-size : 20pt;}
        *{ margin:0; paddin:0;}

        button{
                width:200px;
                height: 50px;
                margin: 0 10px;
                }
   </style>
</head>
<body>
<center> <b> <p class = "title">동기화가 완료되었습니다.</p> </b> </center>
 <button type="button"
                onclick="location.href='../cover.php'">메인으로 돌아가기</button><button type="button"
        onclick="location.href='main.php'">백신패스DB 정보조회</button>
</body>
</html>

