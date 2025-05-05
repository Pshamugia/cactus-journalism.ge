<?		
	function CheckDBField($table,$field,$value)
	{
		$res=mysql_query("SELECT $field FROM $table WHERE $field='$value'");
		return mysql_num_rows($res);
	}
	function GetDBValue($table,$field,$where)
	{
		$res=mysql_query("SELECT $field FROM $table WHERE $where LIMIT 1");
		$data=mysql_fetch_assoc($res);
		return $data["$field"];
	}
	function GetDBFieldCount($table,$where="")
	{
		if($where) $where="WHERE ".$where;
		$res=mysql_query("SELECT id FROM $table $where");
		$count=mysql_num_rows($res);
		return $count;
	}
	function DBDelete($table,$where="")
	{
		if($where) $where="WHERE $where";
		mysql_query("DELETE FROM $table $where");
	}
	function DBInsert($table,$values)
	{
		$ret_result=false;
		$table_fields=array();
		$result=mysql_query("SELECT * FROM $table");
		$i = 0;
		while ($i < mysql_num_fields($result)) 
		{
    		$meta = mysql_fetch_field($result, $i);
    		if($meta->name!="id") $table_fields[]=$meta->name;
    		$i++;
		}
		$field_list=array();
		for($i=0;$i<count($values);$i++) 
		{
        	$key=key($values);
			if(in_array($key,$table_fields))
			{   $vlaue = current($values);
				$field_list["field"][]=$key;
				$field_list["value"][]=$vlaue;	
			}
			next($values);
		}
		
		if(count($field_list["field"]))
		{
			$i=0;
			$query="INSERT INTO $table (";
			for($i=0;$i<count($field_list["field"])-1;$i++) $query.="`".$field_list["field"][$i]."`,";
			$query.="`".$field_list["field"][count($field_list["field"])-1]."`) VALUES (";
			for($i=0;$i<count($field_list["field"])-1;$i++) $query.="'".$field_list["value"][$i]."',";
			$query.="'".$field_list["value"][count($field_list["field"])-1]."')";
			$ret_result=mysql_query($query);
		}
		return $ret_result;
	}
	function DBUpdate($table,$values,$where="",$ignore=array())
	{
		if($where) $where="WHERE $where";
		if(!is_array($ignore)) $ignore=array($ignore);
		
		$table_fields=array();
		$result=mysql_query("SELECT * FROM $table");
		$i = 0;
		while ($i < mysql_num_fields($result)) 
		{
    		$meta = mysql_fetch_field($result, $i);
    		$table_fields[]=$meta->name;
    		$i++;
		}
		$field_list=array();
		for($i=0;$i<count($values);$i++) 
		{
        	$key=key($values);
			if((in_array($key,$table_fields) && !in_array($key,$ignore)) && ($vlaue = current($values)))
			{
				$field_list["field"][]=$key;
				$field_list["value"][]=$vlaue;
			}
			next($values);
		}
		
		if(count($field_list["field"]))
		{
			$i=0;
			$query="UPDATE $table SET ";
			for($i=0;$i<count($field_list["field"])-1;$i++) $query.="`".$field_list["field"][$i]."`='".$field_list["value"][$i]."',";
			
			$query.="`".$field_list["field"][count($field_list["field"])-1]."`='".$field_list["value"][count($field_list["field"])-1]."' $where";
			return  mysql_query($query);
		} return false;
	}
	function GetMenuList($query,$title,$cmp="",$value="id")
	{
		$res=mysql_query($query);
		while($data=mysql_fetch_assoc($res))
		{
			if($data["id"]==$cmp)
			echo "<option value='".$data[$value]."' selected='selected'>".$data[$title]."</option>\n";
			else echo "<option value='".$data[$value]."'>".$data[$title]."</option>\n";
		}
	}
	function GetNextIncrement($table)
	{
		$tablename = $table;
		$next_increment = 0;
		$qShowStatus = "SHOW TABLE STATUS LIKE '$tablename'";
		$qShowStatusResult = mysql_query($qShowStatus);

		$row = mysql_fetch_assoc($qShowStatusResult);
		return $row['Auto_increment'];
	}
	function WriteJS($java)
	{
		echo "<script type='text/javascript'>\n $java \n</script>";
	}
	function GetDateGeo($date)
	{
		$months=array();
		$months[]="";
		
		$months[]="იანვარი";
		$months[]="თებერვალი";
		$months[]="მარტი";
		$months[]="აპრილი";
		$months[]="მაისი";
		$months[]="ივნისი";
		$months[]="ივლისი";
		$months[]="აგვისტო";
		$months[]="სექტემბერი";
		$months[]="ოქტომბერი";
		$months[]="ნოემბერი";
		$months[]="დეკემბერი";
		
		
		$list=explode("-",$date);
		$year=$list[0];
		$month=$months[intval($list[1])];
		$day=$list[2];
		
		$result="$day $month $year";
		return $result;
	}
	function GetMemberDefinitionCount($member_id,$data_id)
	{
		$res=mysql_query("SELECT id FROM definition WHERE member_id='$member_id' AND member_type='$data_id' AND active='1'");
		$count=mysql_num_rows($res);
		$result=" (<a title='ავტორის მიერ ამ თემაში განთავსებული ინფორმაციის რაოდენობა' style='color:#FF0000' href='$_SERVER[REQUEST_URI]&md=$member_id'>$count</a>) ";
		
		$res=mysql_query("SELECT id FROM definition WHERE member_id='$member_id' AND active='1'");
		$count=mysql_num_rows($res);
		$result.="<a title='ავტორის მიერ საიტზე სულ განთავსებული ინფორმაციის რაოდენობა'>($count)</a>";
		return $result;
	}
	function GetMemberInfo($member_id)
	{
		$res=mysql_query("SELECT * FROM members WHERE id='$member_id' LIMIT 1");
		$data=mysql_fetch_assoc($res);
		$result="";
		$img="";
		switch($data["status"])
		{
			case 1 :
			{
				$result="$data[name] $data[surname]";
				$img=$data["img"];
			}
			break;
			case 2 :
			{
				$result="$data[name] $data[surname]";
				$img=$data["img"];
			}
			break;
			case 3 :
			{
				$result="$data[name] $data[surname]";
				$img=$data["img"];
			}
			break;
			case 4 :
			{
				$result="$data[name] $data[surname]";
				$img=$data["img"];
			}
			break;
			case 5 :
			{
				$result="$data[name] $data[surname]";
				$img=$data["img"];
			}
			break;
			case 6 :
			{
				$result="$data[name] $data[surname]";
				$img=$data["img"];
			}
			break;
		}
		$res_array=array();
		if(is_file("modules/members/index.php")) $path="modules/members/index.php";
		else $path="../../modules/members/index.php";
		$res_array["info"]="<span title=\"დეტალური ინფორმაცია\" style=\"cursor:pointer\" onclick=\"PopupWindow('$path?id=$member_id','',600,400);\">".$result."</span>";
		$res_array["img"]=$img;
		return $res_array;
	}
	//------------------------------ banners ----------------------------------
	function SetBanner($title,$url,$position,$file,$width,$height,$is_flash)
	{
		if($is_flash)
		{
			$banner='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="'.$width.'" height="'.$height.'">
  <param name="movie" value="'.$file.'" />
  <param name="quality" value="high" />
  <param name="wmode" value="transparent">
  <embed src="'.$file.'" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="'.$width.'" height="'.$height.'" wmode="transparent"></embed>
</object>';
		}
		else
		{
			$banner='<a href="http://'.$url.'" target="_blank"><img src="'.$file.'" width="'.$width.'" height="'.$height.'" border="0"></a>';
		}
		mysql_query("INSERT INTO banners (title,url,position,banner,file) VALUES ('$title','$url','$position','$banner','$file')");
	}
	function GetBanner($position,$order_by='id')
	{
		$res=mysql_query("SELECT banner FROM banners WHERE position='$position' ORDER BY $order_by");
		while($data=mysql_fetch_assoc($res)) $result[]="<div align='center' style='padding:4px;'>".$data["banner"]."</div>";	
		return $result;
	}
	function IsAnswer($id)
	{
		$is_ans=false;
		switch($id)
		{
			case 92 :
			case 96 :
			case 102 :
			case 108 :
			case 112 :
			case 117 :
			{
				$is_ans=true;	
			}
			break;
		}
		return $is_ans;
	}
