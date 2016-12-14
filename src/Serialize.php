<?php

/**
 * Contains JSON serialization of the XMS API object classes.
 *
 * PHP versions 5 and 7
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 */

namespace Clx\Xms;

require_once "Api.php";
require_once "Exceptions.php";

class Serialize
{

    /**
     * Serializes the given `DateTime` in a ISO-8601 format.
     *
     * @param DateTime $dt the date time object to format
     *
     * @return string a date time in ISO-8601 format
     */
    private static function _writeDateTime($dt)
    {
        return $dt->format(\DateTime::ATOM);
    }

    private static function _toJson($fields)
    {
        return json_encode($fields, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public static function _createBatchHelper(&$fields, MtSmsBatchCreate &$batch)
    {
        $fields['from'] = $batch->sender;
        $fields['to'] = $batch->recipients;

        if (isset($batch->deliveryReport)) {
            $fields['delivery_report'] = $batch->deliveryReport;
        }

        if (isset($batch->sendAt)) {
            $fields['send_at'] = Serialize::_writeDateTime($batch->sendAt);
        }

        if (isset($batch->expireAt)) {
            $fields['expire_at'] = Serialize::_writeDateTime($batch->expireAt);
        }

        if (isset($batch->tags)) {
            $fields['tags'] = $batch->tags;
        }

        if (isset($batch->callbackUrl)) {
            $fields['callback_url'] = $batch->callbackUrl;
        }
    }

    public static function writeTextBatch(MtTextSmsBatchCreate $batch_create)
    {
        $fields = array(
            'body' => $batch_create->body
        );

        if (!empty($batch_create->parameters)) {
            $fields['parameters'] = $batch_create->parameters;
        }

        Serialize::_createBatchHelper($fields, $batch_create);

        return Serialize::_toJson($fields);
    }

    public static function writeBinaryBatch(MtBinarySmsBatchCreate $batch_create)
    {
        $fields = array(
            'body' => base64_encode($batch_create->body),
            'udh' => bin2hex($batch_create->udh)
        );

        Serialize::_createBatchHelper($fields, $batch_create);

        return Serialize::_toJson($fields);
    }

}

?>