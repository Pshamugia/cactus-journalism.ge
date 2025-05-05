<?php
if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  
 error_reporting(0);
if (isset($_POST['submit'])) {
    $date = date('d.m.Y');

    // Check if 'news_date' is set and not empty
    if (isset($_REQUEST['news_date']) && !empty($_REQUEST['news_date'])) {
        // Convert 'news_date' to a timestamp
        $news_date = strtotime($_REQUEST['news_date']);
    } else {
        // Provide a default value or handle the case where 'news_date' is not set
        $news_date = time(); // You can change this to a default value if needed
    }

    // Assuming $conn is your database connection
    $subkat = $_REQUEST['subkat'];
	$image_name = $subkat;

move_uploaded_file($_FILES['upload']['tmp_name'], '../'.$image_name);

$b=$image_name; 

    // Check if the length exceeds the maximum allowed length
    $maxSubkatLength = 1000000; // Replace with the actual maximum length
    if (strlen($subkat) > $maxSubkatLength) {
        // Truncate the value
        $subkat = substr($_REQUEST['subkat'], 0, $maxSubkatLength);
    }

    $hidden = isset($_REQUEST['hidden']) ? (int)$_REQUEST['hidden'] : 0; // Provide a default value if not set

    // Now, use $subkat in your SQL query
    $sql = "INSERT INTO kultura_cxrili (kategory, subkat, upload, satauri_ka, avtori, avtori2, agwera_ka, full_ka, date, eng_geo, ena, news_date, hour, hidden)
            VALUES ('$_REQUEST[kategory]', '$subkat', '$b', '$_REQUEST[satauri_ka]', '$_REQUEST[avtori]', '$_REQUEST[avtori2]', '$_REQUEST[agwera_ka]', '$_REQUEST[full_ka]', '$_REQUEST[date]', '$_REQUEST[eng_geo]', '$_REQUEST[ena]', ?, '$_REQUEST[hour]', '$hidden')";

    // Assuming $conn is your database connection
    $stmt = mysqli_prepare($conn, $sql);

    // Check if mysqli_prepare was successful
    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "i", $news_date);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Check for errors
        if (mysqli_stmt_errno($stmt) !== 0) {
            exit("MySQL error: " . mysqli_stmt_error($stmt));
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle the case where mysqli_prepare failed
        exit("mysqli_prepare error: " . mysqli_error($conn));
    }
}





if ($_POST['delete'])

{

$x=mysqli_query($conn,  "select * FROM kultura_cxrili where id='$_REQUEST[del]'");

$z=mysqli_fetch_array($x);

if ($z['surati'])

unlink('../'.$z['surati']);

mysqli_query($conn,  "DELETE FROM kultura_cxrili where id='$_REQUEST[del]'");

 

}





?>







  <script src="js/geo.js" mce_src="geo.js" type="text/javascript"></script>

  <link href="logo.css" rel="stylesheet" type="text/css" />

  



  



 

  

 

<table>  

	<tr>  

  



<form action="" method="post" enctype="multipart/form-data" name="rame"> </td>

 

 

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

	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory='images'";

	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));

	$total_pages = $total_pages['num'];

	

	/* Setup vars for query. */

	$targetpage = "index.php?do=images"; 	//your file name  (the name of this file)

	$limit = 24; 								//how many items to show per page

	$page = $_GET['page'];

	if($page) 

		$start = ($page - 1) * $limit; 			//first item to display on this page

	else

		$start = 0;								//if no page var is given, set start to 0

	/* Get data. */

	

	$sql = "SELECT * FROM $tbl_name where kategory='images' order by id desc LIMIT $start, $limit";

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

 <? $x=0;

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

	 

	 .gadavla

	 {

		 width: 100%;

		 border-bottom: 1px solid #000000;

	 }

	 .gadavla:hover

	 {width: 100%;

		 background-color: aliceblue;

		 border-bottom: 1px solid #000000

	 }

	 

	 

		#im4 {

  height: 150px;

  transition: all .2s ease-in-out;

}



.cover4 {

  width: 200px;

  object-fit: cover;

  

  

}

.cover4:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 

 opacity: 0.7;

    filter: alpha(opacity=70); 

	transition: all .7s; } </style>

<td valign="top" style="height: auto; width: 100%;" class="gadavla">

 <img src="../<? echo $b['upload']; ?>" class="cover4" id="im4"  align="left" style="padding-bottom: 15px; padding-top: 15px;">  

&nbsp;&nbsp;&nbsp;<? echo $b['upload']; ?> 

 

 <br>

	<div style="position: relative; left: 15px;"> <input type="checkbox"  name="del"  value="<? echo $b['id'];?>"  />  

<input name="delete" type="submit"    value="delete" style=" "></div>

   </td>	  	<? 

$x++;

if ($x==2) 

{

echo '<tr>';

$x=0;

} }

 ?> </tr>



</form>

 </table> <td>

    <tr>

     

 <? $w++;  echo $pagination;?> 



 

<td style="background-color: #F0F0F0;" width="744">

  

<form action="" method="post" enctype="multipart/form-data" name="rame">

<select  name="kategory" hidden style="width:320px">

   <option value="images" hidden>images</option>

</select>		   

 

</p>





<input type="file"  name="upload" required /> სურათი

<input type="text"  name="subkat" required placeholder="სახელწოდება" />

 <br>   

  

<br>

<script type="text/javascript">

CKEDITOR.replace('agwera');

</script><script type="text/javascript">

CKEDITOR.replace('full');

</script>

<input type="submit"   name="submit" value="გამოქვეყნება"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

   

</form>

   <br>

   

  </td> 

   </tr>



  </table>   

	 







  