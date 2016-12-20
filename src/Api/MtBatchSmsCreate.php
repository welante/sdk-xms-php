<?php

/**
 * Contains the base class for all SMS batch creation classes.
 *
 * PHP versions 5 and 7
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 */

namespace Clx\Xms\Api;

/**
 * Describes parameters available during batch creation.
 *
 * We can create two kinds of batches, textual and binary, described
 * in the child classes `MtBatchSmsTextCreate` and
 * `MtBatchTextSmsCreate`, respectively.
 */
class MtBatchSmsCreate extends MtBatchSms
{

    /**
     * The initial set of tags to give the batch.
     */
    public $tags;

}

?>