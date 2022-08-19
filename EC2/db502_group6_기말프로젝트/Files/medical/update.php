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


echo("<font size=6 color=black>");
echo("처방전 수정  페이지");
echo("<font size=5  color=blue>");
echo("(데이터베이스 502반 6조) ");

?>
<html>
<head>
   <meta charset = "utf-8" /> 
   <title> 처방전  수정 페이지 </title>
   
   <style>
      .title {
            font-size : 28pt;
	    color:black;
            }
       .sub {
	color: black;
            width:960px;
           margin: 0 auto;
            font-size : 20pt;}
	.button {
	box-shadow: 5px 5px 5px #A9A9A9;
	}  
 </style>
</head>
<body>
   <center> <b> <p class = "title">처방전 수정</p> </b> </center>
   <br/> 
   <form method = "post" action = "dbupdate.php"> 
   <fieldset>
	<legend> 입력하기 </legend>
    <p class = "sub">
        <label> 증상  </label>
        <input type = "text" name = "symptom" > &nbsp;<br/>
        </p>

         <p class = "sub">
        <label> 투여약 </label>
        <input type = "text" name = "medicine" > &nbsp;<br/>
        </p>

	<br/>
  	 <p align = "center">
  	 <input type = submit value = "수정하기">
 	  <input type = reset value = "입력 초기화">
   	</p>
   	<p align = "center">
   	 <button type="button"
		onclick="location.href='main.php'">처방전DB 정보조회</button>
  	 </p>
</fieldset>
      </form>
   </body>
</html>
