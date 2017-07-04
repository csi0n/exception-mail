<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 7/5/17
 * Time: 5:46 AM
 */

namespace csi0n\Exception\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ReportEmailEvent {

	use Dispatchable, SerializesModels;

	public $e;

	/**
	 * ReportEmailEvent constructor.
	 *
	 * @param \Exception $e
	 */
	public function __construct( \Exception $e ) {
		$this->e = $e;
	}
}