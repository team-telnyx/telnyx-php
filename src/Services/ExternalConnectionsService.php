<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\ExternalConnection;
use Telnyx\ExternalConnections\ExternalConnectionDeleteResponse;
use Telnyx\ExternalConnections\ExternalConnectionGetResponse;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnectionNewResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateLocationResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnectionsContract;
use Telnyx\Services\ExternalConnections\CivicAddressesService;
use Telnyx\Services\ExternalConnections\LogMessagesService;
use Telnyx\Services\ExternalConnections\PhoneNumbersService;
use Telnyx\Services\ExternalConnections\ReleasesService;
use Telnyx\Services\ExternalConnections\UploadsService;

final class ExternalConnectionsService implements ExternalConnectionsContract
{
    /**
     * @api
     */
    public ExternalConnectionsRawService $raw;

    /**
     * @api
     */
    public LogMessagesService $logMessages;

    /**
     * @api
     */
    public CivicAddressesService $civicAddresses;

    /**
     * @api
     */
    public PhoneNumbersService $phoneNumbers;

    /**
     * @api
     */
    public ReleasesService $releases;

    /**
     * @api
     */
    public UploadsService $uploads;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExternalConnectionsRawService($client);
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
    ): ExternalConnectionNewResponse {
        $params = Util::removeNulls(
            [
                'externalSipConnection' => $externalSipConnection,
                'outbound' => $outbound,
                'active' => $active,
                'inbound' => $inbound,
                'tags' => $tags,
                'webhookEventFailoverURL' => $webhookEventFailoverURL,
                'webhookEventURL' => $webhookEventURL,
                'webhookTimeoutSecs' => $webhookTimeoutSecs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return the details of an existing External Connection inside the 'data' attribute of the response.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates settings of an existing External Connection based on the parameters of the request.
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
    ): ExternalConnectionUpdateResponse {
        $params = Util::removeNulls(
            [
                'outbound' => $outbound,
                'active' => $active,
                'inbound' => $inbound,
                'tags' => $tags,
                'webhookEventFailoverURL' => $webhookEventFailoverURL,
                'webhookEventURL' => $webhookEventURL,
                'webhookTimeoutSecs' => $webhookTimeoutSecs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint returns a list of your External Connections inside the 'data' attribute of the response. External Connections are used by Telnyx customers to seamless configure SIP trunking integrations with Telnyx Partners, through External Voice Integrations in Mission Control Portal.
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
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes an External Connection. Deletion may be prevented if the application is in use by phone numbers, is active, or if it is an Operator Connect connection. To remove an Operator Connect integration please contact Telnyx support.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a location's static emergency address
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
    ): ExternalConnectionUpdateLocationResponse {
        $params = Util::removeNulls(
            ['id' => $id, 'staticEmergencyAddressID' => $staticEmergencyAddressID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLocation($locationID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
