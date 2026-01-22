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
use Telnyx\FqdnConnections\FqdnConnection;
use Telnyx\FqdnConnections\FqdnConnectionCreateParams;
use Telnyx\FqdnConnections\FqdnConnectionCreateParams\NoiseSuppression;
use Telnyx\FqdnConnections\FqdnConnectionCreateParams\NoiseSuppressionDetails;
use Telnyx\FqdnConnections\FqdnConnectionDeleteResponse;
use Telnyx\FqdnConnections\FqdnConnectionGetResponse;
use Telnyx\FqdnConnections\FqdnConnectionListParams;
use Telnyx\FqdnConnections\FqdnConnectionListParams\Filter;
use Telnyx\FqdnConnections\FqdnConnectionListParams\Page;
use Telnyx\FqdnConnections\FqdnConnectionListParams\Sort;
use Telnyx\FqdnConnections\FqdnConnectionNewResponse;
use Telnyx\FqdnConnections\FqdnConnectionUpdateParams;
use Telnyx\FqdnConnections\FqdnConnectionUpdateResponse;
use Telnyx\FqdnConnections\InboundFqdn;
use Telnyx\FqdnConnections\OutboundFqdn;
use Telnyx\FqdnConnections\TransportProtocol;
use Telnyx\FqdnConnections\WebhookAPIVersion;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FqdnConnectionsRawContract;

/**
 * @phpstan-import-type NoiseSuppressionDetailsShape from \Telnyx\FqdnConnections\FqdnConnectionCreateParams\NoiseSuppressionDetails
 * @phpstan-import-type NoiseSuppressionDetailsShape from \Telnyx\FqdnConnections\FqdnConnectionUpdateParams\NoiseSuppressionDetails as NoiseSuppressionDetailsShape1
 * @phpstan-import-type FilterShape from \Telnyx\FqdnConnections\FqdnConnectionListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\FqdnConnections\FqdnConnectionListParams\Page
 * @phpstan-import-type InboundFqdnShape from \Telnyx\FqdnConnections\InboundFqdn
 * @phpstan-import-type OutboundFqdnShape from \Telnyx\FqdnConnections\OutboundFqdn
 * @phpstan-import-type ConnectionRtcpSettingsShape from \Telnyx\CredentialConnections\ConnectionRtcpSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class FqdnConnectionsRawService implements FqdnConnectionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a FQDN connection.
     *
     * @param array{
     *   connectionName: string,
     *   active?: bool,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>,
     *   androidPushCredentialID?: string|null,
     *   callCostInWebhooks?: bool,
     *   defaultOnHoldComfortNoiseEnabled?: bool,
     *   dtmfType?: DtmfType|value-of<DtmfType>,
     *   encodeContactHeaderEnabled?: bool,
     *   encryptedMedia?: EncryptedMedia|value-of<EncryptedMedia>|null,
     *   inbound?: InboundFqdn|InboundFqdnShape,
     *   iosPushCredentialID?: string|null,
     *   microsoftTeamsSbc?: bool,
     *   noiseSuppression?: NoiseSuppression|value-of<NoiseSuppression>,
     *   noiseSuppressionDetails?: NoiseSuppressionDetails|NoiseSuppressionDetailsShape,
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: OutboundFqdn|OutboundFqdnShape,
     *   rtcpSettings?: ConnectionRtcpSettings|ConnectionRtcpSettingsShape,
     *   tags?: list<string>,
     *   transportProtocol?: TransportProtocol|value-of<TransportProtocol>,
     *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|FqdnConnectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FqdnConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FqdnConnectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FqdnConnectionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'fqdn_connections',
            body: (object) $parsed,
            options: $options,
            convert: FqdnConnectionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing FQDN connection.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FqdnConnectionGetResponse>
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
            path: ['fqdn_connections/%1$s', $id],
            options: $requestOptions,
            convert: FqdnConnectionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing FQDN connection.
     *
     * @param string $id identifies the resource
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
     *   inbound?: InboundFqdn|InboundFqdnShape,
     *   iosPushCredentialID?: string|null,
     *   noiseSuppression?: FqdnConnectionUpdateParams\NoiseSuppression|value-of<FqdnConnectionUpdateParams\NoiseSuppression>,
     *   noiseSuppressionDetails?: FqdnConnectionUpdateParams\NoiseSuppressionDetails|NoiseSuppressionDetailsShape1,
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: OutboundFqdn|OutboundFqdnShape,
     *   rtcpSettings?: ConnectionRtcpSettings|ConnectionRtcpSettingsShape,
     *   tags?: list<string>,
     *   transportProtocol?: TransportProtocol|value-of<TransportProtocol>,
     *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|FqdnConnectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FqdnConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|FqdnConnectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FqdnConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['fqdn_connections/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: FqdnConnectionUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your FQDN connections.
     *
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: Sort|value-of<Sort>
     * }|FqdnConnectionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<FqdnConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|FqdnConnectionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FqdnConnectionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'fqdn_connections',
            query: $parsed,
            options: $options,
            convert: FqdnConnection::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes an FQDN connection.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FqdnConnectionDeleteResponse>
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
            path: ['fqdn_connections/%1$s', $id],
            options: $requestOptions,
            convert: FqdnConnectionDeleteResponse::class,
        );
    }
}
