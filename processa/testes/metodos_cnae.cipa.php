<?php


function apresenta_cipa($cipa){
	$cipa = str_split($cipa);

	foreach ($cipa as $key => $i) {
		if($key == 0){
			$final[] = $i;
			$final[] = "-";
		}else{
			$final[] = $i;
		}
	}
	$final = implode('', $final);
	return $final;
}
