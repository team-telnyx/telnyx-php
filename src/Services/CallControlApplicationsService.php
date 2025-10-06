<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\CallControlApplications\CallControlApplicationCreateParams;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\DtmfType;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\WebhookAPIVersion;
use Telnyx\CallControlApplications\CallControlApplicationDeleteResponse;
use Telnyx\CallControlApplications\CallControlApplicationGetResponse;
use Telnyx\CallControlApplications\CallControlApplicationInbound;
use Telnyx\CallControlApplications\CallControlApplicationListParams;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Page;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Sort;
use Telnyx\CallControlApplications\CallControlApplicationListResponse;
use Telnyx\CallControlApplications\CallControlApplicationNewResponse;
use Telnyx\CallControlApplications\CallControlApplicationOutbound;
use Telnyx\CallControlApplications\CallControlApplicationUpdateParams;
use Telnyx\CallControlApplications\CallControlApplicationUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallControlApplicationsContract;

use const Telnyx\Core\OMIT as omit;

final class CallControlApplicationsService implements CallControlApplicationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a call control application.
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
    ): CallControlApplicationNewResponse {
        $params = [
            'applicationName' => $applicationName,
            'webhookEventURL' => $webhookEventURL,
            'active' => $active,
            'anchorsiteOverride' => $anchorsiteOverride,
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

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationNewResponse {
        [$parsed, $options] = CallControlApplicationCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'call_control_applications',
            body: (object) $parsed,
            options: $options,
            convert: CallControlApplicationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing call control application.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['call_control_applications/%1$s', $id],
            options: $requestOptions,
            convert: CallControlApplicationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing call control application.
     *
     * @param string $applicationName a user-assigned name to help manage the application
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param bool $active specifies whether the connection can be used
     * @param CallControlApplicationUpdateParams\AnchorsiteOverride|value-of<CallControlApplicationUpdateParams\AnchorsiteOverride> $anchorsiteOverride <code>Latency</code> directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param CallControlApplicationUpdateParams\DtmfType|value-of<CallControlApplicationUpdateParams\DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $firstCommandTimeout specifies whether calls to phone numbers associated with this connection should hangup after timing out
     * @param int $firstCommandTimeoutSecs specifies how many seconds to wait before timing out a dial command
     * @param CallControlApplicationInbound $inbound
     * @param CallControlApplicationOutbound $outbound
     * @param bool $redactDtmfDebugLogging when enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions
     * @param list<string> $tags tags assigned to the Call Control Application
     * @param CallControlApplicationUpdateParams\WebhookAPIVersion|value-of<CallControlApplicationUpdateParams\WebhookAPIVersion> $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
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
    ): CallControlApplicationUpdateResponse {
        $params = [
            'applicationName' => $applicationName,
            'webhookEventURL' => $webhookEventURL,
            'active' => $active,
            'anchorsiteOverride' => $anchorsiteOverride,
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

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationUpdateResponse {
        [$parsed, $options] = CallControlApplicationUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['call_control_applications/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: CallControlApplicationUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Return a list of call control applications.
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
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): CallControlApplicationListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationListResponse {
        [$parsed, $options] = CallControlApplicationListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'call_control_applications',
            query: $parsed,
            options: $options,
            convert: CallControlApplicationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a call control application.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['call_control_applications/%1$s', $id],
            options: $requestOptions,
            convert: CallControlApplicationDeleteResponse::class,
        );
    }
}
