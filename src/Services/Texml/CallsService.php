<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\CallsContract;
use Telnyx\Texml\Calls\CallInitiateParams;
use Telnyx\Texml\Calls\CallInitiateResponse;
use Telnyx\Texml\Calls\CallUpdateParams;
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
     *   FallbackMethod?: 'GET'|'POST',
     *   FallbackUrl?: string,
     *   Method?: 'GET'|'POST',
     *   Status?: string,
     *   StatusCallback?: string,
     *   StatusCallbackMethod?: 'GET'|'POST',
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
     * @param array{
     *   From: string,
     *   To: string,
     *   AsyncAmd?: bool,
     *   AsyncAmdStatusCallback?: string,
     *   AsyncAmdStatusCallbackMethod?: 'GET'|'POST',
     *   CallerId?: string,
     *   CancelPlaybackOnDetectMessageEnd?: bool,
     *   CancelPlaybackOnMachineDetection?: bool,
     *   DetectionMode?: 'Premium'|'Regular',
     *   FallbackUrl?: string,
     *   MachineDetection?: 'Enable'|'Disable'|'DetectMessageEnd',
     *   MachineDetectionSilenceTimeout?: int,
     *   MachineDetectionSpeechEndThreshold?: int,
     *   MachineDetectionSpeechThreshold?: int,
     *   MachineDetectionTimeout?: int,
     *   PreferredCodecs?: string,
     *   Record?: bool,
     *   RecordingChannels?: 'mono'|'dual',
     *   RecordingStatusCallback?: string,
     *   RecordingStatusCallbackEvent?: string,
     *   RecordingStatusCallbackMethod?: 'GET'|'POST',
     *   RecordingTimeout?: int,
     *   RecordingTrack?: 'inbound'|'outbound'|'both',
     *   SipAuthPassword?: string,
     *   SipAuthUsername?: string,
     *   StatusCallback?: string,
     *   StatusCallbackEvent?: 'initiated'|'ringing'|'answered'|'completed',
     *   StatusCallbackMethod?: 'GET'|'POST',
     *   Trim?: 'trim-silence'|'do-not-trim',
     *   Url?: string,
     *   UrlMethod?: 'GET'|'POST',
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
