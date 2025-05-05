<br><?
$r=mysql_query("select * from leqsebi where id='$_REQUEST[id]'");
$data=mysql_fetch_array($r);
if (isset($_REQUEST['submit']))
{
$date=date('d.m.Y'); 
$sql="insert into (satauri,shigtavsi, avt_id , date)('$_REQUEST[satauri]', '$_REQUEST[shigtavsi]', '$_REQUEST[avt_id]', '$date')";
mysql_query($sql);


}
?>
<style type="text/css">
<!--
.style12 {font-size: 24px; color: #000000; }
.style7 {font-size: 16px; font-weight: bold; color: #857A6A;}
-->
</style>
<form action="" method="post" enctype="multipart/form-data">
<table>
  <tr>
    <td bgcolor="#FFFFFF"><p>ავტორი</p> 
      <select  name="avt_id"  >
     <?
	 $avt=mysql_query("select * from  kultura_cxrili order by id desc");
	 while($avts_id=mysql_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['gvari']."</option>";			 
	 }
     ?>
      </select>
 <br>
      <input name="satauri" type="text" size="50">
      სათაური <br>

      <textarea name="shigtavsi" cols="50" rows="12" class="style7"></textarea> <br> <br>
      <input type="submit" name="submit" value="გამოქვეყნება"></td>
  </tr>
</table>
</form>