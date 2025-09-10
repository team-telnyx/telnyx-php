<?php

namespace Tests\Services\Calls;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class ActionsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testAnswer(): void
    {
        $result = $this->client->calls->actions->answer('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBridge(): void
    {
        $result = $this->client->calls->actions->bridge(
            'call_control_id',
            callControlID: 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBridgeWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->bridge(
            'call_control_id',
            callControlID: 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testEnqueue(): void
    {
        $result = $this->client->calls->actions->enqueue(
            'call_control_id',
            queueName: 'support'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testEnqueueWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->enqueue(
            'call_control_id',
            queueName: 'support'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGather(): void
    {
        $result = $this->client->calls->actions->gather('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGatherUsingAI(): void
    {
        $result = $this->client->calls->actions->gatherUsingAI(
            'call_control_id',
            parameters: [
                'properties' => [
                    'age' => [
                        'description' => 'The age of the customer.', 'type' => 'integer',
                    ],
                    'location' => [
                        'description' => 'The location of the customer.', 'type' => 'string',
                    ],
                ],
                'required' => ['age', 'location'],
                'type' => 'object',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGatherUsingAIWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->gatherUsingAI(
            'call_control_id',
            parameters: [
                'properties' => [
                    'age' => [
                        'description' => 'The age of the customer.', 'type' => 'integer',
                    ],
                    'location' => [
                        'description' => 'The location of the customer.', 'type' => 'string',
                    ],
                ],
                'required' => ['age', 'location'],
                'type' => 'object',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGatherUsingAudio(): void
    {
        $result = $this->client->calls->actions->gatherUsingAudio(
            'call_control_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGatherUsingSpeak(): void
    {
        $result = $this->client->calls->actions->gatherUsingSpeak(
            'call_control_id',
            payload: 'say this on call',
            voice: 'male'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGatherUsingSpeakWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->gatherUsingSpeak(
            'call_control_id',
            payload: 'say this on call',
            voice: 'male'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testHangup(): void
    {
        $result = $this->client->calls->actions->hangup('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testLeaveQueue(): void
    {
        $result = $this->client->calls->actions->leaveQueue('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPauseRecording(): void
    {
        $result = $this->client->calls->actions->pauseRecording('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRefer(): void
    {
        $result = $this->client->calls->actions->refer(
            'call_control_id',
            sipAddress: 'sip:username@sip.non-telnyx-address.com'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReferWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->refer(
            'call_control_id',
            sipAddress: 'sip:username@sip.non-telnyx-address.com'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReject(): void
    {
        $result = $this->client->calls->actions->reject(
            'call_control_id',
            cause: 'USER_BUSY'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRejectWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->reject(
            'call_control_id',
            cause: 'USER_BUSY'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testResumeRecording(): void
    {
        $result = $this->client->calls->actions->resumeRecording('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSendDtmf(): void
    {
        $result = $this->client->calls->actions->sendDtmf(
            'call_control_id',
            digits: '1www2WABCDw9'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSendDtmfWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->sendDtmf(
            'call_control_id',
            digits: '1www2WABCDw9'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSendSipInfo(): void
    {
        $result = $this->client->calls->actions->sendSipInfo(
            'call_control_id',
            body: '{"key": "value", "numValue": 100}',
            contentType: 'application/json',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSendSipInfoWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->sendSipInfo(
            'call_control_id',
            body: '{"key": "value", "numValue": 100}',
            contentType: 'application/json',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSpeak(): void
    {
        $result = $this->client->calls->actions->speak(
            'call_control_id',
            payload: 'Say this on the call',
            voice: 'female'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSpeakWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->speak(
            'call_control_id',
            payload: 'Say this on the call',
            voice: 'female'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStartAIAssistant(): void
    {
        $result = $this->client->calls->actions->startAIAssistant(
            'call_control_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStartForking(): void
    {
        $result = $this->client->calls->actions->startForking('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStartNoiseSuppression(): void
    {
        $result = $this->client->calls->actions->startNoiseSuppression(
            'call_control_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStartPlayback(): void
    {
        $result = $this->client->calls->actions->startPlayback('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStartRecording(): void
    {
        $result = $this->client->calls->actions->startRecording(
            'call_control_id',
            channels: 'single',
            format: 'wav'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStartRecordingWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->startRecording(
            'call_control_id',
            channels: 'single',
            format: 'wav'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStartSiprec(): void
    {
        $result = $this->client->calls->actions->startSiprec('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStartStreaming(): void
    {
        $result = $this->client->calls->actions->startStreaming('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStartTranscription(): void
    {
        $result = $this->client->calls->actions->startTranscription(
            'call_control_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStopAIAssistant(): void
    {
        $result = $this->client->calls->actions->stopAIAssistant('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStopForking(): void
    {
        $result = $this->client->calls->actions->stopForking('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStopGather(): void
    {
        $result = $this->client->calls->actions->stopGather('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStopNoiseSuppression(): void
    {
        $result = $this->client->calls->actions->stopNoiseSuppression(
            'call_control_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStopPlayback(): void
    {
        $result = $this->client->calls->actions->stopPlayback('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStopRecording(): void
    {
        $result = $this->client->calls->actions->stopRecording('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStopSiprec(): void
    {
        $result = $this->client->calls->actions->stopSiprec('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStopStreaming(): void
    {
        $result = $this->client->calls->actions->stopStreaming('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testStopTranscription(): void
    {
        $result = $this->client->calls->actions->stopTranscription(
            'call_control_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSwitchSupervisorRole(): void
    {
        $result = $this->client->calls->actions->switchSupervisorRole(
            'call_control_id',
            'barge'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSwitchSupervisorRoleWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->switchSupervisorRole(
            'call_control_id',
            'barge'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testTransfer(): void
    {
        $result = $this->client->calls->actions->transfer(
            'call_control_id',
            to: '+18005550100 or sip:username@sip.telnyx.com'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testTransferWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->transfer(
            'call_control_id',
            to: '+18005550100 or sip:username@sip.telnyx.com'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateClientState(): void
    {
        $result = $this->client->calls->actions->updateClientState(
            'call_control_id',
            'aGF2ZSBhIG5pY2UgZGF5ID1d'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateClientStateWithOptionalParams(): void
    {
        $result = $this->client->calls->actions->updateClientState(
            'call_control_id',
            'aGF2ZSBhIG5pY2UgZGF5ID1d'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
