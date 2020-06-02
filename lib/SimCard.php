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
        $url = '/v2/actions/register/sim_cards';

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Telnyx\Util\Util::convertToTelnyxObject($response->json, $opts);
        return $obj;
    }

    /**
     * @param string|null $id
     *
     * @return It deletes the network preferences currently applied in the SIM card.
     */
    public static function delete_network_preferences($id)
    {
        $url = '/v2/sim_cards/' . $id . '/network_preferences';

        list($response, $opts) = static::_staticRequest('delete', $url, null, null);
        $obj = \Telnyx\Util\Util::convertToTelnyxObject($response->json, $opts);
        return $obj;
    }

    /**
     * @param string|null $id
     *
     * @return It sets the network preferences currently applied in the SIM card.
     */
    public static function get_network_preferences($id)
    {
        $url = '/v2/sim_cards/' . $id . '/network_preferences';

        list($response, $opts) = static::_staticRequest('get', $url, null, null);
        $obj = \Telnyx\Util\Util::convertToTelnyxObject($response->json, $opts);
        return $obj;
    }

    /**
     * @param string|null $id
     *
     * @return It returns the network preferences currently applied in the SIM card.
     */
    public static function set_network_preferences($id, $params = null, $options = null)
    {
        $url = '/v2/sim_cards/' . $id . '/network_preferences';

        list($response, $opts) = static::_staticRequest('put', $url, $params, $options);
        $obj = \Telnyx\Util\Util::convertToTelnyxObject($response->json, $opts);
        return $obj;
    }
}
