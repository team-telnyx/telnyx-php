<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\CallsContract;
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

final class CallsService implements CallsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update TeXML call. Please note that the keys present in the payload MUST BE formatted in CamelCase as specified in the example.
     *
     * @param array{
     *   fallbackMethod?: 'GET'|'POST'|FallbackMethod,
     *   fallbackURL?: string,
     *   method?: 'GET'|'POST'|Method,
     *   status?: string,
     *   statusCallback?: string,
     *   statusCallbackMethod?: 'GET'|'POST'|StatusCallbackMethod,
     *   texml?: string,
     *   url?: string,
     * }|CallUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $callSid,
        array|CallUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallUpdateResponse {
        [$parsed, $options] = CallUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CallUpdateResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['texml/calls/%1$s/update', $callSid],
            body: (object) $parsed,
            options: $options,
            convert: CallUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Initiate an outbound TeXML call. Telnyx will request TeXML from the XML Request URL configured for the connection in the Mission Control Portal.
     *
     * @param array{
     *   from: string,
     *   to: string,
     *   asyncAmd?: bool,
     *   asyncAmdStatusCallback?: string,
     *   asyncAmdStatusCallbackMethod?: 'GET'|'POST'|AsyncAmdStatusCallbackMethod,
     *   callerID?: string,
     *   cancelPlaybackOnDetectMessageEnd?: bool,
     *   cancelPlaybackOnMachineDetection?: bool,
     *   detectionMode?: 'Premium'|'Regular'|DetectionMode,
     *   fallbackURL?: string,
     *   machineDetection?: 'Enable'|'Disable'|'DetectMessageEnd'|MachineDetection,
     *   machineDetectionSilenceTimeout?: int,
     *   machineDetectionSpeechEndThreshold?: int,
     *   machineDetectionSpeechThreshold?: int,
     *   machineDetectionTimeout?: int,
     *   preferredCodecs?: string,
     *   record?: bool,
     *   recordingChannels?: 'mono'|'dual'|RecordingChannels,
     *   recordingStatusCallback?: string,
     *   recordingStatusCallbackEvent?: string,
     *   recordingStatusCallbackMethod?: 'GET'|'POST'|RecordingStatusCallbackMethod,
     *   recordingTimeout?: int,
     *   recordingTrack?: 'inbound'|'outbound'|'both'|RecordingTrack,
     *   sipAuthPassword?: string,
     *   sipAuthUsername?: string,
     *   statusCallback?: string,
     *   statusCallbackEvent?: 'initiated'|'ringing'|'answered'|'completed'|StatusCallbackEvent,
     *   statusCallbackMethod?: 'GET'|'POST'|CallInitiateParams\StatusCallbackMethod,
     *   trim?: 'trim-silence'|'do-not-trim'|Trim,
     *   url?: string,
     *   urlMethod?: 'GET'|'POST'|URLMethod,
     * }|CallInitiateParams $params
     *
     * @throws APIException
     */
    public function initiate(
        string $applicationID,
        array|CallInitiateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallInitiateResponse {
        [$parsed, $options] = CallInitiateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CallInitiateResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['texml/calls/%1$s', $applicationID],
            body: (object) $parsed,
            options: $options,
            convert: CallInitiateResponse::class,
        );

        return $response->parse();
    }
}
