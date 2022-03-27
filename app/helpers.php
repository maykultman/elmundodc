<?php
function setActive($routename){
	return request()->routeIs($routename.'.*') ? 'active' : '';
}
function getBranchStock($branches, $branch_id){
	foreach( $branches as $pb):
		if( $pb->id == $branch_id ){
			return ['stock'=> $pb->pivot->stock, 'devolution'=>$pb->pivot->devolution];
		}
	endforeach;
	return ['stock'=> 0, 'devolution'=>0];
}
function printCheked($value, $isEqual){
	$bool = '';
	if($value == $isEqual ){
		$bool = 'checked="checked"';
	}
	return $bool;
}

