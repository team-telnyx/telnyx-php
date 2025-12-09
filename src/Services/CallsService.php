<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngine;
use Telnyx\Calls\CallDialParams;
use Telnyx\Calls\CallDialParams\AnsweringMachineDetection;
use Telnyx\Calls\CallDialParams\ConferenceConfig\BeepEnabled;
use Telnyx\Calls\CallDialParams\ConferenceConfig\SupervisorRole;
use Telnyx\Calls\CallDialParams\MediaEncryption;
use Telnyx\Calls\CallDialParams\Record;
use Telnyx\Calls\CallDialParams\RecordChannels;
use Telnyx\Calls\CallDialParams\RecordFormat;
use Telnyx\Calls\CallDialParams\RecordTrack;
use Telnyx\Calls\CallDialParams\RecordTrim;
use Telnyx\Calls\CallDialParams\SipRegion;
use Telnyx\Calls\CallDialParams\SipTransportProtocol;
use Telnyx\Calls\CallDialParams\StreamTrack;
use Telnyx\Calls\CallDialParams\WebhookURLMethod;
use Telnyx\Calls\CallDialResponse;
use Telnyx\Calls\CallGetStatusResponse;
use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SipHeader\Name;
use Telnyx\Calls\StreamBidirectionalCodec;
use Telnyx\Calls\StreamBidirectionalMode;
use Telnyx\Calls\StreamBidirectionalSamplingRate;
use Telnyx\Calls\StreamBidirectionalTargetLegs;
use Telnyx\Calls\StreamCodec;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallsContract;
use Telnyx\Services\Calls\ActionsService;

