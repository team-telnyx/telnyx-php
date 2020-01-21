<?php

namespace Telnyx;

/**
 * Class PhoneNumber
 *
 * @package Telnyx
 */
class PhoneNumber extends ApiResource
{
    const OBJECT_NAME = "phone_number";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * @return Retrieve the voice settings for a phone number
     */
    public function voice()
    {
        $url = $this->instanceUrl() . '/voice';
        list($response, $opts) = $this->_request('get', $url, null, null);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Update the voice settings for a phone number
     */
    public function update_voice($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/voice';
        list($response, $opts) = $this->_request('patch', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @return Retrieve the messaging settings for a phone number
     */
    public function messaging()
    {
        $url = $this->instanceUrl() . '/messaging';
        list($response, $opts) = $this->_request('get', $url, null, null);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Update the messaging settings for a phone number
     */
    public function update_messaging($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/messaging';
        list($response, $opts) = $this->_request('patch', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
