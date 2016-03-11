<?php
	date_default_timezone_set( 'Europe/Amsterdam' );

	$chunks = $argv[1] + 1;
	$start = strtotime( $argv[2] );
	$end = strtotime( $argv[3] );
	
	$diff = $end - $start;
	$chunk_size = $diff / $chunks;
	
	for ( $i = $start + $chunk_size; $i <= $end; $i += $chunk_size ) {

		$date = new DateTime();
		$date->setTimestamp( $i );
		
		echo $date->format( 'd F Y' ) . " - " . $date->format( 'd/m/y' ) . "\n";
	}
	
	/**
	 *
	 * @param int $timestamp Timestamp to convert to a DateInterval
	 * @return DateInterval
	 */
	function dateIntervalFromTimestamp( $timestamp ) {
		
		
		
	}
?>
