<?php

namespace Clx\Xms\Api;

/**
 * A paged result.
 *
 * It is possible to, e.g., fetch individual pages or iterate over all
 * pages.
 *
 * @api
 */
class Pages implements \IteratorAggregate
{

    private $_worker;

    /**
     * Creates a new pages object with the given page fetcher. This is
     * mainly intended for internal use.
     *
     * @param callable $worker a page fetcher
     *
     * @return Pages
     */
    public function __construct(callable $worker)
    {
        $this->_worker = $worker;
    }

    /**
     * Downloads a specific page.
     *
     * @param int $page number of the page to fetch
     *
     * @return Page a page
     *
     * @api
     */
    public function get(int $page)
    {
        return call_user_func($this->_worker, $page);
    }

    /**
     * Returns an iterator over these pages.
     *
     * @return \Iterator an iterator
     *
     * @api
     */
    public function getIterator()
    {
        return new PagesIterator($this);
    }

}

?>