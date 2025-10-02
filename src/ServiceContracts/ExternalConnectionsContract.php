<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return ExternalConnectionNewResponse<HasRawResponse>
     *
     * @throws APIException
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
     *
     * @param array<string, mixed> $params
     *
     * @return ExternalConnectionNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionNewResponse;

    /**
     * @api
     *
     * @return ExternalConnectionGetResponse<HasRawResponse>
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
     * @return ExternalConnectionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionGetResponse;

    /**
     * @api
     *
     * @param Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Outbound $outbound
     * @param bool $active specifies whether the connection can be used
     * @param Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Inbound $inbound
     * @param list<string> $tags tags associated with the connection
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @return ExternalConnectionUpdateResponse<HasRawResponse>
     *
     * @throws APIException
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
     * @param array<string, mixed> $params
     *
     * @return ExternalConnectionUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Filter parameter for external connections (deepObject style). Supports filtering by connection_name, external_sip_connection, id, created_at, and phone_number.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return ExternalConnectionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ExternalConnectionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionListResponse;

    /**
     * @api
     *
     * @return ExternalConnectionDeleteResponse<HasRawResponse>
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
     * @return ExternalConnectionDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionDeleteResponse;

    /**
     * @api
     *
     * @param string $id
     * @param string $staticEmergencyAddressID A new static emergency address ID to update the location with
     *
     * @return ExternalConnectionUpdateLocationResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateLocation(
        string $locationID,
        $id,
        $staticEmergencyAddressID,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionUpdateLocationResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ExternalConnectionUpdateLocationResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateLocationRaw(
        string $locationID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionUpdateLocationResponse;
}
