<?php
namespace csi0n\ExceptionEmail;

use Mail;

/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/14/16
 * Time: 17:05
 */
class ExceptionEmailRepository
{
    protected $app;
    protected $email;
    protected $name;
    protected $subject;
    protected $ignore;
    protected $enable;

    /**
     * ExceptionEmailRepository constructor.
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->email = config('exception_mail.email');
        $this->name = config('exception_mail.name');
        $this->subject = config('exception_mail.subject');
        $this->ignore = config('exception_mail.ignore');
        $this->enable = config('exception_mail.enable');
    }

    public function send($e)
    {
        if (!$this->enable)
            return false;
        if (!empty($this->email) && !empty($this->name)) {
            $send = true;
            foreach ($this->ignore as $k) {
                if ($e instanceof $k) {
                    $send = false;
                }
            }
            if ($send) {
                Mail::send('vendor.csi0n.mail.exception', ['exception' => $e], function ($message) {
                    $message->to($this->email, $this->name)->subject($this->subject);
                });
                return true;
            }
        }
        return false;
    }
}