final class CallsService implements CallsContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Dial a number or SIP URI from a given connection. A successful response will include a `call_leg_id` which can be used to correlate the command with subsequent webhooks.
     *
     * **Expected Webhooks:**
     *
     * - `call.initiated`
     * - `call.answered` or `call.hangup`
     * - `call.machine.detection.ended` if `answering_machine_detection` was requested
     * - `call.machine.greeting.ended` if `answering_machine_detection` was requested to detect the end of machine greeting
     * - `call.machine.premium.detection.ended` if `answering_machine_detection=premium` was requested
     * - `call.machine.premium.greeting.ended` if `answering_machine_detection=premium` was requested and a beep was detected
     * - `streaming.started`, `streaming.stopped` or `streaming.failed` if `stream_url` was set
     *
     * When the `record` parameter is set to `record-from-answer`, the response will include a `recording_id` field.
     *
     * @param array{
     *   connectionID: string,
     *   from: string,
     *   to: string|list<string>,
     *   answeringMachineDetection?: 'premium'|'detect'|'detect_beep'|'detect_words'|'greeting_end'|'disabled'|AnsweringMachineDetection,
     *   answeringMachineDetectionConfig?: array{
     *     afterGreetingSilenceMillis?: int,
     *     betweenWordsSilenceMillis?: int,
     *     greetingDurationMillis?: int,
     *     greetingSilenceDurationMillis?: int,
     *     greetingTotalAnalysisTimeMillis?: int,
     *     initialSilenceMillis?: int,
     *     maximumNumberOfWords?: int,
     *     maximumWordLengthMillis?: int,
     *     silenceThreshold?: int,
     *     totalAnalysisTimeMillis?: int,
     *   },
     *   audioURL?: string,
     *   billingGroupID?: string,
     *   bridgeIntent?: bool,
     *   bridgeOnAnswer?: bool,
     *   clientState?: string,
     *   commandID?: string,
     *   conferenceConfig?: array{
     *     id?: string,
     *     beepEnabled?: 'always'|'never'|'on_enter'|'on_exit'|BeepEnabled,
     *     conferenceName?: string,
     *     earlyMedia?: bool,
     *     endConferenceOnExit?: bool,
     *     hold?: bool,
     *     holdAudioURL?: string,
     *     holdMediaName?: string,
     *     mute?: bool,
     *     softEndConferenceOnExit?: bool,
     *     startConferenceOnCreate?: bool,
     *     startConferenceOnEnter?: bool,
     *     supervisorRole?: 'barge'|'monitor'|'none'|'whisper'|SupervisorRole,
     *     whisperCallControlIDs?: list<string>,
     *   },
     *   customHeaders?: list<array{name: string, value: string}|CustomSipHeader>,
     *   dialogflowConfig?: array{
     *     analyzeSentiment?: bool, partialAutomatedAgentReply?: bool
     *   },
     *   enableDialogflow?: bool,
     *   fromDisplayName?: string,
     *   linkTo?: string,
     *   mediaEncryption?: 'disabled'|'SRTP'|'DTLS'|MediaEncryption,
     *   mediaName?: string,
     *   parkAfterUnbridge?: string,
     *   preferredCodecs?: string,
     *   record?: 'record-from-answer'|Record,
     *   recordChannels?: 'single'|'dual'|RecordChannels,
     *   recordCustomFileName?: string,
     *   recordFormat?: 'wav'|'mp3'|RecordFormat,
     *   recordMaxLength?: int,
     *   recordTimeoutSecs?: int,
     *   recordTrack?: 'both'|'inbound'|'outbound'|RecordTrack,
     *   recordTrim?: 'trim-silence'|RecordTrim,
     *   sendSilenceWhenIdle?: bool,
     *   sipAuthPassword?: string,
     *   sipAuthUsername?: string,
     *   sipHeaders?: list<array{name: 'User-to-User'|Name, value: string}|SipHeader>,
     *   sipRegion?: 'US'|'Europe'|'Canada'|'Australia'|'Middle East'|SipRegion,
     *   sipTransportProtocol?: 'UDP'|'TCP'|'TLS'|SipTransportProtocol,
     *   soundModifications?: array{
     *     octaves?: float, pitch?: float, semitone?: float, track?: string
     *   },
     *   streamBidirectionalCodec?: 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|StreamBidirectionalCodec,
     *   streamBidirectionalMode?: 'mp3'|'rtp'|StreamBidirectionalMode,
     *   streamBidirectionalSamplingRate?: 8000|16000|22050|24000|48000|StreamBidirectionalSamplingRate,
     *   streamBidirectionalTargetLegs?: 'both'|'self'|'opposite'|StreamBidirectionalTargetLegs,
     *   streamCodec?: 'PCMU'|'PCMA'|'G722'|'OPUS'|'AMR-WB'|'L16'|'default'|StreamCodec,
     *   streamEstablishBeforeCallOriginate?: bool,
     *   streamTrack?: 'inbound_track'|'outbound_track'|'both_tracks'|StreamTrack,
     *   streamURL?: string,
     *   superviseCallControlID?: string,
     *   supervisorRole?: 'barge'|'whisper'|'monitor'|CallDialParams\SupervisorRole,
     *   timeLimitSecs?: int,
     *   timeoutSecs?: int,
     *   transcription?: bool,
     *   transcriptionConfig?: array{
     *     clientState?: string,
     *     commandID?: string,
     *     transcriptionEngine?: 'Google'|'Telnyx'|'Deepgram'|'Azure'|'A'|'B'|TranscriptionEngine,
     *     transcriptionEngineConfig?: array<string,mixed>,
     *     transcriptionTracks?: string,
     *   },
     *   webhookURL?: string,
     *   webhookURLMethod?: 'POST'|'GET'|WebhookURLMethod,
     * }|CallDialParams $params
     *
     * @throws APIException
     */
    public function dial(
        array|CallDialParams $params,
        ?RequestOptions $requestOptions = null
    ): CallDialResponse {
        [$parsed, $options] = CallDialParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CallDialResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'calls',
            body: (object) $parsed,
            options: $options,
            convert: CallDialResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the status of a call (data is available 10 minutes after call ended).
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $callControlID,
        ?RequestOptions $requestOptions = null
    ): CallGetStatusResponse {
        /** @var BaseResponse<CallGetStatusResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['calls/%1$s', $callControlID],
            options: $requestOptions,
            convert: CallGetStatusResponse::class,
        );

        return $response->parse();
    }
}
