<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\CallsRawContract;
use Telnyx\Texml\Accounts\Calls\CallCallsParams;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\AsyncAmdStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\DetectionMode;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\MachineDetection;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingChannels;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingTrack;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\SipRegion;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\StatusCallbackEvent;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\SupervisingRole;
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
     * Returns an individual call identified by its CallSid. This endpoint is eventually consistent.
     *
     * @param string $callSid the CallSid that identifies the call to update
     * @param array{accountSid: string}|CallRetrieveParams $params
     *
     * @return BaseResponse<CallGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $callSid,
        array|CallRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Calls/%2$s', $accountSid, $callSid],
            options: $options,
            convert: CallGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update TeXML call. Please note that the keys present in the payload MUST BE formatted in CamelCase as specified in the example.
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param array{
     *   accountSid: string,
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
     * @return BaseResponse<CallUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $callSid,
        array|CallUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['texml/Accounts/%1$s/Calls/%2$s', $accountSid, $callSid],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, array_flip(['accountSid'])),
            options: $options,
            convert: CallUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Initiate an outbound TeXML call. Telnyx will request TeXML from the XML Request URL configured for the connection in the Mission Control Portal.
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param array{
     *   applicationSid: string,
     *   from: string,
     *   to: string,
     *   asyncAmd?: bool,
     *   asyncAmdStatusCallback?: string,
     *   asyncAmdStatusCallbackMethod?: 'GET'|'POST'|AsyncAmdStatusCallbackMethod,
     *   callerID?: string,
     *   cancelPlaybackOnDetectMessageEnd?: bool,
     *   cancelPlaybackOnMachineDetection?: bool,
     *   customHeaders?: list<array{name: string, value: string}>,
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
     *   sendRecordingURL?: bool,
     *   sipAuthPassword?: string,
     *   sipAuthUsername?: string,
     *   sipRegion?: 'US'|'Europe'|'Canada'|'Australia'|'Middle East'|SipRegion,
     *   statusCallback?: string,
     *   statusCallbackEvent?: 'initiated'|'ringing'|'answered'|'completed'|StatusCallbackEvent,
     *   statusCallbackMethod?: 'GET'|'POST'|CallCallsParams\StatusCallbackMethod,
     *   superviseCallSid?: string,
     *   supervisingRole?: 'barge'|'whisper'|'monitor'|SupervisingRole,
     *   trim?: 'trim-silence'|'do-not-trim'|Trim,
     *   url?: string,
     *   urlMethod?: 'GET'|'POST'|URLMethod,
     * }|CallCallsParams $params
     *
     * @return BaseResponse<CallCallsResponse>
     *
     * @throws APIException
     */
    public function calls(
        string $accountSid,
        array|CallCallsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallCallsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['texml/Accounts/%1$s/Calls', $accountSid],
            body: (object) $parsed,
            options: $options,
            convert: CallCallsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns multiple call resouces for an account. This endpoint is eventually consistent.
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param array{
     *   endTime?: string,
     *   endTimeGt?: string,
     *   endTimeLt?: string,
     *   from?: string,
     *   page?: int,
     *   pageSize?: int,
     *   pageToken?: string,
     *   startTime?: string,
     *   startTimeGt?: string,
     *   startTimeLt?: string,
     *   status?: 'canceled'|'completed'|'failed'|'busy'|'no-answer'|Status,
     *   to?: string,
     * }|CallRetrieveCallsParams $params
     *
     * @return BaseResponse<CallGetCallsResponse>
     *
     * @throws APIException
     */
    public function retrieveCalls(
        string $accountSid,
        array|CallRetrieveCallsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallRetrieveCallsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['texml/Accounts/%1$s/Calls', $accountSid],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'endTime' => 'EndTime',
                    'endTimeGt' => 'EndTime_gt',
                    'endTimeLt' => 'EndTime_lt',
                    'from' => 'From',
                    'page' => 'Page',
                    'pageSize' => 'PageSize',
                    'pageToken' => 'PageToken',
                    'startTime' => 'StartTime',
                    'startTimeGt' => 'StartTime_gt',
                    'startTimeLt' => 'StartTime_lt',
                    'status' => 'Status',
                    'to' => 'To',
                ],
            ),
            options: $options,
            convert: CallGetCallsResponse::class,
        );
    }

    /**
     * @api
     *
     * Starts siprec session with specified parameters for call idientified by call_sid.
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param array{
     *   accountSid: string,
     *   connectorName?: string,
     *   includeMetadataCustomHeaders?: bool,
     *   name?: string,
     *   secure?: bool,
     *   sessionTimeoutSecs?: int,
     *   sipTransport?: 'udp'|'tcp'|'tls'|SipTransport,
     *   statusCallback?: string,
     *   statusCallbackMethod?: 'GET'|'POST'|CallSiprecJsonParams\StatusCallbackMethod,
     *   track?: 'both_tracks'|'inbound_track'|'outbound_track'|Track,
     * }|CallSiprecJsonParams $params
     *
     * @return BaseResponse<CallSiprecJsonResponse>
     *
     * @throws APIException
     */
    public function siprecJson(
        string $callSid,
        array|CallSiprecJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallSiprecJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Siprec.json', $accountSid, $callSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, array_flip(['accountSid'])),
            options: $options,
            convert: CallSiprecJsonResponse::class,
        );
    }

    /**
     * @api
     *
     * Starts streaming media from a call to a specific WebSocket address.
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param array{
     *   accountSid: string,
     *   bidirectionalCodec?: 'PCMU'|'PCMA'|'G722'|BidirectionalCodec,
     *   bidirectionalMode?: 'mp3'|'rtp'|BidirectionalMode,
     *   name?: string,
     *   statusCallback?: string,
     *   statusCallbackMethod?: 'GET'|'POST'|CallStreamsJsonParams\StatusCallbackMethod,
     *   track?: 'inbound_track'|'outbound_track'|'both_tracks'|CallStreamsJsonParams\Track,
     *   url?: string,
     * }|CallStreamsJsonParams $params
     *
     * @return BaseResponse<CallStreamsJsonResponse>
     *
     * @throws APIException
     */
    public function streamsJson(
        string $callSid,
        array|CallStreamsJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallStreamsJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Streams.json', $accountSid, $callSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, array_flip(['accountSid'])),
            options: $options,
            convert: CallStreamsJsonResponse::class,
        );
    }
}
