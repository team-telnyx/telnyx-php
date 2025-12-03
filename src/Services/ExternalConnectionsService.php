<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams;
use Telnyx\ExternalConnections\ExternalConnectionDeleteResponse;
use Telnyx\ExternalConnections\ExternalConnectionGetResponse;
use Telnyx\ExternalConnections\ExternalConnectionListParams;
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

final class ExternalConnectionsService implements ExternalConnectionsContract
{
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
     * @param array{
     *   external_sip_connection: 'zoom',
     *   outbound: array{channel_limit?: int, outbound_voice_profile_id?: string},
     *   active?: bool,
     *   inbound?: array{outbound_voice_profile_id: string, channel_limit?: int},
     *   tags?: list<string>,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string,
     *   webhook_timeout_secs?: int|null,
     * }|ExternalConnectionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ExternalConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionNewResponse {
        [$parsed, $options] = ExternalConnectionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionGetResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   outbound: array{outbound_voice_profile_id: string, channel_limit?: int},
     *   active?: bool,
     *   inbound?: array{channel_limit?: int},
     *   tags?: list<string>,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string,
     *   webhook_timeout_secs?: int|null,
     * }|ExternalConnectionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ExternalConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionUpdateResponse {
        [$parsed, $options] = ExternalConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: array{
     *     id?: string,
     *     connection_name?: array{contains?: string},
     *     created_at?: string,
     *     external_sip_connection?: 'zoom'|'operator_connect',
     *     phone_number?: array{contains?: string},
     *   },
     *   page?: array{number?: int, size?: int},
     * }|ExternalConnectionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ExternalConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionListResponse {
        [$parsed, $options] = ExternalConnectionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ExternalConnectionDeleteResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   id: string, static_emergency_address_id: string
     * }|ExternalConnectionUpdateLocationParams $params
     *
     * @throws APIException
     */
    public function updateLocation(
        string $locationID,
        array|ExternalConnectionUpdateLocationParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalConnectionUpdateLocationResponse {
        [$parsed, $options] = ExternalConnectionUpdateLocationParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['external_connections/%1$s/locations/%2$s', $id, $locationID],
            body: (object) array_diff_key($parsed, ['id']),
            options: $options,
            convert: ExternalConnectionUpdateLocationResponse::class,
        );
    }
}
