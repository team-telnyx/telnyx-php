<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ConnectionNoiseSuppressionDetails;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\CredentialConnection;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\JitterBuffer;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\NoiseSuppression;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\SipUriCallingPreference;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\WebhookAPIVersion;
use Telnyx\CredentialConnections\CredentialConnectionDeleteResponse;
use Telnyx\CredentialConnections\CredentialConnectionGetResponse;
use Telnyx\CredentialConnections\CredentialConnectionListParams;
use Telnyx\CredentialConnections\CredentialConnectionListParams\Filter;
use Telnyx\CredentialConnections\CredentialConnectionListParams\Page;
use Telnyx\CredentialConnections\CredentialConnectionListParams\Sort;
use Telnyx\CredentialConnections\CredentialConnectionNewResponse;
use Telnyx\CredentialConnections\CredentialConnectionUpdateParams;
use Telnyx\CredentialConnections\CredentialConnectionUpdateResponse;
use Telnyx\CredentialConnections\CredentialInbound;
use Telnyx\CredentialConnections\CredentialOutbound;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CredentialConnectionsRawContract;

/**
 * @phpstan-import-type JitterBufferShape from \Telnyx\CredentialConnections\CredentialConnectionCreateParams\JitterBuffer
 * @phpstan-import-type JitterBufferShape from \Telnyx\CredentialConnections\CredentialConnectionUpdateParams\JitterBuffer as JitterBufferShape1
 * @phpstan-import-type FilterShape from \Telnyx\CredentialConnections\CredentialConnectionListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\CredentialConnections\CredentialConnectionListParams\Page
 * @phpstan-import-type CredentialInboundShape from \Telnyx\CredentialConnections\CredentialInbound
 * @phpstan-import-type ConnectionNoiseSuppressionDetailsShape from \Telnyx\ConnectionNoiseSuppressionDetails
 * @phpstan-import-type CredentialOutboundShape from \Telnyx\CredentialConnections\CredentialOutbound
 * @phpstan-import-type ConnectionRtcpSettingsShape from \Telnyx\CredentialConnections\ConnectionRtcpSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CredentialConnectionsRawService implements CredentialConnectionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a credential connection.
     *
     * @param array{
     *   connectionName: string,
     *   password: string,
     *   userName: string,
     *   active?: bool,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>,
     *   androidPushCredentialID?: string|null,
     *   callCostInWebhooks?: bool,
     *   defaultOnHoldComfortNoiseEnabled?: bool,
     *   dtmfType?: DtmfType|value-of<DtmfType>,
     *   encodeContactHeaderEnabled?: bool,
     *   encryptedMedia?: EncryptedMedia|value-of<EncryptedMedia>|null,
     *   inbound?: CredentialInbound|CredentialInboundShape,
     *   iosPushCredentialID?: string|null,
     *   jitterBuffer?: JitterBuffer|JitterBufferShape,
     *   noiseSuppression?: NoiseSuppression|value-of<NoiseSuppression>,
     *   noiseSuppressionDetails?: ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape,
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: CredentialOutbound|CredentialOutboundShape,
     *   rtcpSettings?: ConnectionRtcpSettings|ConnectionRtcpSettingsShape,
     *   sipUriCallingPreference?: SipUriCallingPreference|value-of<SipUriCallingPreference>,
     *   tags?: list<string>,
     *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|CredentialConnectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CredentialConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CredentialConnectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CredentialConnectionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'credential_connections',
            body: (object) $parsed,
            options: $options,
            convert: CredentialConnectionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing credential connection.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CredentialConnectionGetResponse>
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
            path: ['credential_connections/%1$s', $id],
            options: $requestOptions,
            convert: CredentialConnectionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing credential connection.
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
     *   inbound?: CredentialInbound|CredentialInboundShape,
     *   iosPushCredentialID?: string|null,
     *   jitterBuffer?: CredentialConnectionUpdateParams\JitterBuffer|JitterBufferShape1,
     *   noiseSuppression?: CredentialConnectionUpdateParams\NoiseSuppression|value-of<CredentialConnectionUpdateParams\NoiseSuppression>,
     *   noiseSuppressionDetails?: ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape,
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: CredentialOutbound|CredentialOutboundShape,
     *   password?: string,
     *   rtcpSettings?: ConnectionRtcpSettings|ConnectionRtcpSettingsShape,
     *   sipUriCallingPreference?: CredentialConnectionUpdateParams\SipUriCallingPreference|value-of<CredentialConnectionUpdateParams\SipUriCallingPreference>,
     *   tags?: list<string>,
     *   userName?: string,
     *   webhookAPIVersion?: CredentialConnectionUpdateParams\WebhookAPIVersion|value-of<CredentialConnectionUpdateParams\WebhookAPIVersion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|CredentialConnectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CredentialConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CredentialConnectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CredentialConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['credential_connections/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: CredentialConnectionUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your credential connections.
     *
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: Sort|value-of<Sort>
     * }|CredentialConnectionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<CredentialConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|CredentialConnectionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CredentialConnectionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'credential_connections',
            query: $parsed,
            options: $options,
            convert: CredentialConnection::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing credential connection.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CredentialConnectionDeleteResponse>
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
            path: ['credential_connections/%1$s', $id],
            options: $requestOptions,
            convert: CredentialConnectionDeleteResponse::class,
        );
    }
}
