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
echo("코로나 신규 확진자 입력 페이지");
echo("<font size=5  color=blue>");
echo("(데이터베이스 502반 6조) ");

?>
<html>
<head>
   <meta charset = "utf-8" /> 
   <title> 신규 확진자 입력 페이지 </title>
   
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
   <center> <b> <p class = "title">신규 확진자</p> </b> </center>
   <br/> 
   <form method = "post" action = "dbinsert.php"> 
   <fieldset>
	<legend> 입력하기 </legend>
    <p class = "sub">
        <label> 이름  </label>
        <input type = "text" name = "name" > &nbsp;(귀하의 성함을 입력해주세요.)<br/>
        </p>

         <p class = "sub">
        <label> 주민등록번호 </label>
        <input type = "text" name = "id" > &nbsp;(000000-000000 형식으로 입력바랍니다.)<br/>
        </p>


        <p class = "sub">
        <label> 나이 </label>
        <input type = "text" name = "age" > &nbsp;<br/>
        </p>

         <p class = "sub">
        <label> 성별 </label>
	<input id="man" type="radio" name="gender" value="M">
	<label for = "man"> 남자 </label>
	<input id="woman" type="radio" name="gender" value="W">
	<label for = "woman"> 여자 </label>  &nbsp;<br/>

           <p class = "sub">
        <label> 거주지 </label>
        <input type = "text" name = "residence" > &nbsp;<br/>
        </p>

         <p class = "sub">
        <label> 백신접종여부 </label>
        <input id="yes" type="radio" name="vaccine" value="Y">
        <label for = "yes"> 예</label>
       <input id="no" type="radio" name="vaccine" value="N">
        <label for = "no"> 아니오 </label> </p>

	<br/>
  	 <p align = "center">
  	 <input type = submit value = "입력하기">
 	  <input type = reset value = "입력 초기화">
   	</p>
   	<p align = "center">
   	 <button type="button"
		onclick="location.href='main.php'">확진자DB 정보 조회</button>
  	 </p>
</fieldset>
      </form>
   </body>
</html>
