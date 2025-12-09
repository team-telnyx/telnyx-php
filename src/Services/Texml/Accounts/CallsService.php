<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\CallsContract;
use Telnyx\Services\Texml\Accounts\Calls\RecordingsJsonService;
use Telnyx\Services\Texml\Accounts\Calls\RecordingsService;
use Telnyx\Services\Texml\Accounts\Calls\SiprecService;
use Telnyx\Services\Texml\Accounts\Calls\StreamsService;
use Telnyx\Texml\Accounts\Calls\CallCallsParams;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\AsyncAmdStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\DetectionMode;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\MachineDetection;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingChannels;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingTrack;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\SipRegion;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\StatusCallbackEvent;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Trim;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\URLMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsResponse;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse;
use Telnyx\Texml\Accounts\Calls\CallGetResponse;
use Telnyx\Texml\Accounts\Calls\CallRetrieveCallsParams;
use Telnyx\Texml\Accounts\Calls\CallRetrieveCallsParams\Status;
use Telnyx\Texml\Accounts\Calls\CallRetrieveParams;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\SipTransport;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\Track;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonResponse;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalCodec;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalMode;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonResponse;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\FallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\Method;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\StatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallUpdateResponse;

final class CallsService implements CallsContract
{
    /**
     * @api
     */
    public RecordingsJsonService $recordingsJson;

    /**
     * @api
     */
    public RecordingsService $recordings;

    /**
     * @api
     */
    public SiprecService $siprec;

    /**
     * @api
     */
    public StreamsService $streams;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->recordingsJson = new RecordingsJsonService($client);
        $this->recordings = new RecordingsService($client);
        $this->siprec = new SiprecService($client);
        $this->streams = new StreamsService($client);
    }

    /**
     * @api
     *
     * Returns an individual call identified by its CallSid. This endpoint is eventually consistent.
     *
     * @param array{account_sid: string}|CallRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $callSid,
        array|CallRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallGetResponse {
        [$parsed, $options] = CallRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        /** @var BaseResponse<CallGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Calls/%2$s', $accountSid, $callSid],
            options: $options,
            convert: CallGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update TeXML call. Please note that the keys present in the payload MUST BE formatted in CamelCase as specified in the example.
     *
     * @param array{
     *   account_sid: string,
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
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        /** @var BaseResponse<CallUpdateResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['texml/Accounts/%1$s/Calls/%2$s', $accountSid, $callSid],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, ['account_sid']),
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
     *   ApplicationSid: string,
     *   From: string,
     *   To: string,
     *   AsyncAmd?: bool,
     *   AsyncAmdStatusCallback?: string,
     *   AsyncAmdStatusCallbackMethod?: 'GET'|'POST'|AsyncAmdStatusCallbackMethod,
     *   CallerId?: string,
     *   CancelPlaybackOnDetectMessageEnd?: bool,
     *   CancelPlaybackOnMachineDetection?: bool,
     *   CustomHeaders?: list<array{name: string, value: string}>,
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
     *   SendRecordingUrl?: bool,
     *   SipAuthPassword?: string,
     *   SipAuthUsername?: string,
     *   SipRegion?: 'US'|'Europe'|'Canada'|'Australia'|'Middle East'|SipRegion,
     *   StatusCallback?: string,
     *   StatusCallbackEvent?: 'initiated'|'ringing'|'answered'|'completed'|StatusCallbackEvent,
     *   StatusCallbackMethod?: 'GET'|'POST'|CallCallsParams\StatusCallbackMethod,
     *   Trim?: 'trim-silence'|'do-not-trim'|Trim,
     *   Url?: string,
     *   UrlMethod?: 'GET'|'POST'|URLMethod,
     * }|CallCallsParams $params
     *
     * @throws APIException
     */
    public function calls(
        string $accountSid,
        array|CallCallsParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallCallsResponse {
        [$parsed, $options] = CallCallsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CallCallsResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['texml/Accounts/%1$s/Calls', $accountSid],
            body: (object) $parsed,
            options: $options,
            convert: CallCallsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns multiple call resouces for an account. This endpoint is eventually consistent.
     *
     * @param array{
     *   EndTime?: string,
     *   EndTime_gt?: string,
     *   EndTime_lt?: string,
     *   From?: string,
     *   Page?: int,
     *   PageSize?: int,
     *   PageToken?: string,
     *   StartTime?: string,
     *   StartTime_gt?: string,
     *   StartTime_lt?: string,
     *   Status?: 'canceled'|'completed'|'failed'|'busy'|'no-answer'|Status,
     *   To?: string,
     * }|CallRetrieveCallsParams $params
     *
     * @throws APIException
     */
    public function retrieveCalls(
        string $accountSid,
        array|CallRetrieveCallsParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallGetCallsResponse {
        [$parsed, $options] = CallRetrieveCallsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CallGetCallsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Calls', $accountSid],
            query: $parsed,
            options: $options,
            convert: CallGetCallsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Starts siprec session with specified parameters for call idientified by call_sid.
     *
     * @param array{
     *   account_sid: string,
     *   ConnectorName?: string,
     *   IncludeMetadataCustomHeaders?: bool,
     *   Name?: string,
     *   Secure?: bool,
     *   SessionTimeoutSecs?: int,
     *   SipTransport?: 'udp'|'tcp'|'tls'|SipTransport,
     *   StatusCallback?: string,
     *   StatusCallbackMethod?: 'GET'|'POST'|CallSiprecJsonParams\StatusCallbackMethod,
     *   Track?: 'both_tracks'|'inbound_track'|'outbound_track'|Track,
     * }|CallSiprecJsonParams $params
     *
     * @throws APIException
     */
    public function siprecJson(
        string $callSid,
        array|CallSiprecJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallSiprecJsonResponse {
        [$parsed, $options] = CallSiprecJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        /** @var BaseResponse<CallSiprecJsonResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Siprec.json', $accountSid, $callSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, ['account_sid']),
            options: $options,
            convert: CallSiprecJsonResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Starts streaming media from a call to a specific WebSocket address.
     *
     * @param array{
     *   account_sid: string,
     *   BidirectionalCodec?: 'PCMU'|'PCMA'|'G722'|BidirectionalCodec,
     *   BidirectionalMode?: 'mp3'|'rtp'|BidirectionalMode,
     *   Name?: string,
     *   StatusCallback?: string,
     *   StatusCallbackMethod?: 'GET'|'POST'|CallStreamsJsonParams\StatusCallbackMethod,
     *   Track?: 'inbound_track'|'outbound_track'|'both_tracks'|CallStreamsJsonParams\Track,
     *   Url?: string,
     * }|CallStreamsJsonParams $params
     *
     * @throws APIException
     */
    public function streamsJson(
        string $callSid,
        array|CallStreamsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallStreamsJsonResponse {
        [$parsed, $options] = CallStreamsJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        /** @var BaseResponse<CallStreamsJsonResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Streams.json', $accountSid, $callSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, ['account_sid']),
            options: $options,
            convert: CallStreamsJsonResponse::class,
        );

        return $response->parse();
    }
}
