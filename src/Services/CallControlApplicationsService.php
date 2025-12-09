<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\CallControlApplications\CallControlApplicationCreateParams\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\DtmfType;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\WebhookAPIVersion;
use Telnyx\CallControlApplications\CallControlApplicationDeleteResponse;
use Telnyx\CallControlApplications\CallControlApplicationGetResponse;
use Telnyx\CallControlApplications\CallControlApplicationInbound;
use Telnyx\CallControlApplications\CallControlApplicationInbound\SipSubdomainReceiveSettings;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\Product;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\Status;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\Type;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Sort;
use Telnyx\CallControlApplications\CallControlApplicationListResponse;
use Telnyx\CallControlApplications\CallControlApplicationNewResponse;
use Telnyx\CallControlApplications\CallControlApplicationOutbound;
use Telnyx\CallControlApplications\CallControlApplicationUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallControlApplicationsContract;

final class CallControlApplicationsService implements CallControlApplicationsContract
{
    /**
     * @api
     */
    public CallControlApplicationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallControlApplicationsRawService($client);
    }

    /**
     * @api
     *
     * Create a call control application.
     *
     * @param string $applicationName a user-assigned name to help manage the application
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param bool $active specifies whether the connection can be used
     * @param 'Latency'|'Chicago, IL'|'Ashburn, VA'|'San Jose, CA'|'London, UK'|'Chennai, IN'|'Amsterdam, Netherlands'|'Toronto, Canada'|'Sydney, Australia'|AnchorsiteOverride $anchorsiteOverride <code>Latency</code> directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this Call Control Application
     * @param 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $firstCommandTimeout specifies whether calls to phone numbers associated with this connection should hangup after timing out
     * @param int $firstCommandTimeoutSecs specifies how many seconds to wait before timing out a dial command
     * @param array{
     *   channelLimit?: int,
     *   shakenStirEnabled?: bool,
     *   sipSubdomain?: string,
     *   sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     * }|CallControlApplicationInbound $inbound
     * @param array{
     *   channelLimit?: int, outboundVoiceProfileID?: string
     * }|CallControlApplicationOutbound $outbound
     * @param bool $redactDtmfDebugLogging when enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions
     * @param '1'|'2'|WebhookAPIVersion $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function create(
        string $applicationName,
        string $webhookEventURL,
        bool $active = true,
        string|AnchorsiteOverride $anchorsiteOverride = 'Latency',
        bool $callCostInWebhooks = false,
        string|DtmfType $dtmfType = 'RFC 2833',
        bool $firstCommandTimeout = false,
        int $firstCommandTimeoutSecs = 30,
        array|CallControlApplicationInbound|null $inbound = null,
        array|CallControlApplicationOutbound|null $outbound = null,
        bool $redactDtmfDebugLogging = false,
        string|WebhookAPIVersion $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): CallControlApplicationNewResponse {
        $params = [
            'applicationName' => $applicationName,
            'webhookEventURL' => $webhookEventURL,
            'active' => $active,
            'anchorsiteOverride' => $anchorsiteOverride,
            'callCostInWebhooks' => $callCostInWebhooks,
            'dtmfType' => $dtmfType,
            'firstCommandTimeout' => $firstCommandTimeout,
            'firstCommandTimeoutSecs' => $firstCommandTimeoutSecs,
            'inbound' => $inbound,
            'outbound' => $outbound,
            'redactDtmfDebugLogging' => $redactDtmfDebugLogging,
            'webhookAPIVersion' => $webhookAPIVersion,
            'webhookEventFailoverURL' => $webhookEventFailoverURL,
            'webhookTimeoutSecs' => $webhookTimeoutSecs,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the details of an existing call control application.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates settings of an existing call control application.
     *
     * @param string $id identifies the resource
     * @param string $applicationName a user-assigned name to help manage the application
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param bool $active specifies whether the connection can be used
     * @param 'Latency'|'Chicago, IL'|'Ashburn, VA'|'San Jose, CA'|'London, UK'|'Chennai, IN'|'Amsterdam, Netherlands'|'Toronto, Canada'|'Sydney, Australia'|\Telnyx\CallControlApplications\CallControlApplicationUpdateParams\AnchorsiteOverride $anchorsiteOverride <code>Latency</code> directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this Call Control Application
     * @param 'RFC 2833'|'Inband'|'SIP INFO'|\Telnyx\CallControlApplications\CallControlApplicationUpdateParams\DtmfType $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $firstCommandTimeout specifies whether calls to phone numbers associated with this connection should hangup after timing out
     * @param int $firstCommandTimeoutSecs specifies how many seconds to wait before timing out a dial command
     * @param array{
     *   channelLimit?: int,
     *   shakenStirEnabled?: bool,
     *   sipSubdomain?: string,
     *   sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     * }|CallControlApplicationInbound $inbound
     * @param array{
     *   channelLimit?: int, outboundVoiceProfileID?: string
     * }|CallControlApplicationOutbound $outbound
     * @param bool $redactDtmfDebugLogging when enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions
     * @param list<string> $tags tags assigned to the Call Control Application
     * @param '1'|'2'|\Telnyx\CallControlApplications\CallControlApplicationUpdateParams\WebhookAPIVersion $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $applicationName,
        string $webhookEventURL,
        bool $active = true,
        string|\Telnyx\CallControlApplications\CallControlApplicationUpdateParams\AnchorsiteOverride $anchorsiteOverride = 'Latency',
        bool $callCostInWebhooks = false,
        string|\Telnyx\CallControlApplications\CallControlApplicationUpdateParams\DtmfType $dtmfType = 'RFC 2833',
        bool $firstCommandTimeout = false,
        int $firstCommandTimeoutSecs = 30,
        array|CallControlApplicationInbound|null $inbound = null,
        array|CallControlApplicationOutbound|null $outbound = null,
        bool $redactDtmfDebugLogging = false,
        ?array $tags = null,
        string|\Telnyx\CallControlApplications\CallControlApplicationUpdateParams\WebhookAPIVersion $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): CallControlApplicationUpdateResponse {
        $params = [
            'applicationName' => $applicationName,
            'webhookEventURL' => $webhookEventURL,
            'active' => $active,
            'anchorsiteOverride' => $anchorsiteOverride,
            'callCostInWebhooks' => $callCostInWebhooks,
            'dtmfType' => $dtmfType,
            'firstCommandTimeout' => $firstCommandTimeout,
            'firstCommandTimeoutSecs' => $firstCommandTimeoutSecs,
            'inbound' => $inbound,
            'outbound' => $outbound,
            'redactDtmfDebugLogging' => $redactDtmfDebugLogging,
            'tags' => $tags,
            'webhookAPIVersion' => $webhookAPIVersion,
            'webhookEventFailoverURL' => $webhookEventFailoverURL,
            'webhookTimeoutSecs' => $webhookTimeoutSecs,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return a list of call control applications.
     *
     * @param array{
     *   applicationName?: array{contains?: string},
     *   applicationSessionID?: string,
     *   connectionID?: string,
     *   failed?: bool,
     *   from?: string,
     *   legID?: string,
     *   name?: string,
     *   occurredAt?: array{
     *     eq?: string, gt?: string, gte?: string, lt?: string, lte?: string
     *   },
     *   outboundOutboundVoiceProfileID?: string,
     *   product?: 'call_control'|'fax'|'texml'|Product,
     *   status?: 'init'|'in_progress'|'completed'|Status,
     *   to?: string,
     *   type?: 'command'|'webhook'|Type,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound.outbound_voice_profile_id], filter[leg_id], filter[application_session_id], filter[connection_id], filter[product], filter[failed], filter[from], filter[to], filter[name], filter[type], filter[occurred_at][eq/gt/gte/lt/lte], filter[status]
     * @param array{
     *   after?: string, before?: string, limit?: int, number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     * @param 'created_at'|'connection_name'|'active'|Sort $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
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
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        string|Sort $sort = 'created_at',
        ?RequestOptions $requestOptions = null,
    ): CallControlApplicationListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a call control application.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
