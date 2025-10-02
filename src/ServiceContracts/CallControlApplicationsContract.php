<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CallControlApplications\CallControlApplicationCreateParams\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\DtmfType;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\WebhookAPIVersion;
use Telnyx\CallControlApplications\CallControlApplicationDeleteResponse;
use Telnyx\CallControlApplications\CallControlApplicationGetResponse;
use Telnyx\CallControlApplications\CallControlApplicationInbound;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Page;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Sort;
use Telnyx\CallControlApplications\CallControlApplicationListResponse;
use Telnyx\CallControlApplications\CallControlApplicationNewResponse;
use Telnyx\CallControlApplications\CallControlApplicationOutbound;
use Telnyx\CallControlApplications\CallControlApplicationUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CallControlApplicationsContract
{
    /**
     * @api
     *
     * @param string $applicationName a user-assigned name to help manage the application
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param bool $active specifies whether the connection can be used
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride <code>Latency</code> directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $firstCommandTimeout specifies whether calls to phone numbers associated with this connection should hangup after timing out
     * @param int $firstCommandTimeoutSecs specifies how many seconds to wait before timing out a dial command
     * @param CallControlApplicationInbound $inbound
     * @param CallControlApplicationOutbound $outbound
     * @param bool $redactDtmfDebugLogging when enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @return CallControlApplicationNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $applicationName,
        $webhookEventURL,
        $active = omit,
        $anchorsiteOverride = omit,
        $dtmfType = omit,
        $firstCommandTimeout = omit,
        $firstCommandTimeoutSecs = omit,
        $inbound = omit,
        $outbound = omit,
        $redactDtmfDebugLogging = omit,
        $webhookAPIVersion = omit,
        $webhookEventFailoverURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CallControlApplicationNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallControlApplicationNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationNewResponse;

    /**
     * @api
     *
     * @return CallControlApplicationGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationGetResponse;

    /**
     * @api
     *
     * @return CallControlApplicationGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationGetResponse;

    /**
     * @api
     *
     * @param string $applicationName a user-assigned name to help manage the application
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param bool $active specifies whether the connection can be used
     * @param Telnyx\CallControlApplications\CallControlApplicationUpdateParams\AnchorsiteOverride|value-of<Telnyx\CallControlApplications\CallControlApplicationUpdateParams\AnchorsiteOverride> $anchorsiteOverride <code>Latency</code> directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param Telnyx\CallControlApplications\CallControlApplicationUpdateParams\DtmfType|value-of<Telnyx\CallControlApplications\CallControlApplicationUpdateParams\DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $firstCommandTimeout specifies whether calls to phone numbers associated with this connection should hangup after timing out
     * @param int $firstCommandTimeoutSecs specifies how many seconds to wait before timing out a dial command
     * @param CallControlApplicationInbound $inbound
     * @param CallControlApplicationOutbound $outbound
     * @param bool $redactDtmfDebugLogging when enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions
     * @param list<string> $tags tags assigned to the Call Control Application
     * @param Telnyx\CallControlApplications\CallControlApplicationUpdateParams\WebhookAPIVersion|value-of<Telnyx\CallControlApplications\CallControlApplicationUpdateParams\WebhookAPIVersion> $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @return CallControlApplicationUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $applicationName,
        $webhookEventURL,
        $active = omit,
        $anchorsiteOverride = omit,
        $dtmfType = omit,
        $firstCommandTimeout = omit,
        $firstCommandTimeoutSecs = omit,
        $inbound = omit,
        $outbound = omit,
        $redactDtmfDebugLogging = omit,
        $tags = omit,
        $webhookAPIVersion = omit,
        $webhookEventFailoverURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CallControlApplicationUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallControlApplicationUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound.outbound_voice_profile_id], filter[leg_id], filter[application_session_id], filter[connection_id], filter[product], filter[failed], filter[from], filter[to], filter[name], filter[type], filter[occurred_at][eq/gt/gte/lt/lte], filter[status]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>connection_name</code>: sorts the result by the
     *     <code>connection_name</code> field in ascending order.
     *   </li>
     *
     *   <li>
     *     <code>-connection_name</code>: sorts the result by the
     *     <code>connection_name</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
     *
     * @return CallControlApplicationListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): CallControlApplicationListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallControlApplicationListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationListResponse;

    /**
     * @api
     *
     * @return CallControlApplicationDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationDeleteResponse;

    /**
     * @api
     *
     * @return CallControlApplicationDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationDeleteResponse;
}
