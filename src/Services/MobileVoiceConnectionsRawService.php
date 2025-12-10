<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobileVoiceConnections\MobileVoiceConnection;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\WebhookAPIVersion;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionNewResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobileVoiceConnectionsRawContract;

final class MobileVoiceConnectionsRawService implements MobileVoiceConnectionsRawContract
{
    // @phpstan-ignore-next-line
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
     *   connectionName?: string,
     *   inbound?: array{channelLimit?: int},
     *   outbound?: array{channelLimit?: int, outboundVoiceProfileID?: string},
     *   tags?: list<string>,
     *   webhookAPIVersion?: '1'|'2'|WebhookAPIVersion,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }|MobileVoiceConnectionCreateParams $params
     *
     * @return BaseResponse<MobileVoiceConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MobileVoiceConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MobileVoiceConnectionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/mobile_voice_connections',
            body: (object) $parsed,
            options: $options,
            convert: MobileVoiceConnectionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a Mobile Voice Connection
     *
     * @param string $id The ID of the mobile voice connection
     *
     * @return BaseResponse<MobileVoiceConnectionGetResponse>
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
            path: ['v2/mobile_voice_connections/%1$s', $id],
            options: $requestOptions,
            convert: MobileVoiceConnectionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a Mobile Voice Connection
     *
     * @param string $id The ID of the mobile voice connection
     * @param array{
     *   active?: bool,
     *   connectionName?: string,
     *   inbound?: array{channelLimit?: int},
     *   outbound?: array{channelLimit?: int, outboundVoiceProfileID?: string},
     *   tags?: list<string>,
     *   webhookAPIVersion?: '1'|'2'|MobileVoiceConnectionUpdateParams\WebhookAPIVersion,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int,
     * }|MobileVoiceConnectionUpdateParams $params
     *
     * @return BaseResponse<MobileVoiceConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MobileVoiceConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MobileVoiceConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['v2/mobile_voice_connections/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: MobileVoiceConnectionUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List Mobile Voice Connections
     *
     * @param array{
     *   filterConnectionNameContains?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: string,
     * }|MobileVoiceConnectionListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<MobileVoiceConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|MobileVoiceConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MobileVoiceConnectionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'v2/mobile_voice_connections',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterConnectionNameContains' => 'filter[connection_name][contains]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: MobileVoiceConnection::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a Mobile Voice Connection
     *
     * @param string $id The ID of the mobile voice connection
     *
     * @return BaseResponse<MobileVoiceConnectionDeleteResponse>
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
            path: ['v2/mobile_voice_connections/%1$s', $id],
            options: $requestOptions,
            convert: MobileVoiceConnectionDeleteResponse::class,
        );
    }
}
