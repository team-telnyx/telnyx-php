<?php

namespace Telnyx;

/**
 * Class SimCard
 *
 * @package Telnyx
 */
class SimCard extends ApiResource
{

    const OBJECT_NAME = "sim_card";

    use ApiOperations\All;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Request a SIM card activation
     */
    public function activate($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/activate';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Request a SIM card deactivation
     */
    public function deactivate($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/deactivate';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Register the SIM cards associated with the provided registration codes to the current user's account.
     */
    public static function register($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = '/v2/register/sim_cards';

        list($response, $opts) = static::_staticRequest('post', $url, $params, null);
        $obj = \Telnyx\Util\Util::convertToTelnyxObject($response->json, $opts);
        $obj->setLastResponse($response);
        return $obj;
    }

}
