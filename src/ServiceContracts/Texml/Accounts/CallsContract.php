<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\ApplicationDefault;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\WithTeXml;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\WithURL;
use Telnyx\Texml\Accounts\Calls\CallCallsResponse;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse;
use Telnyx\Texml\Accounts\Calls\CallGetResponse;
use Telnyx\Texml\Accounts\Calls\CallRetrieveCallsParams\Status;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\SipTransport;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\Track;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonResponse;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalCodec;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalMode;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonResponse;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\FallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\Method;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\StatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallUpdateResponse;

/**
 * @phpstan-import-type ParamsShape from \Telnyx\Texml\Accounts\Calls\CallCallsParams\Params
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallsContract
{
    /**
     * @api
     *
     * @param string $callSid the CallSid that identifies the call to update
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $callSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): CallGetResponse;

    /**
     * @api
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param FallbackMethod|value-of<FallbackMethod> $fallbackMethod body param: HTTP request type used for `FallbackUrl`
     * @param string $fallbackURL body param: A failover URL for which Telnyx will retrieve the TeXML call instructions if the Url is not responding
     * @param Method|value-of<Method> $method body param: HTTP request type used for `Url`
     * @param string $status Body param: The value to set the call status to. Setting the status to completed ends the call.
     * @param string $statusCallback body param: URL destination for Telnyx to send status callback events to for the call
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod body param: HTTP request type used for `StatusCallback`
     * @param string $texml body param: TeXML to replace the current one with
     * @param string $url body param: The URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $callSid,
        string $accountSid,
        FallbackMethod|string|null $fallbackMethod = null,
        ?string $fallbackURL = null,
        Method|string|null $method = null,
        ?string $status = null,
        ?string $statusCallback = null,
        StatusCallbackMethod|string|null $statusCallbackMethod = null,
        ?string $texml = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): CallUpdateResponse;

    /**
     * @api
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param ParamsShape $params
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function calls(
        string $accountSid,
        WithURL|array|WithTeXml|ApplicationDefault $params,
        RequestOptions|array|null $requestOptions = null,
    ): CallCallsResponse;

    /**
     * @api
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param string $endTime Filters calls by their end date. Expected format is YYYY-MM-DD
     * @param string $endTimeGt Filters calls by their end date (after). Expected format is YYYY-MM-DD
     * @param string $endTimeLt Filters calls by their end date (before). Expected format is YYYY-MM-DD
     * @param string $from filters calls by the from number
     * @param int $page the number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken
     * @param int $pageSize The number of records to be displayed on a page
     * @param string $pageToken used to request the next page of results
     * @param string $startTime Filters calls by their start date. Expected format is YYYY-MM-DD.
     * @param string $startTimeGt Filters calls by their start date (after). Expected format is YYYY-MM-DD
     * @param string $startTimeLt Filters calls by their start date (before). Expected format is YYYY-MM-DD
     * @param Status|value-of<Status> $status filters calls by status
     * @param string $to filters calls by the to number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveCalls(
        string $accountSid,
        ?string $endTime = null,
        ?string $endTimeGt = null,
        ?string $endTimeLt = null,
        ?string $from = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?string $startTime = null,
        ?string $startTimeGt = null,
        ?string $startTimeLt = null,
        Status|string|null $status = null,
        ?string $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): CallGetCallsResponse;

    /**
     * @api
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param string $connectorName body param: The name of the connector to use for the SIPREC session
     * @param bool $includeMetadataCustomHeaders Body param: When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     * @param string $name Body param: Name of the SIPREC session. May be used to stop the SIPREC session from TeXML instruction.
     * @param bool $secure Body param: Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     * @param int $sessionTimeoutSecs Body param: Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     * @param SipTransport|value-of<SipTransport> $sipTransport body param: Specifies SIP transport protocol
     * @param string $statusCallback body param: URL destination for Telnyx to send status callback events to for the siprec session
     * @param \Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\StatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\StatusCallbackMethod> $statusCallbackMethod body param: HTTP request type used for `StatusCallback`
     * @param Track|value-of<Track> $track Body param: The track to be used for siprec session. Can be `both_tracks`, `inbound_track` or `outbound_track`. Defaults to `both_tracks`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function siprecJson(
        string $callSid,
        string $accountSid,
        ?string $connectorName = null,
        ?bool $includeMetadataCustomHeaders = null,
        ?string $name = null,
        ?bool $secure = null,
        int $sessionTimeoutSecs = 1800,
        SipTransport|string $sipTransport = 'udp',
        ?string $statusCallback = null,
        \Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\StatusCallbackMethod|string|null $statusCallbackMethod = null,
        Track|string|null $track = null,
        RequestOptions|array|null $requestOptions = null,
    ): CallSiprecJsonResponse;

    /**
     * @api
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param BidirectionalCodec|value-of<BidirectionalCodec> $bidirectionalCodec Body param: Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     * @param BidirectionalMode|value-of<BidirectionalMode> $bidirectionalMode body param: Configures method of bidirectional streaming (mp3, rtp)
     * @param string $name body param: The user specified name of Stream
     * @param string $statusCallback body param: Url where status callbacks will be sent
     * @param \Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\StatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\StatusCallbackMethod> $statusCallbackMethod body param: HTTP method used to send status callbacks
     * @param \Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\Track|value-of<\Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\Track> $track Body param: Tracks to be included in the stream
     * @param string $url body param: The destination WebSocket address where the stream is going to be delivered
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function streamsJson(
        string $callSid,
        string $accountSid,
        BidirectionalCodec|string $bidirectionalCodec = 'PCMU',
        BidirectionalMode|string $bidirectionalMode = 'mp3',
        ?string $name = null,
        ?string $statusCallback = null,
        \Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\StatusCallbackMethod|string $statusCallbackMethod = 'POST',
        \Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\Track|string $track = 'inbound_track',
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): CallStreamsJsonResponse;
}
