<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Calls\Actions\TranscriptionStartRequest;
use Telnyx\Calls\CallDialParams;
use Telnyx\Calls\CallDialParams\AnsweringMachineDetection;
use Telnyx\Calls\CallDialParams\AnsweringMachineDetectionConfig;
use Telnyx\Calls\CallDialParams\ConferenceConfig;
use Telnyx\Calls\CallDialParams\MediaEncryption;
use Telnyx\Calls\CallDialParams\Record;
use Telnyx\Calls\CallDialParams\RecordChannels;
use Telnyx\Calls\CallDialParams\RecordFormat;
use Telnyx\Calls\CallDialParams\RecordTrack;
use Telnyx\Calls\CallDialParams\RecordTrim;
use Telnyx\Calls\CallDialParams\SipRegion;
use Telnyx\Calls\CallDialParams\SipTransportProtocol;
use Telnyx\Calls\CallDialParams\StreamTrack;
use Telnyx\Calls\CallDialParams\SupervisorRole;
use Telnyx\Calls\CallDialParams\WebhookURLMethod;
use Telnyx\Calls\CallDialResponse;
use Telnyx\Calls\CallGetStatusResponse;
use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\DialogflowConfig;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SoundModifications;
use Telnyx\Calls\StreamBidirectionalCodec;
use Telnyx\Calls\StreamBidirectionalMode;
use Telnyx\Calls\StreamBidirectionalSamplingRate;
use Telnyx\Calls\StreamBidirectionalTargetLegs;
use Telnyx\Calls\StreamCodec;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallsRawContract;

/**
 * @phpstan-import-type ToShape from \Telnyx\Calls\CallDialParams\To
 * @phpstan-import-type AnsweringMachineDetectionConfigShape from \Telnyx\Calls\CallDialParams\AnsweringMachineDetectionConfig
 * @phpstan-import-type ConferenceConfigShape from \Telnyx\Calls\CallDialParams\ConferenceConfig
 * @phpstan-import-type CustomSipHeaderShape from \Telnyx\Calls\CustomSipHeader
 * @phpstan-import-type DialogflowConfigShape from \Telnyx\Calls\DialogflowConfig
 * @phpstan-import-type SipHeaderShape from \Telnyx\Calls\SipHeader
 * @phpstan-import-type SoundModificationsShape from \Telnyx\Calls\SoundModifications
 * @phpstan-import-type TranscriptionStartRequestShape from \Telnyx\Calls\Actions\TranscriptionStartRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CallsRawService implements CallsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     *   to: ToShape,
     *   answeringMachineDetection?: AnsweringMachineDetection|value-of<AnsweringMachineDetection>,
     *   answeringMachineDetectionConfig?: AnsweringMachineDetectionConfig|AnsweringMachineDetectionConfigShape,
     *   audioURL?: string,
     *   billingGroupID?: string,
     *   bridgeIntent?: bool,
     *   bridgeOnAnswer?: bool,
     *   clientState?: string,
     *   commandID?: string,
     *   conferenceConfig?: ConferenceConfig|ConferenceConfigShape,
     *   customHeaders?: list<CustomSipHeader|CustomSipHeaderShape>,
     *   dialogflowConfig?: DialogflowConfig|DialogflowConfigShape,
     *   enableDialogflow?: bool,
     *   fromDisplayName?: string,
     *   linkTo?: string,
     *   mediaEncryption?: MediaEncryption|value-of<MediaEncryption>,
     *   mediaName?: string,
     *   parkAfterUnbridge?: string,
     *   preferredCodecs?: string,
     *   record?: Record|value-of<Record>,
     *   recordChannels?: RecordChannels|value-of<RecordChannels>,
     *   recordCustomFileName?: string,
     *   recordFormat?: RecordFormat|value-of<RecordFormat>,
     *   recordMaxLength?: int,
     *   recordTimeoutSecs?: int,
     *   recordTrack?: RecordTrack|value-of<RecordTrack>,
     *   recordTrim?: RecordTrim|value-of<RecordTrim>,
     *   sendSilenceWhenIdle?: bool,
     *   sipAuthPassword?: string,
     *   sipAuthUsername?: string,
     *   sipHeaders?: list<SipHeader|SipHeaderShape>,
     *   sipRegion?: SipRegion|value-of<SipRegion>,
     *   sipTransportProtocol?: SipTransportProtocol|value-of<SipTransportProtocol>,
     *   soundModifications?: SoundModifications|SoundModificationsShape,
     *   streamBidirectionalCodec?: StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>,
     *   streamBidirectionalMode?: StreamBidirectionalMode|value-of<StreamBidirectionalMode>,
     *   streamBidirectionalSamplingRate?: StreamBidirectionalSamplingRate|value-of<StreamBidirectionalSamplingRate>,
     *   streamBidirectionalTargetLegs?: StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>,
     *   streamCodec?: StreamCodec|value-of<StreamCodec>,
     *   streamEstablishBeforeCallOriginate?: bool,
     *   streamTrack?: StreamTrack|value-of<StreamTrack>,
     *   streamURL?: string,
     *   superviseCallControlID?: string,
     *   supervisorRole?: SupervisorRole|value-of<SupervisorRole>,
     *   timeLimitSecs?: int,
     *   timeoutSecs?: int,
     *   transcription?: bool,
     *   transcriptionConfig?: TranscriptionStartRequest|TranscriptionStartRequestShape,
     *   webhookURL?: string,
     *   webhookURLMethod?: WebhookURLMethod|value-of<WebhookURLMethod>,
     * }|CallDialParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallDialResponse>
     *
     * @throws APIException
     */
    public function dial(
        array|CallDialParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallDialParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'calls',
            body: (object) $parsed,
            options: $options,
            convert: CallDialResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the status of a call (data is available 10 minutes after call ended).
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallGetStatusResponse>
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $callControlID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['calls/%1$s', $callControlID],
            options: $requestOptions,
            convert: CallGetStatusResponse::class,
        );
    }
}
