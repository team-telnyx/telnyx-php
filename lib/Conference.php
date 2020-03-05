<?php

namespace Telnyx;

/**
 * Class Conference
 *
 * @package Telnyx
 */
class Conference extends ApiResource
{
    const OBJECT_NAME = "conference";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;


    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Join an existing call leg to a conference. Issue the Join Conference command with the conference ID in the path and the call_control_id of the leg you wish to join to the conference as an attribute.
     */
    public function join($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/join';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Mute a list of participants in a conference call
     */
    public function mute($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/mute';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Unmute a list of participants in a conference call
     */
    public function unmute($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/unmute';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Hold a list of participants in a conference call
     */
    public function hold($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/hold';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Unhold a list of participants in a conference call
     */
    public function unhold($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/unhold';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
