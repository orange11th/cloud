<?php
	error_reporting( E_ALL );
	ini_set( "display_errors", 1);
?>
<html>
<head>
   <meta charset = "utf-8" />
   <title>백신패스DB</title>

   <style>
      .title {
            font-size : 28pt;
            color:black;
            }
      *{ margin: 0;
	padding: 0;
	}
	body{
	margin: 0 auto;
	width: 800px;
	
	}

 .but{
        margin:20px;
        padding:20px;
	width:600px;
	height:300px;
        }

 </style>
</head>
<body>
	<h1>백신 패스 DB</h1>
	<p> 백신 2차 접종시 자동으로 입력됩니다. </p>
</br>
<?php
	//oracle data base address
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
	$connect = oci_connect($username,$password,$db);
	//oracle db connection error message
	if(!$connect){
		$e = oci_error();
		trigger_error(htmlentities($e['message'],ENT_QUOTES),E_USER_ERROR);
		}

	
	$sql= "select 
		id,to_char(registration,'yyyy-mm-dd') as registration,
		to_char(expiration,'yyyy-mm-dd') as expiration 
		from vaccinepass order by registration";
	$stid = oci_parse($connect,$sql);
	oci_execute($stid);
	echo "<table width='300' border='1' cellpadding='0' cellspacing='0'>\n";
	        $ncols = oci_num_fields($stid);
        echo "<tr>\n";
                for ($i = 1; $i <= $ncols; ++$i) {
                $colname = oci_field_name($stid, $i);
                echo "  <th><b>".htmlentities($colname, ENT_QUOTES)."</b></th>\n";
        }
        echo "</tr>\n";
	while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)){
		echo "<tr>\n";
		foreach($row as $item){
			echo " <td>".($item !==NULL ? htmlentities($item,ENT_QUOTES) : "&nbsp;")."</td>\n";
		}
		echo "</tr>\n";
	}
	echo "</table>\n";
	oci_free_statement($stid);
	oci_close($connect);
?>
<div class="but">
	<button type="button"
		onclick="location.href='insert.php'">데이터 입력하기</button>
	<button type="button"
                onclick="location.href='update.php'">데이터 수정하기</button>
	 <button type="button"
                onclick="location.href='delete.php'">데이터 삭제하기</button>
         <button type="button"
		onclick="location.href='../cover.php'">메인으로 돌아가기</button></br></br>
	<button type="button"
                onclick="location.href='synchronize.php'">동기화하기</button>
</div>
</body>
</html>
