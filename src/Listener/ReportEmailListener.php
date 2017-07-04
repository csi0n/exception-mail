<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 7/5/17
 * Time: 5:47 AM
 */

namespace csi0n\Exception\Listener;


use csi0n\Exception\Events\ReportEmailEvent;
use csi0n\Exception\ExceptionRepository;
use Mail;

class ReportEmailListener {

	protected $exceptionRepository;

	/**
	 * ReportEmailListener constructor.
	 *
	 * @param $exceptionRepository
	 */
	public function __construct( ExceptionRepository $exceptionRepository ) {
		$this->exceptionRepository = $exceptionRepository;
	}

	public function handle( ReportEmailEvent $reportEmailEvent ) {
		$report = true;

		array_walk( $this->exceptionRepository->getIgnore(), function ( $exception ) use ( &$report, $reportEmailEvent ) {
			if ( $exception instanceof $reportEmailEvent->e ) {
				$report = false;
			}
		} );

		if ( $report ) {
			Mail::send( 'vendor.csi0n.mail.exception', [ 'exception' => $reportEmailEvent->e ], function ( $message ) {
				$message->to( $this->exceptionRepository->getEmail(), $this->exceptionRepository->getName() )
				        ->subject( $this->exceptionRepository->getSubject() );
			} );
		}
	}
}