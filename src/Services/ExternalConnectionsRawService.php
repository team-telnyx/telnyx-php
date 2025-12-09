<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\ExternalConnection;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnectionDeleteResponse;
use Telnyx\ExternalConnections\ExternalConnectionGetResponse;
use Telnyx\ExternalConnections\ExternalConnectionListParams;
use Telnyx\ExternalConnections\ExternalConnectionNewResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateLocationParams;
use Telnyx\ExternalConnections\ExternalConnectionUpdateLocationResponse;
use Telnyx\ExternalConnections\ExternalConnectionUpdateParams;
use Telnyx\ExternalConnections\ExternalConnectionUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnectionsRawContract;

final class ExternalConnectionsRawService implements ExternalConnectionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new External Connection based on the parameters sent in the request. The external_sip_connection and outbound voice profile id are required. Once created, you can assign phone numbers to your application using the `/phone_numbers` endpoint.
     *
     * @param array{
     *   externalSipConnection: 'zoom'|ExternalSipConnection,
     *   outbound: array{channelLimit?: int, outboundVoiceProfileID?: string},
     *   active?: bool,
     *   inbound?: array{outboundVoiceProfileID: string, channelLimit?: int},
     *   tags?: list<string>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|ExternalConnectionCreateParams $params
     *
     * @return BaseResponse<ExternalConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ExternalConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
     * @param string $id identifies the resource
     *
     * @return BaseResponse<ExternalConnectionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
     * @param string $id identifies the resource
     * @param array{
     *   outbound: array{outboundVoiceProfileID: string, channelLimit?: int},
     *   active?: bool,
     *   inbound?: array{channelLimit?: int},
     *   tags?: list<string>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|ExternalConnectionUpdateParams $params
     *
     * @return BaseResponse<ExternalConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ExternalConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
     *     connectionName?: array{contains?: string},
     *     createdAt?: string,
     *     externalSipConnection?: 'zoom'|'operator_connect'|ExternalConnectionListParams\Filter\ExternalSipConnection,
     *     phoneNumber?: array{contains?: string},
     *   },
     *   page?: array{number?: int, size?: int},
     * }|ExternalConnectionListParams $params
     *
     * @return BaseResponse<DefaultPagination<ExternalConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|ExternalConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
            convert: ExternalConnection::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes an External Connection. Deletion may be prevented if the application is in use by phone numbers, is active, or if it is an Operator Connect connection. To remove an Operator Connect integration please contact Telnyx support.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<ExternalConnectionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
     * @param string $locationID Path param: The ID of the location to update
     * @param array{
     *   id: string, staticEmergencyAddressID: string
     * }|ExternalConnectionUpdateLocationParams $params
     *
     * @return BaseResponse<ExternalConnectionUpdateLocationResponse>
     *
     * @throws APIException
     */
    public function updateLocation(
        string $locationID,
        array|ExternalConnectionUpdateLocationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
