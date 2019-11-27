<?php

namespace Textko\Contracts;

interface SmsListResponseContract
{
    /**
     * Get current page.
     *
     * @return int
     */
    public function currentPage();

    /**
     * Get list of data.
     *
     * @return array|null
     */
    public function data();

    /**
     * Get first page url.
     *
     * @return string
     */
    public function firstPageUrl();

    /**
     * Get from.
     *
     * @return int
     */
    public function from();

    /**
     * Get next page url.
     *
     * @return string
     */
    public function nextPageUrl();

    /**
     * Get page path.
     *
     * @return string
     */
    public function path();

    /**
     * Get per page.
     *
     * @return int
     */
    public function perPage();

    /**
     * Get previous page url.
     *
     * @return string
     */
    public function prevPageUrl();

    /**
     * Get to.
     *
     * @return int
     */
    public function to();
}