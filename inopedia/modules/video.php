<?php
if (isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
	$b='images/'.$_FILES['upload']['name']; 

    
	
	
move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);

	
$personId = (int) $_POST['person_id'];
$partyId = 0;

if($personId>0){
	$x=mysqli_query($conn, 'select t.`party_id` from hc_persons t where t.`id`='.$personId);
	if($x){
		$z=mysqli_fetch_array($x);
		$partyId = $z['party_id'];		
	}
}
#$sql="insert into kultura_cxrili (kategory, subkat, upload, upload2, upload3, upload4, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$b2', '$b3', '$b4', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";


$sql="insert into kultura_cxrili (kategory, subkat, upload, eng_geo, img_description, satauri, avtori, party_id, person_id, agwera, full, ena, menu, date, pos, news_date)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$_POST[eng_geo]', '$_POST[img_description]', '$_POST[satauri]', '$_POST[avtori]', '$partyId', '$personId', '$_REQUEST[agwera]', '$_REQUEST[full]', '$_REQUEST[ena]', '$_REQUEST[menu]', '$date', '0', '$_REQUEST[news_date]')";


mysqli_query($conn, $sql);
  
}


if ($_POST['delete'])
{
$x=mysqli_query($conn, "select * FROM kultura_cxrili where id='$_REQUEST[del]'");
$z=mysqli_fetch_array($x);
if ($z['surati'])
unlink('../'.$z['surati']);
mysqli_query($conn, "DELETE FROM kultura_cxrili where id='$_REQUEST[del]'");
 
}


?>
 
  

 
  
   
  <div style="background-color:#F0F0F0; padding:10px; margin-bottom:10px;"> <div id="indexs" style="color:#FFFFFF;">
   <a href="index.php"> <span style="font-size:20px; position:relative; font-weight:bold; margin-right:10px; 
   top:0px;"> &lt; </span> <span style="position:relative; top:-3px;"> საწყის გვერდზე დაბრუნება </span> </a> </div> </div>
 
<?php
	/*
		Place code to connect to your DB here.
	*/


	$tbl_name="kultura_cxrili";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 6;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory='ვიდეო' AND eng_geo='Geo'";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=video"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where kategory='ვიდეო' AND eng_geo='Geo' order by id desc LIMIT $start, $limit";
	$result = mysqli_query($conn, $sql);

	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
?>
 <? $x==0;
if($_REQUEST['dey'])
$where=" and date='$_REQUEST[dey]'";
else $where='';
//$sql="select * from kultura_cxrili  order by id desc limit $lim";
// echo $sql.mysql_error();
$a=mysqli_query($conn, $sql);
while ($b=mysqli_fetch_array($a))
{
 ?> 

 <style>
		#im4 {
  height: 60px;
  transition: all .2s ease-in-out;
}

.cover4 {
  width: 80px;
  object-fit: cover;
  
  
}
.cover4:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s; }
	

	</style>

<div style="width:500px;">
<img src="../<? echo $b['upload'];?>" width="80" height="60" class="cover4" id="im4" align="left">  </div>

<? echo $b['satauri'];?>&nbsp;&nbsp;&nbsp;<div style="color:#FFF; border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background:#999; font-size:12px; width:190px;"><? echo $b['kategory'] ?> </div>
<a href="index.php?do=updatevideo&id=<? echo $b['id']; ?>"><img src="images/edit-icon.png" width="20" 
style="margin-top:3px; border:0px;"/> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href=""></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href=""> </a>  
<input type="checkbox"  name="del"  value="<? echo $b['id'];?>"  />
<input name="delete" type="submit"    value="delete" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background:transparent;">
<hr color="#E1E1E1"> <div id="linkebi">
	<? $w++;  }echo $pagination;?> </div> </form> <? 
if ($_REQUEST['addavt'])
{	

mysqli_query($conn, "insert into gallery(avtori)values('$_POST[avtori]')");

  echo mysqli_error();
 
}
if ($_REQUEST['avt_delete'])
mysqli_query($conn, "delete from gallery where id='$_REQUEST[avt_id]'");

?> <form action="" method="post" enctype="multipart/form-data" >



  <br />
<input type="text" name="avtori" style="width:320px;" />
<input type="submit" name="addavt" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:transparent; ">
<br />
<select name="avt_id" style="width:320px;">
    <?
	 $avt=mysqli_query($conn, "select * from  gallery order by id desc");
	 while($avts_id=mysqli_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select> 
<input type="submit" name="avt_delete" value="delete" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:transparent;" /> 
</form><br>  
 
<form action="" method="post" enctype="multipart/form-data" name="rame"> 
 
 
  
		   
		   <hr>
           <br>

      <select  name="kategory" style="width:320px">
 
    <option value="ვიდეო">ვიდეო</option>
      </select>		   
  <br>
</p>

 <select  name="eng_geo" style="width:320px"> 
		   <option value="Geo" style="color:#FF0000">Geo</option>
      </select>

<br><br>
<input type="file"  name="upload" />
  <br>  
  

  

 
<textarea  name="satauri" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; width:320px; " ></textarea> <div style="position:relative; top:-90px; left: 590px">  </div> 
  
  <br>
  
     <div style="font-size:14px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; z-index:101;">  
          <script>
  $( function() {
	$("#news_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy-mm-dd",
      dateFormat: "yy-mm-dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#news_date").datepicker("option","maxDate", selected)
        }
    });
  } );
  </script>
          <p>
            <input type="text" name="news_date" id="news_date" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;" size="20" / > კალენდარი
        </div>
  <br><br>
 
<textarea  name="agwera" id="agwera" cols="70" rows="5" >&nbsp;</textarea>
<script type="text/javascript">
CKEDITOR.replace('agwera');
</script>
<br> <br> 
<textarea name="full" id="full" cols="70" rows="12"></textarea>

<script type="text/javascript">
CKEDITOR.replace('full');
</script>

<br><br>
 
   <input type="submit"   name="submit" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:transparent;" value="გამოქვეყნება"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
</form>
 
 
	 



  