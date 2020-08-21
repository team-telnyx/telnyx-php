<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\Call
 */
final class CallTest extends \Telnyx\TestCase
{
    const CALL_CONTROL_ID = 'AgDIxmoRX6QMuaIj_uXRXnPAXP0QlNfXczRrZvZakpWxBlpw48KyZQ==';

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v2/calls'
        );
        $resource = Call::create([
            'connection_id' => 'uuid',
            'to' => '+18005550199',
            'from' => '+18005550100'
        ]);
        $this->assertInstanceOf(\Telnyx\Call::class, $resource);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID)
        );
        $resource = Call::retrieve(self::CALL_CONTROL_ID);
        $this->assertInstanceOf(\Telnyx\Call::class, $resource);
    }

    /*
    public function testAnswer()
    {
        // "Pick up" the call
        $call = new \Telnyx\Call(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/answer'
        );
        $resource = $call->answer();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testBridge()
    {
        // "Pick up" the call
        $call = new \Telnyx\Call(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/bridge'
        );
        $resource = $call->bridge();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testForkStart()
    {
        // "Pick up" the call
        $call = new \Telnyx\Call(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/fork_start'
        );
        $resource = $call->fork_start();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testForkStop()
    {
        // "Pick up" the call
        $call = new \Telnyx\Call(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/fork_stop'
        );
        $resource = $call->fork_stop();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
    */

    public function testGatherUsingAudio()
    {
        // "Pick up" the call
        $call = new \Telnyx\Call(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/gather_using_audio'
        );
        $resource = $call->gather_using_audio([
            "audio_url" => "http://example.com/message.wav"
        ]);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testGatherUsingSpeak()
    {
        // "Pick up" the call
        $call = new \Telnyx\Call(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/gather_using_speak'
        );
        $resource = $call->gather_using_speak([
            "language" => "en-US",
            "voice" => "female",
            "payload" => "Telnyx call control test"
        ]);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
}
