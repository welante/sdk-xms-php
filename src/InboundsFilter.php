<?php

/**
 * Contains the inbounds filter class.
 *
 * PHP versions 5 and 7
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 */

namespace Clx\Xms;

/**
 * Filter to use when listing inbounds messages.
 */
class InboundsFilter
{

    /**
     * The maximum number of messages to retrieve per page.
     *
     * @var int page size
     */
    public $pageSize;

    /**
     * Fetch only messages having one of these recipients.
     *
     * @var string[] list of short codes and long numbers
     */
    public $recipients;

    /**
     * Fetch only messages received at or after this date.
     *
     * @var \DateTime start date filter
     */
    public $startDate;

    /**
     * Fetch only batches received before this date.
     *
     * @var \DateTime end date filter
     */
    public $endDate;

}

?>