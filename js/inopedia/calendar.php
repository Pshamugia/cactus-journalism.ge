<?php

function calendar($url,$link,$cal_month, $cal_year){
global $f, $r, $year, $month, $day, $config, $lang, $langdateshortweekdays,$monthlist;
	if($cal_month and $cal_year)
	{
		$cal_month = intval ($cal_month);
		$cal_year  = intval ($cal_year);
	}
	else
	{
		$cal_month = intval (date("m"));
		$cal_year  = intval (date("Y"));
	}

	if ($cal_month < 0) $cal_month = 1;
	if ($cal_year  < 0) $cal_year = 2007;

    $first_of_month  = mktime(0, 0, 0, $cal_month, 7, $cal_year);
    $maxdays         = date('t', $first_of_month)+1; // 28-31
    $prev_of_month   = mktime(0, 0, 0, ($cal_month-1), 7, $cal_year);
    $next_of_month   = mktime(0, 0, 0, ($cal_month+1), 7, $cal_year);
	
	$prev_of_year   = mktime(0, 0, 0, ($cal_month), 7, ($cal_year-1));
    $next_of_year   = mktime(0, 0, 0, ($cal_month), 7, ($cal_year+1));
	
    $cal_day         = 1;
    $weekday         = date('w', $first_of_month); // 0-6
	

	//month list
	$monthlist[]="0";
	$monthlist[]="იანვარი";
	$monthlist[]="თებერვალი";
	$monthlist[]="მარტი";
	$monthlist[]="აპრილი";
	$monthlist[]="მაისი";
	$monthlist[]="ივნისი";
	$monthlist[]="ივლისი";
	$monthlist[]="აგვისტო";
	$monthlist[]="სექტემბერი";
	$monthlist[]="ოქტომბერი";
	$monthlist[]="ნოემბერი";
	$monthlist[]="დეკემბერი";
	
	//week list
	$langdateshortweekdays[]="კვი";
	$langdateshortweekdays[]="ორშ";
	$langdateshortweekdays[]="სამ";
	$langdateshortweekdays[]="ოთხ";
	$langdateshortweekdays[]="ხუთ";
	$langdateshortweekdays[]="პარ";
	$langdateshortweekdays[]="შაბ";

	$date_link['prev'] = '<a class="monthlink" href="'.$url.'year='.date("Y", $prev_of_month).'&month='.date("m", $prev_of_month).'">&laquo;</a>&nbsp;&nbsp;&nbsp;&nbsp;';
    $date_link['next'] = '&nbsp;&nbsp;&nbsp;&nbsp;<a class="monthlink" href="'.$url.'year='.date("Y", $next_of_month).'&month='.date("m", $next_of_month).'">&raquo;</a>';
	
	$year_link["prev"]='<a class="monthlink" href="'.$url.'year='.date("Y", $prev_of_year).'&month='.date("m", $prev_of_year).'">&laquo;</a>&nbsp;&nbsp;&nbsp;&nbsp;';
	$year_link["next"]='&nbsp;&nbsp;&nbsp;&nbsp;<a class="monthlink" href="'.$url.'year='.date("Y", $next_of_year).'&month='.date("m", $next_of_year).'">&raquo;</a>';

$buffer  = '<style>
.weekday-active-v {
	color: #666666;
}
.day-active-v {
	color: #666666;
}
.calendar {

color: #000000;
font-family: verdana;
font-size: 10px;

}
.calendar td, th {
	 font-family: verdana;
	 text-decoration: none;
/* - */
	 padding-left: 0px;
 	 padding-right: 0px;
	 padding-top: 2px;
	 padding-bottom: 2px;
/* - */
}
.weekday {
	color: #FF0000;
	font-family: verdana;
}
.weekend {
	color: #FF0000;
	font-family: verdana;
	text-decoration: none;
}
.weekday-active {
	color: #804040;
	font-family: verdana;
}
.day-active {
	color: #804040;
	font-family: verdana;
}
.day-active a, .weekday-active a, .day-active-v a, .weekday-active-v a {
	text-decoration: underline;
}
.monthlink {
	color: #663366;
	text-decoration: none;
}
.Day {
	color: #000000;
	 
	text-decoration: none;
}
.currDay {
	border:2px solid;
	color: #000000;
   	font-weight:bold;
	text-decoration: none;
}
</style><div id="calendar-layer"><table align="center" bgcolor="#F0F0F0" width="175" id="calendar" cellpadding="0" class="calendar"><thead><th colspan="7"><center><b>'.$date_link['prev'].$monthlist[$cal_month].$date_link['next'].' '.$year_link['prev'].$cal_year.$year_link['next'].'</b></center></th></thead><thead>';
    
    $buffer = str_replace($f, $r, $buffer);


		for ($it=1; $it<6; $it++)
			$buffer .= '<th>'.$langdateshortweekdays[$it].'</th>';

			$buffer .= '<th class="weekday">'.$langdateshortweekdays[6].'</th>';
			$buffer .= '<th class="weekday">'.$langdateshortweekdays[0].'</th>';

    $buffer .= '</thead><tr>';

    if ($weekday > 0){$buffer .= '<td colspan="'.$weekday.'">&nbsp;</td>';}

    while($maxdays > $cal_day) {
        if ($weekday == 7) {
            $buffer .= '</tr><tr>';
            $weekday = 0;
        }

     
        

         $currdate=mktime(0,0,0,$cal_month,$cal_day,$cal_year);
		 $currdate=date("d.m.Y",$currdate);
            if ($weekday == "5" or $weekday == "6")
			{
				if($currdate==date("d.m.Y"))
				{
					$buffer .= '<td class="weekday"><center><a class="currDay" href="'.$link.'dey='.$currdate.'">'.$cal_day.'</a></center></td>';
				}
				else $buffer .= '<td class="weekday"><center><a class="weekend" href="'.$link.'dey='.$currdate.'">'.$cal_day.'</a></center></td>';
       		}
            elseif($currdate==date("d.m.Y"))
			{
				$buffer .= '<td class="day"><center><a class="currDay" href="'.$link.'dey='.$currdate.'">'.$cal_day.'</a></center></td>';
			}
			else $buffer .= '<td class="day"><center><a class="Day" href="'.$link.'dey='.$currdate.'">'.$cal_day.'</a></center></td>';

        $cal_day++;
        $weekday++;
    }

    if ($weekday != 7){$buffer .= '<td colspan="'.(7-$weekday).'">&nbsp;</td>';}

    return $buffer . '</tr></table></div>';
}
?>