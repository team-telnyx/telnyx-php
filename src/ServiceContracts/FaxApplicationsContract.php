<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\DefaultFlatPagination;
use Telnyx\FaxApplications\FaxApplication;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Inbound;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Outbound;
use Telnyx\FaxApplications\FaxApplicationDeleteResponse;
use Telnyx\FaxApplications\FaxApplicationGetResponse;
use Telnyx\FaxApplications\FaxApplicationListParams\Filter;
use Telnyx\FaxApplications\FaxApplicationListParams\Sort;
use Telnyx\FaxApplications\FaxApplicationNewResponse;
use Telnyx\FaxApplications\FaxApplicationUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type InboundShape from \Telnyx\FaxApplications\FaxApplicationCreateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\FaxApplications\FaxApplicationCreateParams\Outbound
 * @phpstan-import-type InboundShape from \Telnyx\FaxApplications\FaxApplicationUpdateParams\Inbound as InboundShape1
 * @phpstan-import-type OutboundShape from \Telnyx\FaxApplications\FaxApplicationUpdateParams\Outbound as OutboundShape1
 * @phpstan-import-type FilterShape from \Telnyx\FaxApplications\FaxApplicationListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface FaxApplicationsContract
{
    /**
     * @api
     *
     * @param string $applicationName a user-assigned name to help manage the application
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param bool $active specifies whether the connection can be used
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param Inbound|InboundShape $inbound
     * @param Outbound|OutboundShape $outbound
     * @param list<string> $tags tags associated with the Fax Application
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $applicationName,
        string $webhookEventURL,
        bool $active = true,
        AnchorsiteOverride|string $anchorsiteOverride = 'Latency',
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null,
        array $tags = [],
        ?string $webhookEventFailoverURL = '',
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): FaxApplicationNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FaxApplicationGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param string $applicationName a user-assigned name to help manage the application
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param bool $active specifies whether the connection can be used
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $faxEmailRecipient Specifies an email address where faxes sent to this application will be forwarded to (as pdf or tiff attachments)
     * @param \Telnyx\FaxApplications\FaxApplicationUpdateParams\Inbound|InboundShape1 $inbound
     * @param \Telnyx\FaxApplications\FaxApplicationUpdateParams\Outbound|OutboundShape1 $outbound
     * @param list<string> $tags tags associated with the Fax Application
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $applicationName,
        string $webhookEventURL,
        bool $active = true,
        AnchorsiteOverride|string $anchorsiteOverride = 'Latency',
        ?string $faxEmailRecipient = null,
        \Telnyx\FaxApplications\FaxApplicationUpdateParams\Inbound|array|null $inbound = null,
        \Telnyx\FaxApplications\FaxApplicationUpdateParams\Outbound|array|null $outbound = null,
        ?array $tags = null,
        ?string $webhookEventFailoverURL = '',
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): FaxApplicationUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound_voice_profile_id]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>application_name</code>: sorts the result by the
     *     <code>application_name</code> field in ascending order.
     *   </li>
     *
     *   <li>
     *     <code>-application_name</code>: sorts the result by the
     *     <code>application_name</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<FaxApplication>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string $sort = 'created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FaxApplicationDeleteResponse;
}
