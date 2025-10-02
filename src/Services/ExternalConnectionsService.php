<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\Inbound;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\Outbound;
use Telnyx\ExternalConnections\ExternalConnectionDeleteResponse;
use Telnyx\ExternalConnections\ExternalConnectionGetResponse;
use Telnyx\ExternalConnections\ExternalConnectionListParams;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Page;
use Telnyx\ExternalConnections\ExternalConnectionListResponse;
use Telnyx\ExternalConnections\ExternalConnectionNewResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateLocationParams;
use Telnyx\ExternalConnections\ExternalConnectionUpdateLocationResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateParams;
use Telnyx\ExternalConnections\ExternalConnectionUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnectionsContract;
use Telnyx\Services\ExternalConnections\CivicAddressesService;
use Telnyx\Services\ExternalConnections\LogMessagesService;
use Telnyx\Services\ExternalConnections\PhoneNumbersService;
use Telnyx\Services\ExternalConnections\ReleasesService;
use Telnyx\Services\ExternalConnections\UploadsService;

use const Telnyx\Core\OMIT as omit;

final class ExternalConnectionsService implements ExternalConnectionsContract
{
    /**
     * @@api
     */
    public LogMessagesService $logMessages;

    /**
     * @@api
     */
    public CivicAddressesService $civicAddresses;

    /**
     * @@api
     */
    public PhoneNumbersService $phoneNumbers;

    /**
     * @@api
     */
    public ReleasesService $releases;

    /**
     * @@api
     */
    public UploadsService $uploads;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->logMessages = new LogMessagesService($client);
        $this->civicAddresses = new CivicAddressesService($client);
        $this->phoneNumbers = new PhoneNumbersService($client);
        $this->releases = new ReleasesService($client);
        $this->uploads = new UploadsService($client);
    }

    /**
     * @api
     *
     * Creates a new External Connection based on the parameters sent in the request. The external_sip_connection and outbound voice profile id are required. Once created, you can assign phone numbers to your application using the `/phone_numbers` endpoint.
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
    ): ExternalConnectionNewResponse {
        $params = [
            'externalSipConnection' => $externalSipConnection,
            'outbound' => $outbound,
            'active' => $active,
            'inbound' => $inbound,
            'tags' => $tags,
            'webhookEventFailoverURL' => $webhookEventFailoverURL,
            'webhookEventURL' => $webhookEventURL,
            'webhookTimeoutSecs' => $webhookTimeoutSecs,
        ];

        return $this->createRaw($params, $requestOptions);
    }

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
    ): ExternalConnectionNewResponse {
        [$parsed, $options] = ExternalConnectionCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'external_connections',
            body: (object) $parsed,
            options: $options,
            convert: ExternalConnectionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Return the details of an existing External Connection inside the 'data' attribute of the response.
     *
     * @return ExternalConnectionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

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
    ): ExternalConnectionGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s', $id],
            options: $requestOptions,
            convert: ExternalConnectionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing External Connection based on the parameters of the request.
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
    ): ExternalConnectionUpdateResponse {
        $params = [
            'outbound' => $outbound,
            'active' => $active,
            'inbound' => $inbound,
            'tags' => $tags,
            'webhookEventFailoverURL' => $webhookEventFailoverURL,
            'webhookEventURL' => $webhookEventURL,
            'webhookTimeoutSecs' => $webhookTimeoutSecs,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

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
    ): ExternalConnectionUpdateResponse {
        [$parsed, $options] = ExternalConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['external_connections/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: ExternalConnectionUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * This endpoint returns a list of your External Connections inside the 'data' attribute of the response. External Connections are used by Telnyx customers to seamless configure SIP trunking integrations with Telnyx Partners, through External Voice Integrations in Mission Control Portal.
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
    ): ExternalConnectionListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): ExternalConnectionListResponse {
        [$parsed, $options] = ExternalConnectionListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'external_connections',
            query: $parsed,
            options: $options,
            convert: ExternalConnectionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes an External Connection. Deletion may be prevented if the application is in use by phone numbers, is active, or if it is an Operator Connect connection. To remove an Operator Connect integration please contact Telnyx support.
     *
     * @return ExternalConnectionDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

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
    ): ExternalConnectionDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['external_connections/%1$s', $id],
            options: $requestOptions,
            convert: ExternalConnectionDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a location's static emergency address
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
    ): ExternalConnectionUpdateLocationResponse {
        $params = [
            'id' => $id, 'staticEmergencyAddressID' => $staticEmergencyAddressID,
        ];

        return $this->updateLocationRaw($locationID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionUpdateLocationResponse {
        [$parsed, $options] = ExternalConnectionUpdateLocationParams::parseRequest(
            $params,
            $requestOptions
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['external_connections/%1$s/locations/%2$s', $id, $locationID],
            body: (object) array_diff_key($parsed, array_flip(['id'])),
            options: $options,
            convert: ExternalConnectionUpdateLocationResponse::class,
        );
    }
}
