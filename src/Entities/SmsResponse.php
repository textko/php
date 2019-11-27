<?php

namespace Textko\Entities;

use Textko\Contracts\SmsResponseContract;

class SmsResponse implements SmsResponseContract
{
    protected $smsId;
    protected $toNo;
    protected $text;
    protected $status;

    public function __construct($smsId, $toNo, $text, $status)
    {
        $this->smsId  = $smsId;
        $this->toNo   = $toNo;
        $this->text   = $text;
        $this->status = $status;
    }

    /**
     * Get sms id.
     *
     * @return string
     */
    public function smsId()
    {
        return $this->smsId;
    }

    /**
     * Get to no.
     *
     * @return string
     */
    public function toNo()
    {
        return $this->toNo;
    }

    /**
     * Get text.
     *
     * @return string
     */
    public function text()
    {
        return $this->text;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function status()
    {
        return $this->status;
    }
}