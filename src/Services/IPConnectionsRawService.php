<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\DefaultPagination;
use Telnyx\IPConnections\InboundIP;
use Telnyx\IPConnections\IPConnection;
use Telnyx\IPConnections\IPConnectionCreateParams;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound;
use Telnyx\IPConnections\IPConnectionCreateParams\NoiseSuppression;
use Telnyx\IPConnections\IPConnectionCreateParams\NoiseSuppressionDetails;
use Telnyx\IPConnections\IPConnectionCreateParams\TransportProtocol;
use Telnyx\IPConnections\IPConnectionCreateParams\WebhookAPIVersion;
use Telnyx\IPConnections\IPConnectionDeleteResponse;
use Telnyx\IPConnections\IPConnectionGetResponse;
use Telnyx\IPConnections\IPConnectionListParams;
use Telnyx\IPConnections\IPConnectionListParams\Filter;
use Telnyx\IPConnections\IPConnectionListParams\Page;
use Telnyx\IPConnections\IPConnectionListParams\Sort;
use Telnyx\IPConnections\IPConnectionNewResponse;
use Telnyx\IPConnections\IPConnectionUpdateParams;
use Telnyx\IPConnections\IPConnectionUpdateResponse;
use Telnyx\IPConnections\OutboundIP;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\IPConnectionsRawContract;

/**
 * @phpstan-import-type InboundShape from \Telnyx\IPConnections\IPConnectionCreateParams\Inbound
 * @phpstan-import-type NoiseSuppressionDetailsShape from \Telnyx\IPConnections\IPConnectionCreateParams\NoiseSuppressionDetails
 * @phpstan-import-type InboundIPShape from \Telnyx\IPConnections\InboundIP
 * @phpstan-import-type NoiseSuppressionDetailsShape from \Telnyx\IPConnections\IPConnectionUpdateParams\NoiseSuppressionDetails as NoiseSuppressionDetailsShape1
 * @phpstan-import-type FilterShape from \Telnyx\IPConnections\IPConnectionListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\IPConnections\IPConnectionListParams\Page
 * @phpstan-import-type OutboundIPShape from \Telnyx\IPConnections\OutboundIP
 * @phpstan-import-type ConnectionRtcpSettingsShape from \Telnyx\CredentialConnections\ConnectionRtcpSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class IPConnectionsRawService implements IPConnectionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an IP connection.
     *
     * @param array{
     *   active?: bool,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>,
     *   androidPushCredentialID?: string|null,
     *   callCostInWebhooks?: bool,
     *   connectionName?: string,
     *   defaultOnHoldComfortNoiseEnabled?: bool,
     *   dtmfType?: DtmfType|value-of<DtmfType>,
     *   encodeContactHeaderEnabled?: bool,
     *   encryptedMedia?: EncryptedMedia|value-of<EncryptedMedia>|null,
     *   inbound?: Inbound|InboundShape,
     *   iosPushCredentialID?: string|null,
     *   noiseSuppression?: NoiseSuppression|value-of<NoiseSuppression>,
     *   noiseSuppressionDetails?: NoiseSuppressionDetails|NoiseSuppressionDetailsShape,
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: OutboundIP|OutboundIPShape,
     *   rtcpSettings?: ConnectionRtcpSettings|ConnectionRtcpSettingsShape,
     *   tags?: list<string>,
     *   transportProtocol?: TransportProtocol|value-of<TransportProtocol>,
     *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|IPConnectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|IPConnectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IPConnectionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ip_connections',
            body: (object) $parsed,
            options: $options,
            convert: IPConnectionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing ip connection.
     *
     * @param string $id IP Connection ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPConnectionGetResponse>
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
            path: ['ip_connections/%1$s', $id],
            options: $requestOptions,
            convert: IPConnectionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing IP connection.
     *
     * @param string $id identifies the type of resource
     * @param array{
     *   active?: bool,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>,
     *   androidPushCredentialID?: string|null,
     *   callCostInWebhooks?: bool,
     *   connectionName?: string,
     *   defaultOnHoldComfortNoiseEnabled?: bool,
     *   dtmfType?: DtmfType|value-of<DtmfType>,
     *   encodeContactHeaderEnabled?: bool,
     *   encryptedMedia?: EncryptedMedia|value-of<EncryptedMedia>|null,
     *   inbound?: InboundIP|InboundIPShape,
     *   iosPushCredentialID?: string|null,
     *   noiseSuppression?: IPConnectionUpdateParams\NoiseSuppression|value-of<IPConnectionUpdateParams\NoiseSuppression>,
     *   noiseSuppressionDetails?: IPConnectionUpdateParams\NoiseSuppressionDetails|NoiseSuppressionDetailsShape1,
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: OutboundIP|OutboundIPShape,
     *   rtcpSettings?: ConnectionRtcpSettings|ConnectionRtcpSettingsShape,
     *   tags?: list<string>,
     *   transportProtocol?: IPConnectionUpdateParams\TransportProtocol|value-of<IPConnectionUpdateParams\TransportProtocol>,
     *   webhookAPIVersion?: IPConnectionUpdateParams\WebhookAPIVersion|value-of<IPConnectionUpdateParams\WebhookAPIVersion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|IPConnectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|IPConnectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IPConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['ip_connections/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: IPConnectionUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your IP connections.
     *
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: Sort|value-of<Sort>
     * }|IPConnectionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<IPConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|IPConnectionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IPConnectionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ip_connections',
            query: $parsed,
            options: $options,
            convert: IPConnection::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing IP connection.
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPConnectionDeleteResponse>
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
            path: ['ip_connections/%1$s', $id],
            options: $requestOptions,
            convert: IPConnectionDeleteResponse::class,
        );
    }
}
