<?php

namespace csi0n\Exception;

use Mail;

/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/14/16
 * Time: 17:05
 */
class ExceptionRepository {
	protected $app;
	protected $email;
	protected $name;
	protected $subject;
	protected $ignore;
	protected $enable;

	/**
	 * ExceptionEmailRepository constructor.
	 */
	public function __construct( $app ) {
		$this->app     = $app;
		$this->email   = config( 'exception_mail.email' );
		$this->name    = config( 'exception_mail.name' );
		$this->subject = config( 'exception_mail.subject' );
		$this->ignore  = config( 'exception_mail.ignore' );
		$this->enable  = config( 'exception_mail.enable' );
	}

	/**
	 * @return mixed
	 */
	public function getIgnore() {
		return empty( $this->ignore ) ? [] : $this->ignore;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return mixed
	 */
	public function getSubject() {
		return $this->subject;
	}

	public function isEnable() {
		return $this->enable;
	}
}
