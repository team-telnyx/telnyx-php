<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ConnectionJitterBuffer;
use Telnyx\ConnectionNoiseSuppressionDetails;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UacConnectionsRawContract;
use Telnyx\UacConnections\UacConnection;
use Telnyx\UacConnections\UacConnectionCreateParams;
use Telnyx\UacConnections\UacConnectionCreateParams\Inbound;
use Telnyx\UacConnections\UacConnectionCreateParams\NoiseSuppression;
use Telnyx\UacConnections\UacConnectionCreateParams\SipUriCallingPreference;
use Telnyx\UacConnections\UacConnectionCreateParams\WebhookAPIVersion;
use Telnyx\UacConnections\UacConnectionDeleteResponse;
use Telnyx\UacConnections\UacConnectionGetResponse;
use Telnyx\UacConnections\UacConnectionListParams;
use Telnyx\UacConnections\UacConnectionListParams\Filter;
use Telnyx\UacConnections\UacConnectionListParams\Sort;
use Telnyx\UacConnections\UacConnectionNewResponse;
use Telnyx\UacConnections\UacConnectionUpdateParams;
use Telnyx\UacConnections\UacConnectionUpdateResponse;
use Telnyx\UacConnections\UacExternalSettings;
use Telnyx\UacConnections\UacInternalSettings;
use Telnyx\UacConnections\UacOutbound;

/**
 * UAC connection operations.
 *
 * @phpstan-import-type InboundShape from \Telnyx\UacConnections\UacConnectionCreateParams\Inbound
 * @phpstan-import-type InboundShape from \Telnyx\UacConnections\UacConnectionUpdateParams\Inbound as InboundShape1
 * @phpstan-import-type FilterShape from \Telnyx\UacConnections\UacConnectionListParams\Filter
 * @phpstan-import-type UacExternalSettingsShape from \Telnyx\UacConnections\UacExternalSettings
 * @phpstan-import-type UacInternalSettingsShape from \Telnyx\UacConnections\UacInternalSettings
 * @phpstan-import-type ConnectionJitterBufferShape from \Telnyx\ConnectionJitterBuffer
 * @phpstan-import-type ConnectionNoiseSuppressionDetailsShape from \Telnyx\ConnectionNoiseSuppressionDetails
 * @phpstan-import-type UacOutboundShape from \Telnyx\UacConnections\UacOutbound
 * @phpstan-import-type ConnectionRtcpSettingsShape from \Telnyx\CredentialConnections\ConnectionRtcpSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class UacConnectionsRawService implements UacConnectionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a UAC connection. A UAC (User Agent Client) Connection registers Telnyx to your PBX — the opposite of a standard SIP trunk, where the PBX registers to Telnyx. Use UAC when your PBX doesn’t support outbound SIP registration or you need Telnyx to maintain the registration.
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
     *   externalUacSettings?: UacExternalSettings|UacExternalSettingsShape,
     *   inbound?: Inbound|InboundShape,
     *   internalUacSettings?: UacInternalSettings|UacInternalSettingsShape,
     *   iosPushCredentialID?: string|null,
     *   jitterBuffer?: ConnectionJitterBuffer|ConnectionJitterBufferShape,
     *   noiseSuppression?: NoiseSuppression|value-of<NoiseSuppression>,
     *   noiseSuppressionDetails?: ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape,
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: UacOutbound|UacOutboundShape,
     *   password?: string,
     *   rtcpSettings?: ConnectionRtcpSettings|ConnectionRtcpSettingsShape,
     *   sipUriCallingPreference?: SipUriCallingPreference|value-of<SipUriCallingPreference>,
     *   tags?: list<string>,
     *   userName?: string,
     *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|UacConnectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UacConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|UacConnectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UacConnectionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'uac_connections',
            body: (object) $parsed,
            options: $options,
            convert: UacConnectionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing UAC connection.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UacConnectionGetResponse>
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
            path: ['uac_connections/%1$s', $id],
            options: $requestOptions,
            convert: UacConnectionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing UAC connection.
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
     *   externalUacSettings?: UacExternalSettings|UacExternalSettingsShape,
     *   inbound?: UacConnectionUpdateParams\Inbound|InboundShape1,
     *   internalUacSettings?: UacInternalSettings|UacInternalSettingsShape,
     *   iosPushCredentialID?: string|null,
     *   jitterBuffer?: ConnectionJitterBuffer|ConnectionJitterBufferShape,
     *   noiseSuppression?: UacConnectionUpdateParams\NoiseSuppression|value-of<UacConnectionUpdateParams\NoiseSuppression>,
     *   noiseSuppressionDetails?: ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape,
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: UacOutbound|UacOutboundShape,
     *   password?: string,
     *   rtcpSettings?: ConnectionRtcpSettings|ConnectionRtcpSettingsShape,
     *   sipUriCallingPreference?: UacConnectionUpdateParams\SipUriCallingPreference|value-of<UacConnectionUpdateParams\SipUriCallingPreference>,
     *   tags?: list<string>,
     *   userName?: string,
     *   webhookAPIVersion?: UacConnectionUpdateParams\WebhookAPIVersion|value-of<UacConnectionUpdateParams\WebhookAPIVersion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|UacConnectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UacConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|UacConnectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UacConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['uac_connections/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: UacConnectionUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your UAC connections. A UAC (User Agent Client) Connection registers Telnyx to your PBX — the opposite of a standard SIP trunk, where the PBX registers to Telnyx. Use UAC when your PBX doesn’t support outbound SIP registration or you need Telnyx to maintain the registration.
     *
     * @param array{
     *   filter?: Filter|FilterShape,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|UacConnectionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<UacConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|UacConnectionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UacConnectionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'uac_connections',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: UacConnection::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing UAC connection.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UacConnectionDeleteResponse>
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
            path: ['uac_connections/%1$s', $id],
            options: $requestOptions,
            convert: UacConnectionDeleteResponse::class,
        );
    }
}
