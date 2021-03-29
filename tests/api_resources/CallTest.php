<?php

namespace Telnyx;

/**
 * @internal
 * @covers \Telnyx\Call
 */
final class CallTest extends \Telnyx\TestCase
{
    const CALL_CONTROL_ID = '428c31b6-7af4-4bcb-b7f5-5013ef9657c1';

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

    public function testAnswer()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/answer'
        );
        $resource = $call->answer();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testBridge()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/bridge'
        );
        $resource = $call->bridge();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testForkStart()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/fork_start'
        );
        $resource = $call->fork_start();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testForkStop()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/fork_stop'
        );
        $resource = $call->fork_stop();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testGatherUsingAudio()
    {
        $call = new Call(self::CALL_CONTROL_ID);

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
        $call = new Call(self::CALL_CONTROL_ID);

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

    public function testHangup()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/hangup'
        );
        $resource = $call->hangup();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testPlaybackStart()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/playback_start'
        );
        $resource = $call->playback_start();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testPlaybackStop()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/playback_stop'
        );
        $resource = $call->playback_stop();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testRecordStart()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/record_start'
        );
        $resource = $call->record_start();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testRecordStop()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/record_stop'
        );
        $resource = $call->record_stop();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testReject()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/reject'
        );
        $resource = $call->reject();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testSendDTMF()
    {
        $call = new Call(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/send_dtmf'
        );
        $resource = $call->send_dtmf(['digits' => '1www2WABCDw9']);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testSpeak()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . urlencode(self::CALL_CONTROL_ID) . '/actions/speak'
        );
        $resource = $call->speak(['digits' => '1www2WABCDw9']);
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }

    public function testTransactionStart()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . (self::CALL_CONTROL_ID) . '/actions/transcription_start'
        );
        $resource = $call->transcription_start();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
    public function testTransactionStop()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . (self::CALL_CONTROL_ID) . '/actions/transcription_stop'
        );
        $resource = $call->transcription_stop();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
    public function testRecordPause()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . (self::CALL_CONTROL_ID) . '/actions/record_pause'
        );
        $resource = $call->record_pause();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
    public function testRecordResume()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . (self::CALL_CONTROL_ID) . '/actions/record_resume'
        );
        $resource = $call->record_resume();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
    public function testGatherStop()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . (self::CALL_CONTROL_ID) . '/actions/gather_stop'
        );
        $resource = $call->gather_stop();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
    public function testRefer()
    {
        $call = Call::retrieve(self::CALL_CONTROL_ID);

        $this->expectsRequest(
            'post',
            '/v2/calls/' . (self::CALL_CONTROL_ID) . '/actions/refer'
        );
        $resource = $call->refer();
        $this->assertInstanceOf(\Telnyx\TelnyxObject::class, $resource);
    }
}
