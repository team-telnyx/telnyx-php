<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionNewResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobileVoiceConnectionsContract;

final class MobileVoiceConnectionsService implements MobileVoiceConnectionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a Mobile Voice Connection
     *
     * @param array{
     *   active?: bool,
     *   connection_name?: string,
     *   inbound?: array{channel_limit?: int},
     *   outbound?: array{channel_limit?: int, outbound_voice_profile_id?: string},
     *   tags?: list<string>,
     *   webhook_api_version?: '1'|'2',
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * }|MobileVoiceConnectionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MobileVoiceConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MobileVoiceConnectionNewResponse {
        [$parsed, $options] = MobileVoiceConnectionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MobileVoiceConnectionNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'v2/mobile_voice_connections',
            body: (object) $parsed,
            options: $options,
            convert: MobileVoiceConnectionNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a Mobile Voice Connection
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MobileVoiceConnectionGetResponse {
        /** @var BaseResponse<MobileVoiceConnectionGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['v2/mobile_voice_connections/%1$s', $id],
            options: $requestOptions,
            convert: MobileVoiceConnectionGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a Mobile Voice Connection
     *
     * @param array{
     *   active?: bool,
     *   connection_name?: string,
     *   inbound?: array{channel_limit?: int},
     *   outbound?: array{channel_limit?: int, outbound_voice_profile_id?: string},
     *   tags?: list<string>,
     *   webhook_api_version?: '1'|'2',
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int,
     * }|MobileVoiceConnectionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MobileVoiceConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MobileVoiceConnectionUpdateResponse {
        [$parsed, $options] = MobileVoiceConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MobileVoiceConnectionUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['v2/mobile_voice_connections/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: MobileVoiceConnectionUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List Mobile Voice Connections
     *
     * @param array{
     *   filter_connection_name__contains_?: string,
     *   page_number_?: int,
     *   page_size_?: int,
     *   sort?: string,
     * }|MobileVoiceConnectionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MobileVoiceConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): MobileVoiceConnectionListResponse {
        [$parsed, $options] = MobileVoiceConnectionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MobileVoiceConnectionListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'v2/mobile_voice_connections',
            query: $parsed,
            options: $options,
            convert: MobileVoiceConnectionListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Mobile Voice Connection
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MobileVoiceConnectionDeleteResponse {
        /** @var BaseResponse<MobileVoiceConnectionDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['v2/mobile_voice_connections/%1$s', $id],
            options: $requestOptions,
            convert: MobileVoiceConnectionDeleteResponse::class,
        );

        return $response->parse();
    }
}
