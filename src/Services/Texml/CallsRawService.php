<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\CallsRawContract;
use Telnyx\Texml\Calls\CallInitiateParams;
use Telnyx\Texml\Calls\CallInitiateParams\AsyncAmdStatusCallbackMethod;
use Telnyx\Texml\Calls\CallInitiateParams\DetectionMode;
use Telnyx\Texml\Calls\CallInitiateParams\MachineDetection;
use Telnyx\Texml\Calls\CallInitiateParams\RecordingChannels;
use Telnyx\Texml\Calls\CallInitiateParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Calls\CallInitiateParams\RecordingTrack;
use Telnyx\Texml\Calls\CallInitiateParams\StatusCallbackEvent;
use Telnyx\Texml\Calls\CallInitiateParams\Trim;
use Telnyx\Texml\Calls\CallInitiateParams\URLMethod;
use Telnyx\Texml\Calls\CallInitiateResponse;
use Telnyx\Texml\Calls\CallUpdateParams;
use Telnyx\Texml\Calls\CallUpdateParams\FallbackMethod;
use Telnyx\Texml\Calls\CallUpdateParams\Method;
use Telnyx\Texml\Calls\CallUpdateParams\StatusCallbackMethod;
use Telnyx\Texml\Calls\CallUpdateResponse;

/**
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
     * Update TeXML call. Please note that the keys present in the payload MUST BE formatted in CamelCase as specified in the example.
     *
     * @param string $callSid the CallSid that identifies the call to update
     * @param array{
     *   fallbackMethod?: FallbackMethod|value-of<FallbackMethod>,
     *   fallbackURL?: string,
     *   method?: Method|value-of<Method>,
     *   status?: string,
     *   statusCallback?: string,
     *   statusCallbackMethod?: StatusCallbackMethod|value-of<StatusCallbackMethod>,
     *   texml?: string,
     *   url?: string,
     * }|CallUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $callSid,
        array|CallUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['texml/calls/%1$s/update', $callSid],
            body: (object) $parsed,
            options: $options,
            convert: CallUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Initiate an outbound TeXML call. Telnyx will request TeXML from the XML Request URL configured for the connection in the Mission Control Portal.
     *
     * @param string $applicationID the ID of the TeXML application used for the call
     * @param array{
     *   from: string,
     *   to: string,
     *   asyncAmd?: bool,
     *   asyncAmdStatusCallback?: string,
     *   asyncAmdStatusCallbackMethod?: AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod>,
     *   callerID?: string,
     *   cancelPlaybackOnDetectMessageEnd?: bool,
     *   cancelPlaybackOnMachineDetection?: bool,
     *   detectionMode?: DetectionMode|value-of<DetectionMode>,
     *   fallbackURL?: string,
     *   machineDetection?: MachineDetection|value-of<MachineDetection>,
     *   machineDetectionSilenceTimeout?: int,
     *   machineDetectionSpeechEndThreshold?: int,
     *   machineDetectionSpeechThreshold?: int,
     *   machineDetectionTimeout?: int,
     *   preferredCodecs?: string,
     *   record?: bool,
     *   recordingChannels?: RecordingChannels|value-of<RecordingChannels>,
     *   recordingStatusCallback?: string,
     *   recordingStatusCallbackEvent?: string,
     *   recordingStatusCallbackMethod?: RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>,
     *   recordingTimeout?: int,
     *   recordingTrack?: RecordingTrack|value-of<RecordingTrack>,
     *   sipAuthPassword?: string,
     *   sipAuthUsername?: string,
     *   statusCallback?: string,
     *   statusCallbackEvent?: StatusCallbackEvent|value-of<StatusCallbackEvent>,
     *   statusCallbackMethod?: CallInitiateParams\StatusCallbackMethod|value-of<CallInitiateParams\StatusCallbackMethod>,
     *   trim?: Trim|value-of<Trim>,
     *   url?: string,
     *   urlMethod?: URLMethod|value-of<URLMethod>,
     * }|CallInitiateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallInitiateResponse>
     *
     * @throws APIException
     */
    public function initiate(
        string $applicationID,
        array|CallInitiateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallInitiateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['texml/calls/%1$s', $applicationID],
            body: (object) $parsed,
            options: $options,
            convert: CallInitiateResponse::class,
        );
    }
}
