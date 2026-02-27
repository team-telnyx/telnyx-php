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
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\Inbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\Outbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\WebhookAPIVersion;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionNewResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobileVoiceConnectionsRawContract;

/**
 * Mobile voice connection operations.
 *
 * @phpstan-import-type InboundShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\Outbound
 * @phpstan-import-type InboundShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\Inbound as InboundShape1
 * @phpstan-import-type OutboundShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\Outbound as OutboundShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   inbound?: Inbound|InboundShape,
     *   outbound?: Outbound|OutboundShape,
     *   tags?: list<string>,
     *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }|MobileVoiceConnectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MobileVoiceConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MobileVoiceConnectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MobileVoiceConnectionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     *   inbound?: MobileVoiceConnectionUpdateParams\Inbound|InboundShape1,
     *   outbound?: MobileVoiceConnectionUpdateParams\Outbound|OutboundShape1,
     *   tags?: list<string>,
     *   webhookAPIVersion?: MobileVoiceConnectionUpdateParams\WebhookAPIVersion|value-of<MobileVoiceConnectionUpdateParams\WebhookAPIVersion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int,
     * }|MobileVoiceConnectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MobileVoiceConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MobileVoiceConnectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MobileVoiceConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|MobileVoiceConnectionListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MobileVoiceConnectionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
