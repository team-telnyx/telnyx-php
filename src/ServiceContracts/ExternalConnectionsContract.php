<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\ExternalConnection;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\Inbound;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\Outbound;
use Telnyx\ExternalConnections\ExternalConnectionDeleteResponse;
use Telnyx\ExternalConnections\ExternalConnectionGetResponse;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Page;
use Telnyx\ExternalConnections\ExternalConnectionNewResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateLocationResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type OutboundShape from \Telnyx\ExternalConnections\ExternalConnectionCreateParams\Outbound
 * @phpstan-import-type InboundShape from \Telnyx\ExternalConnections\ExternalConnectionCreateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Outbound as OutboundShape1
 * @phpstan-import-type InboundShape from \Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Inbound as InboundShape1
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\ExternalConnectionListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\ExternalConnections\ExternalConnectionListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ExternalConnectionsContract
{
    /**
     * @api
     *
     * @param Outbound|OutboundShape $outbound
     * @param ExternalSipConnection|value-of<ExternalSipConnection> $externalSipConnection the service that will be consuming this connection
     * @param bool $active specifies whether the connection can be used
     * @param Inbound|InboundShape $inbound
     * @param list<string> $tags tags associated with the connection
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Outbound|array $outbound,
        ExternalSipConnection|string $externalSipConnection = 'zoom',
        bool $active = true,
        Inbound|array|null $inbound = null,
        ?array $tags = null,
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalConnectionNewResponse;

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
    ): ExternalConnectionGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param \Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Outbound|OutboundShape1 $outbound
     * @param bool $active specifies whether the connection can be used
     * @param \Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Inbound|InboundShape1 $inbound
     * @param list<string> $tags tags associated with the connection
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        \Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Outbound|array $outbound,
        bool $active = true,
        \Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Inbound|array|null $inbound = null,
        ?array $tags = null,
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalConnectionUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Filter parameter for external connections (deepObject style). Supports filtering by connection_name, external_sip_connection, id, created_at, and phone_number.
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<ExternalConnection>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

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
    ): ExternalConnectionDeleteResponse;

    /**
     * @api
     *
     * @param string $locationID Path param: The ID of the location to update
     * @param string $id Path param: The ID of the external connection
     * @param string $staticEmergencyAddressID Body param: A new static emergency address ID to update the location with
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLocation(
        string $locationID,
        string $id,
        string $staticEmergencyAddressID,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalConnectionUpdateLocationResponse;
}
