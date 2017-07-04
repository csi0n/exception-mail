<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 7/5/17
 * Time: 5:48 AM
 */

namespace csi0n\Exception;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {
	protected $listen = [
		'csi0n\Exception\Events\ReportEmailEvent' =>
			[ 'csi0n\Exception\Listener\ReportEmailListener' ]
	];

	public function boot() {
		parent::boot();
	}
}