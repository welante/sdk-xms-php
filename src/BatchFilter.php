<?php

namespace Clx\Xms;

/**
 * Filter to use when listing batches.
 */
class BatchFilter
{

    /**
     * The maximum number of batches to retrieve per page.
     *
     * @var int page size
     */
    public $pageSize;

    /**
     * Fetch only batches having one of these senders.
     *
     * @var string[] list of short codes and long numbers
     */
    public $senders;

    /**
     * Fetch only batches having one or more of these tags.
     *
     * @var string[] list of tags
     */
    public $tags;

    /**
     * Fetch only batches sent at or after this date.
     *
     * @var \DateTime start date filter
     */
    public $startDate;

    /**
     * Fetch only batches sent before this date.
     *
     * @var \DateTime end date filter
     */
    public $endDate;

}

?>