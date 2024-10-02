<?php
function rupiah_id($nominal){
	$cetak = number_format($nominal,2,',','.');
	return $cetak;
}