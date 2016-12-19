<?php

namespace Clx\Xms\Api;

/**
 * Describes updates to a binary SMS batch.
 */
class MtBinarySmsBatchUpdate extends MtSmsBatchUpdate
{

    /**
     * The updated binary batch body.
     *
     * If `null` then the existing body is left as-is.
     *
     * @var string|null the batch body
     */
    public $body;

    /**
     * The updated binary User Data Header.
     *
     * If `null` then the existing UDH is left as-is.
     *
     * @var string|null the UDH
     */
    public $udh;

}

?>