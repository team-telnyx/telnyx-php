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
     *   FallbackMethod?: 'GET'|'POST'|FallbackMethod,
     *   FallbackUrl?: string,
     *   Method?: 'GET'|'POST'|Method,
     *   Status?: string,
     *   StatusCallback?: string,
     *   StatusCallbackMethod?: 'GET'|'POST'|StatusCallbackMethod,
     *   Texml?: string,
     *   Url?: string,
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
     *   From: string,
     *   To: string,
     *   AsyncAmd?: bool,
     *   AsyncAmdStatusCallback?: string,
     *   AsyncAmdStatusCallbackMethod?: 'GET'|'POST'|AsyncAmdStatusCallbackMethod,
     *   CallerId?: string,
     *   CancelPlaybackOnDetectMessageEnd?: bool,
     *   CancelPlaybackOnMachineDetection?: bool,
     *   DetectionMode?: 'Premium'|'Regular'|DetectionMode,
     *   FallbackUrl?: string,
     *   MachineDetection?: 'Enable'|'Disable'|'DetectMessageEnd'|MachineDetection,
     *   MachineDetectionSilenceTimeout?: int,
     *   MachineDetectionSpeechEndThreshold?: int,
     *   MachineDetectionSpeechThreshold?: int,
     *   MachineDetectionTimeout?: int,
     *   PreferredCodecs?: string,
     *   Record?: bool,
     *   RecordingChannels?: 'mono'|'dual'|RecordingChannels,
     *   RecordingStatusCallback?: string,
     *   RecordingStatusCallbackEvent?: string,
     *   RecordingStatusCallbackMethod?: 'GET'|'POST'|RecordingStatusCallbackMethod,
     *   RecordingTimeout?: int,
     *   RecordingTrack?: 'inbound'|'outbound'|'both'|RecordingTrack,
     *   SipAuthPassword?: string,
     *   SipAuthUsername?: string,
     *   StatusCallback?: string,
     *   StatusCallbackEvent?: 'initiated'|'ringing'|'answered'|'completed'|StatusCallbackEvent,
     *   StatusCallbackMethod?: 'GET'|'POST'|CallInitiateParams\StatusCallbackMethod,
     *   Trim?: 'trim-silence'|'do-not-trim'|Trim,
     *   Url?: string,
     *   UrlMethod?: 'GET'|'POST'|URLMethod,
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
