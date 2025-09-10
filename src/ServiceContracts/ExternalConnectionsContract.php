<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ExternalConnections\ExternalConnectionCreateParams\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\Inbound;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\Outbound;
use Telnyx\ExternalConnections\ExternalConnectionDeleteResponse;
use Telnyx\ExternalConnections\ExternalConnectionGetResponse;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Page;
use Telnyx\ExternalConnections\ExternalConnectionListResponse;
use Telnyx\ExternalConnections\ExternalConnectionNewResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateLocationResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Inbound as Inbound1;
use Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Outbound as Outbound1;
use Telnyx\ExternalConnections\ExternalConnectionUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ExternalConnectionsContract
{
    /**
     * @api
     *
     * @param ExternalSipConnection|value-of<ExternalSipConnection> $externalSipConnection the service that will be consuming this connection
     * @param Outbound $outbound
     * @param bool $active specifies whether the connection can be used
     * @param Inbound $inbound
     * @param list<string> $tags tags associated with the connection
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     */
    public function create(
        $externalSipConnection = 'zoom',
        $outbound,
        $active = omit,
        $inbound = omit,
        $tags = omit,
        $webhookEventFailoverURL = omit,
        $webhookEventURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionGetResponse;

    /**
     * @api
     *
     * @param Outbound1 $outbound
     * @param bool $active specifies whether the connection can be used
     * @param Inbound1 $inbound
     * @param list<string> $tags tags associated with the connection
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     */
    public function update(
        string $id,
        $outbound,
        $active = omit,
        $inbound = omit,
        $tags = omit,
        $webhookEventFailoverURL = omit,
        $webhookEventURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Filter parameter for external connections (deepObject style). Supports filtering by connection_name, external_sip_connection, id, created_at, and phone_number.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionListResponse;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionDeleteResponse;

    /**
     * @api
     *
     * @param string $id
     * @param string $staticEmergencyAddressID A new static emergency address ID to update the location with
     */
    public function updateLocation(
        string $locationID,
        $id,
        $staticEmergencyAddressID,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionUpdateLocationResponse;
}