//--========================== შემოქმედება ==============================
	function IsPhoto($type)
	{
		$res=false;
		switch($type)
		{
			case 1 :
			case 2 :
			{
				$res=true;
			}
			break;
		}
		return $res;
	}
	function IsVideo($type)
	{
		$res=false;
		switch($type)
		{
			case 4 :
			case 5 :
			{
				$res=true;
			}
			break;
		}
		return $res;
	}
	function IsSound($type)
	{
		$res=false;
		switch($type)
		{
			case 3 :
			{
				$res=true;
			}
			break;
		}
		return $res;
	}

	function IsFileUpload($type)
	{
		$res=false;
		switch($type)
		{
			case 8001 :
			case 8002 :
			case 8003 :
			{
				$res=true;
			}
			break;
		}
		return $res;
	}
	function IsSpecialist($type)
	{
		if($type>=23 && $type<=34) return true;
		else return false;
	}
	
function file_chack($image)	
{
if(!empty($image['size']))
{
if ($image['size'] > 512000) 
die('ფაილის ზომა აღემატება <strong>500 კილობაიტს</strong>.<p> გთხოვთ ატვირთოთ სხვა სურათი... <a href="'.$_SERVER['HTTP_REFERER'].'">'.BACK.'</a><meta http-equiv="refresh" content="4;URL=javascript: history.go(-1)">'); 
elseif ($image['type'] == "image/jpg"); 
elseif ($image['type'] == "image/jpeg"); 
elseif ($image['type'] == "image/bmp"); 
elseif ($image['type'] == "image/png"); 
elseif ($image['type'] == "image/tif");
elseif ($image['type'] == "image/gif");
else 
die('<stong> შეცდომაა </strong> ფაილის ტიპი უნდა იყოს: <strong>Gif, Jpg, Jpeg, Bmp, Png, Tif</strong> <p> გთხოვთ ატვირთოთ სხვა სურათი... <a href="'.$_SERVER['HTTP_REFERER'].'">'.BACK.'</a>"<meta http-equiv="refresh" content="4;URL=javascript: history.go(-1)">');
}
 return true;
}
?>