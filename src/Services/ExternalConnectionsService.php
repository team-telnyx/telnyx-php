<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\ExternalConnections\ExternalConnection;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\Inbound;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\Outbound;
use Telnyx\ExternalConnections\ExternalConnectionDeleteResponse;
use Telnyx\ExternalConnections\ExternalConnectionGetResponse;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter;
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

/**
 * @phpstan-import-type OutboundShape from \Telnyx\ExternalConnections\ExternalConnectionCreateParams\Outbound
 * @phpstan-import-type InboundShape from \Telnyx\ExternalConnections\ExternalConnectionCreateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Outbound as OutboundShape1
 * @phpstan-import-type InboundShape from \Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Inbound as InboundShape1
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\ExternalConnectionListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param Filter|FilterShape $filter Filter parameter for external connections (deepObject style). Supports filtering by connection_name, external_sip_connection, id, created_at, and phone_number.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ExternalConnection>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLocation(
        string $locationID,
        string $id,
        string $staticEmergencyAddressID,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalConnectionUpdateLocationResponse {
        $params = Util::removeNulls(
            ['id' => $id, 'staticEmergencyAddressID' => $staticEmergencyAddressID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLocation($locationID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
