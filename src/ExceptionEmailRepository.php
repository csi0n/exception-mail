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

    /**
     * ExceptionEmailRepository constructor.
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    public function send($to_data, $e)
    {
        if (empty($to_data['email']) || empty($to_data['name']) || empty($to_data['subject'])) {
            return false;
        }
        $to_data['e'] = $e;
        Mail::send('vendor.csi0n.mail.exception', $to_data, function ($message) use ($to_data) {
            $message->to($to_data['email'], $to_data['name'])->subject($to_data['subject']);
        });
        return true;
    }
}