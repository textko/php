<?php

namespace Textko\Contracts;

interface SmsResponseContract
{
    /**
     * Get sms id.
     *
     * @return mixed
     */
    public function smsId();

    /**
     * Get to no.
     *
     * @return mixed
     */
    public function toNo();

    /**
     * Get text.
     *
     * @return mixed
     */
    public function text();

    /**
     * Get status.
     *
     * @return mixed
     */
    public function status();
}