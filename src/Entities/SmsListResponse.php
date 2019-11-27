<?php

namespace Textko\Entities;

use Textko\Contracts\SmsListResponseContract;

class SmsListResponse implements SmsListResponseContract
{
    protected $currentPage;
    protected $data;
    protected $firstPageUrl;
    protected $from;
    protected $nextPageUrl;
    protected $path;
    protected $perPage;
    protected $prevPageUrl;
    protected $to;

    /**
     * SmsListResponse constructor.
     *
     * @param $object
     *
     * @throws SmsException
     */
    public function __construct($object)
    {
        if ( ! is_object($object) or empty($object)) {
            throw new SmsException('Invalid response. Unable to generate or parse paginated result.');
        }

        $this->currentPage   = isset($object->current_page)
            ? $object->current_page : 0;
        $this->data          = isset($object->data) ? $object->data : [];
        $this->firstPageUrl  = isset($object->first_page_url)
            ? $object->first_page_url : '';
        $this->from          = isset($object->from) ? $object->from : 0;
        $this->next_page_url = isset($object->next_page_url)
            ? $object->next_page_url : '';
        $this->path          = isset($object->path) ? $object->path : '';
        $this->perPage       = isset($object->per_page) ? $object->per_page : 0;
        $this->prevPageUrl   = isset($object->prev_page_url)
            ? $object->prev_page_url : '';
        $this->to            = isset($object->to) ? $object->to : 0;
    }

    /**
     * Get current page.
     *
     * @return int
     */
    public function currentPage()
    {
        return $this->currentPage;
    }

    /**
     * Get list of data.
     *
     * @return array
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * Get first page url.
     *
     * @return string
     */
    public function firstPageUrl()
    {
        return $this->firstPageUrl;
    }

    /**
     * Get from.
     *
     * @return int
     */
    public function from()
    {
        return $this->from;
    }

    /**
     * Get next page url.
     *
     * @return string
     */
    public function nextPageUrl()
    {
        return $this->nextPageUrl;
    }

    /**
     * Get page path.
     *
     * @return string
     */
    public function path()
    {
        return $this->path;
    }

    /**
     * Get per page.
     *
     * @return int
     */
    public function perPage()
    {
        return $this->perPage;
    }

    /**
     * Get previous page url.
     *
     * @return string
     */
    public function prevPageUrl()
    {
        return $this->prevPageUrl;
    }

    /**
     * Get to.
     *
     * @return int
     */
    public function to()
    {
        return $this->to;
    }
}
