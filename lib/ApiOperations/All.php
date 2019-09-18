<?php

namespace Telnyx\ApiOperations;

/**
 * Trait for listable resources. Adds a `all()` static method to the class.
 *
 * This trait should only be applied to classes that derive from TelnyxObject.
 */
trait All
{
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return \Telnyx\Collection of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        self::_validateParams($params);

        // Convert filter[] pararms
        if (is_array($params)) {
            foreach ($params as $name => $val) {

                // Make sure this isn't a page[] param
                if (strpos($name, '[') === false && strpos($name, ']') === false) {

                    // Enclose param in filter[] and remove old param
                    $params['filter[' . $name . ']'] = $val;
                    unset($params[$name]);
                }
            }
        }

        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);

        // Convert this response to a list or collection object
        $response->json['record_type'] = 'list';

        $obj = \Telnyx\Util\Util::convertToTelnyxObject($response->json, $opts);
        if (!is_a($obj, 'Telnyx\\Collection')) {
            $class = get_class($obj);
            $message = "Expected type \"Telnyx\\Collection\", got \"$class\" instead";
            throw new \Telnyx\Error\Api($message);
        }
        $obj->setLastResponse($response);
        $obj->setRequestParams($params);

        // This was a temporary field for convertToTelnyxObject. Remove it.
        unset($obj['record_type']);
        return $obj;
    }
}
