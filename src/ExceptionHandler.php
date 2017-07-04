<?php

namespace csi0n\Exception;

use csi0n\Exception\Events\ReportEmailEvent;
use Illuminate\Foundation\Exceptions\Handler as Exception;

/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 7/5/17
 * Time: 5:41 AM
 */
class ExceptionHandler extends Exception {
	public function report( \Exception $e ) {
		$exceptionRepository = app( ExceptionRepository::class );
		if ( $exceptionRepository->isEnable() ) {
			event( new ReportEmailEvent( $e ) );
		}

		return parent::report( $e );
	}
}