<?php
//<!-------INCEPUT PARTEA DE POSTAT ACUM X MIN -------->
function timeAgo($timestamp){
			$tz_object = new DateTimeZone('Europe/Bucharest');
		    $datetime1=new DateTime();
		    $datetime1->setTimezone($tz_object);
		    $datetime2=date_create($timestamp);
		    $diff=date_diff($datetime1, $datetime2);
		    //echo 'Din db: '.date_format($datetime2, 'Y-m-d H:i:s');
		    //echo " - Din ora cur: ";
		    //echo date_format($datetime1, 'Y-m-d H:i:s');
		    $timemsg='';
		    if($diff->y > 0){
		        $timemsg = $diff->y .' year'. ($diff->y > 1?"'s":'');

		    }
		    else if($diff->m > 0){
		     $timemsg = $diff->m . ' month'. ($diff->m > 1?"'s":'');
		    }
		    else if($diff->d > 0){
		     $timemsg = $diff->d .' day'. ($diff->d > 1?"'s":'');
		    }
		    else if($diff->h > 0){
		     $timemsg = 60 - $diff->h .' hour'.(60 - $diff->h > 1 ? "'s":'');
		    }
		    else if($diff->i > 0){
		     $timemsg = 60 - $diff->i .' minute'. (60 - $diff->i > 1?"'s":'');
		    }
		    else if($diff->s > 0){
		     $timemsg = 60 - $diff->s .' second'. (60 - $diff->s > 1?"'s":'');
		    }

		$timemsg = ' '.$timemsg.' ago';
return $timemsg;
}
?>