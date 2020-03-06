<?php

namespace Telnyx;

/**
 * Class Call
 *
 * @package Telnyx
 */
class Call extends ApiResource
{
    const OBJECT_NAME = "call";

    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\NestedResource;

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Answer an incoming call.
     */
    public function answer($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/answer';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Bridge two call control calls.
     */
    public function bridge($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/bridge';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Forking start
     */
    public function fork_start($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/fork_start';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Stop forking a call.
     */
    public function fork_stop()
    {
        $url = $this->instanceUrl() . '/actions/fork_stop';
        list($response, $opts) = $this->_request('post', $url, null, null);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Play an audio file on the call until the required DTMF signals are gathered to build interactive menus.
     */
    public function gather_using_audio($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/gather_using_audio';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Convert text to speech and play it on the call until the required DTMF signals are gathered to build interactive menus.
     */
    public function gather_using_speak($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/gather_using_speak';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Hang up the call.
     */
    public function hangup($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/hangup';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Play an audio file on the call. If multiple play audio commands are issued consecutively, the audio files will be placed in a queue awaiting playback.
     */
    public function playback_start($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/playback_start';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Stop audio being played on the call.
     */
    public function playback_stop($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/playback_stop';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Start recording the call. Recording will stop on call hang-up, or can be initiated via the Stop Recording command.
     */
    public function record_start($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/record_start';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Stop recording the call.
     */
    public function record_stop($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/record_stop';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Reject an incoming call.
     */
    public function reject($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/reject';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Sends DTMF tones from this leg. DTMF tones will be heard by the other end of the call.
     */
    public function send_dtmf($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/send_dtmf';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Convert text to speech and play it back on the call. If multiple speak text commands are issued consecutively, the audio files will be placed in a queue awaiting playback.
     */
    public function speak($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/speak';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Transfer a call to a new destination. If the transfer is unsuccessful, a call.hangup webhook will be sent indicating that the transfer could not be completed. The original call will remain active and may be issued additional commands, potentially transfering the call to an alternate destination.
     */
    public function transfer($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/transfer';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
    
}
