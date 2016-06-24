<?php
function apresenta_cnae($cnae){
	$cnae = str_split($cnae);

	if(count($cnae) <= 4 ){
		$result = $cnae[0] . $cnae[1] . "." . $cnae[2];
	}elseif(count($cnae) <= 6){
		$result = $cnae[0] . $cnae[1] . "." . $cnae[2] . $cnae[3] . "-" . $cnae[4];
	}
	return $result;
}

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