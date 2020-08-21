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
     * Join an existing call leg to a conference. Issue the Join Conference command
     * with the conference ID in the path and the call_control_id of the leg you 
     * wish to join to the conference as an attribute.
     *
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return 
     */
    public function join($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/join';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * Mute a list of participants in a conference call
     *
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return 
     */
    public function mute($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/mute';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * Unmute a list of participants in a conference call
     *
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return 
     */
    public function unmute($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/unmute';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * Hold a list of participants in a conference call
     *
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return 
     */
    public function hold($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/hold';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * Unhold a list of participants in a conference call
     *
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return 
     */
    public function unhold($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/unhold';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
