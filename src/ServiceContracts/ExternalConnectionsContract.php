<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\ExternalConnection;
use Telnyx\ExternalConnections\ExternalConnectionDeleteResponse;
use Telnyx\ExternalConnections\ExternalConnectionGetResponse;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnectionNewResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateLocationResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateResponse;
use Telnyx\RequestOptions;

interface ExternalConnectionsContract
{
    /**
     * @api
     *
     * @param array{channelLimit?: int, outboundVoiceProfileID?: string} $outbound
     * @param 'zoom'|\Telnyx\ExternalConnections\ExternalConnectionCreateParams\ExternalSipConnection $externalSipConnection the service that will be consuming this connection
     * @param bool $active specifies whether the connection can be used
     * @param array{outboundVoiceProfileID: string, channelLimit?: int} $inbound
     * @param list<string> $tags tags associated with the connection
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function create(
        array $outbound,
        string|\Telnyx\ExternalConnections\ExternalConnectionCreateParams\ExternalSipConnection $externalSipConnection = 'zoom',
        bool $active = true,
        ?array $inbound = null,
        ?array $tags = null,
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array{outboundVoiceProfileID: string, channelLimit?: int} $outbound
     * @param bool $active specifies whether the connection can be used
     * @param array{channelLimit?: int} $inbound
     * @param list<string> $tags tags associated with the connection
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array $outbound,
        bool $active = true,
        ?array $inbound = null,
        ?array $tags = null,
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   id?: string,
     *   connectionName?: array{contains?: string},
     *   createdAt?: string,
     *   externalSipConnection?: 'zoom'|'operator_connect'|ExternalSipConnection,
     *   phoneNumber?: array{contains?: string},
     * } $filter Filter parameter for external connections (deepObject style). Supports filtering by connection_name, external_sip_connection, id, created_at, and phone_number.
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<ExternalConnection>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionDeleteResponse;

    /**
     * @api
     *
     * @param string $locationID Path param: The ID of the location to update
     * @param string $id Path param: The ID of the external connection
     * @param string $staticEmergencyAddressID Body param: A new static emergency address ID to update the location with
     *
     * @throws APIException
     */
    public function updateLocation(
        string $locationID,
        string $id,
        string $staticEmergencyAddressID,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionUpdateLocationResponse;
}
