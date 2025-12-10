<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\ConnectionRtcpSettings\Port;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\SipUriCallingPreference;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\WebhookAPIVersion;
use Telnyx\CredentialConnections\CredentialConnectionDeleteResponse;
use Telnyx\CredentialConnections\CredentialConnectionGetResponse;
use Telnyx\CredentialConnections\CredentialConnectionListParams;
use Telnyx\CredentialConnections\CredentialConnectionListParams\Sort;
use Telnyx\CredentialConnections\CredentialConnectionListResponse;
use Telnyx\CredentialConnections\CredentialConnectionNewResponse;
use Telnyx\CredentialConnections\CredentialConnectionUpdateParams;
use Telnyx\CredentialConnections\CredentialConnectionUpdateResponse;
use Telnyx\CredentialConnections\CredentialInbound;
use Telnyx\CredentialConnections\CredentialInbound\AniNumberFormat;
use Telnyx\CredentialConnections\CredentialInbound\DnisNumberFormat;
use Telnyx\CredentialConnections\CredentialOutbound;
use Telnyx\CredentialConnections\CredentialOutbound\AniOverrideType;
use Telnyx\CredentialConnections\CredentialOutbound\T38ReinviteSource;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CredentialConnectionsRawContract;

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
     *   dtmfType?: 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType,
     *   encodeContactHeaderEnabled?: bool,
     *   encryptedMedia?: 'SRTP'|EncryptedMedia|null,
     *   inbound?: array{
     *     aniNumberFormat?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national'|AniNumberFormat,
     *     channelLimit?: int,
     *     codecs?: list<string>,
     *     dnisNumberFormat?: '+e164'|'e164'|'national'|'sip_username'|DnisNumberFormat,
     *     generateRingbackTone?: bool,
     *     isupHeadersEnabled?: bool,
     *     prackEnabled?: bool,
     *     shakenStirEnabled?: bool,
     *     sipCompactHeadersEnabled?: bool,
     *     timeout1xxSecs?: int,
     *     timeout2xxSecs?: int,
     *   }|CredentialInbound,
     *   iosPushCredentialID?: string|null,
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: array{
     *     aniOverride?: string,
     *     aniOverrideType?: 'always'|'normal'|'emergency'|AniOverrideType,
     *     callParkingEnabled?: bool|null,
     *     channelLimit?: int,
     *     generateRingbackTone?: bool,
     *     instantRingbackEnabled?: bool,
     *     localization?: string,
     *     outboundVoiceProfileID?: string,
     *     t38ReinviteSource?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     *   }|CredentialOutbound,
     *   rtcpSettings?: array{
     *     captureEnabled?: bool,
     *     port?: 'rtcp-mux'|'rtp+1'|Port,
     *     reportFrequencySecs?: int,
     *   }|ConnectionRtcpSettings,
     *   sipUriCallingPreference?: 'disabled'|'unrestricted'|'internal'|SipUriCallingPreference,
     *   tags?: list<string>,
     *   webhookAPIVersion?: '1'|'2'|'texml'|WebhookAPIVersion,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|CredentialConnectionCreateParams $params
     *
     * @return BaseResponse<CredentialConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CredentialConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<CredentialConnectionGetResponse>
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
     *   dtmfType?: 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType,
     *   encodeContactHeaderEnabled?: bool,
     *   encryptedMedia?: 'SRTP'|EncryptedMedia|null,
     *   inbound?: array{
     *     aniNumberFormat?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national'|AniNumberFormat,
     *     channelLimit?: int,
     *     codecs?: list<string>,
     *     dnisNumberFormat?: '+e164'|'e164'|'national'|'sip_username'|DnisNumberFormat,
     *     generateRingbackTone?: bool,
     *     isupHeadersEnabled?: bool,
     *     prackEnabled?: bool,
     *     shakenStirEnabled?: bool,
     *     sipCompactHeadersEnabled?: bool,
     *     timeout1xxSecs?: int,
     *     timeout2xxSecs?: int,
     *   }|CredentialInbound,
     *   iosPushCredentialID?: string|null,
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: array{
     *     aniOverride?: string,
     *     aniOverrideType?: 'always'|'normal'|'emergency'|AniOverrideType,
     *     callParkingEnabled?: bool|null,
     *     channelLimit?: int,
     *     generateRingbackTone?: bool,
     *     instantRingbackEnabled?: bool,
     *     localization?: string,
     *     outboundVoiceProfileID?: string,
     *     t38ReinviteSource?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     *   }|CredentialOutbound,
     *   password?: string,
     *   rtcpSettings?: array{
     *     captureEnabled?: bool,
     *     port?: 'rtcp-mux'|'rtp+1'|Port,
     *     reportFrequencySecs?: int,
     *   }|ConnectionRtcpSettings,
     *   sipUriCallingPreference?: 'disabled'|'unrestricted'|'internal'|CredentialConnectionUpdateParams\SipUriCallingPreference,
     *   tags?: list<string>,
     *   userName?: string,
     *   webhookAPIVersion?: '1'|'2'|CredentialConnectionUpdateParams\WebhookAPIVersion,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|CredentialConnectionUpdateParams $params
     *
     * @return BaseResponse<CredentialConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CredentialConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   filter?: array{
     *     connectionName?: array{contains?: string},
     *     fqdn?: string,
     *     outboundVoiceProfileID?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'connection_name'|'active'|Sort,
     * }|CredentialConnectionListParams $params
     *
     * @return BaseResponse<CredentialConnectionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CredentialConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
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
            convert: CredentialConnectionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing credential connection.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<CredentialConnectionDeleteResponse>
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
            path: ['credential_connections/%1$s', $id],
            options: $requestOptions,
            convert: CredentialConnectionDeleteResponse::class,
        );
    }
}
