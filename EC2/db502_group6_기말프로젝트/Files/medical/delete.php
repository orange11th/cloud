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

echo("<font size=5  color=blue>");
echo("데이터베이스 502반 6조 ");
echo("<font size=6 color=black>");
echo("처방전 DB 삭제");
?>
<html>
<head>
   <meta charset = "utf-8" /> 
   <title> 처방전 삭제 </title>
   
   <style>
      .title {
            font-size : 28pt;
            }
       .sub {
            width:960px;
           margin: 0 auto;
            font-size : 20pt;}
   </style>
</head>
<body>
   <center> <b> <p class = "title">삭제할 정보 입력</p> </b> </center>
   <br/> 
   <form method = "post" action = "dbdelete.php"> 
   

         <p class = "sub">
        <label> 증상 </label>
        <input type = "text" name = "symptom" > &nbsp;<br/>
        </p>


<br/>
   <p align = "center">
   <input type = submit value = "삭제하기">
   <input type = reset value = "입력 초기화">
   </p>
   <p align = "center">
    <button type="button"
                onclick="location.href='main.php'">처방전DB 정보조회</button>
   </p>
      </form>
   </body>
</html>
