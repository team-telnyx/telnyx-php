<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\ConnectionRtcpSettings\Port;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\IPConnections\InboundIP;
use Telnyx\IPConnections\IPConnectionCreateParams;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\AniNumberFormat;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\DefaultRoutingMethod;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\DnisNumberFormat;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\SipRegion;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\SipSubdomainReceiveSettings;
use Telnyx\IPConnections\IPConnectionCreateParams\TransportProtocol;
use Telnyx\IPConnections\IPConnectionCreateParams\WebhookAPIVersion;
use Telnyx\IPConnections\IPConnectionDeleteResponse;
use Telnyx\IPConnections\IPConnectionGetResponse;
use Telnyx\IPConnections\IPConnectionListParams;
use Telnyx\IPConnections\IPConnectionListParams\Sort;
use Telnyx\IPConnections\IPConnectionListResponse;
use Telnyx\IPConnections\IPConnectionNewResponse;
use Telnyx\IPConnections\IPConnectionUpdateParams;
use Telnyx\IPConnections\IPConnectionUpdateResponse;
use Telnyx\IPConnections\OutboundIP;
use Telnyx\IPConnections\OutboundIP\AniOverrideType;
use Telnyx\IPConnections\OutboundIP\IPAuthenticationMethod;
use Telnyx\IPConnections\OutboundIP\T38ReinviteSource;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\IPConnectionsRawContract;

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
     *   dtmfType?: 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType,
     *   encodeContactHeaderEnabled?: bool,
     *   encryptedMedia?: 'SRTP'|EncryptedMedia|null,
     *   inbound?: array{
     *     aniNumberFormat?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national'|AniNumberFormat,
     *     channelLimit?: int,
     *     codecs?: list<string>,
     *     defaultRoutingMethod?: 'sequential'|'round-robin'|DefaultRoutingMethod,
     *     dnisNumberFormat?: '+e164'|'e164'|'national'|'sip_username'|DnisNumberFormat,
     *     generateRingbackTone?: bool,
     *     isupHeadersEnabled?: bool,
     *     prackEnabled?: bool,
     *     shakenStirEnabled?: bool,
     *     sipCompactHeadersEnabled?: bool,
     *     sipRegion?: 'US'|'Europe'|'Australia'|SipRegion,
     *     sipSubdomain?: string,
     *     sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     *     timeout1xxSecs?: int,
     *     timeout2xxSecs?: int,
     *   },
     *   iosPushCredentialID?: string|null,
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: array{
     *     aniOverride?: string,
     *     aniOverrideType?: 'always'|'normal'|'emergency'|AniOverrideType,
     *     callParkingEnabled?: bool|null,
     *     channelLimit?: int,
     *     generateRingbackTone?: bool,
     *     instantRingbackEnabled?: bool,
     *     ipAuthenticationMethod?: 'tech-prefixp-charge-info'|'token'|IPAuthenticationMethod,
     *     ipAuthenticationToken?: string,
     *     localization?: string,
     *     outboundVoiceProfileID?: string,
     *     t38ReinviteSource?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     *     techPrefix?: string,
     *   }|OutboundIP,
     *   rtcpSettings?: array{
     *     captureEnabled?: bool,
     *     port?: 'rtcp-mux'|'rtp+1'|Port,
     *     reportFrequencySecs?: int,
     *   }|ConnectionRtcpSettings,
     *   tags?: list<string>,
     *   transportProtocol?: 'UDP'|'TCP'|'TLS'|TransportProtocol,
     *   webhookAPIVersion?: '1'|'2'|WebhookAPIVersion,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|IPConnectionCreateParams $params
     *
     * @return BaseResponse<IPConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|IPConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<IPConnectionGetResponse>
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
     *   dtmfType?: 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType,
     *   encodeContactHeaderEnabled?: bool,
     *   encryptedMedia?: 'SRTP'|EncryptedMedia|null,
     *   inbound?: array{
     *     aniNumberFormat?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national'|InboundIP\AniNumberFormat,
     *     channelLimit?: int,
     *     codecs?: list<string>,
     *     defaultPrimaryIPID?: string,
     *     defaultRoutingMethod?: 'sequential'|'round-robin'|InboundIP\DefaultRoutingMethod,
     *     defaultSecondaryIPID?: string,
     *     defaultTertiaryIPID?: string,
     *     dnisNumberFormat?: '+e164'|'e164'|'national'|'sip_username'|InboundIP\DnisNumberFormat,
     *     generateRingbackTone?: bool,
     *     isupHeadersEnabled?: bool,
     *     prackEnabled?: bool,
     *     shakenStirEnabled?: bool,
     *     sipCompactHeadersEnabled?: bool,
     *     sipRegion?: 'US'|'Europe'|'Australia'|InboundIP\SipRegion,
     *     sipSubdomain?: string,
     *     sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|InboundIP\SipSubdomainReceiveSettings,
     *     timeout1xxSecs?: int,
     *     timeout2xxSecs?: int,
     *   }|InboundIP,
     *   iosPushCredentialID?: string|null,
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: array{
     *     aniOverride?: string,
     *     aniOverrideType?: 'always'|'normal'|'emergency'|AniOverrideType,
     *     callParkingEnabled?: bool|null,
     *     channelLimit?: int,
     *     generateRingbackTone?: bool,
     *     instantRingbackEnabled?: bool,
     *     ipAuthenticationMethod?: 'tech-prefixp-charge-info'|'token'|IPAuthenticationMethod,
     *     ipAuthenticationToken?: string,
     *     localization?: string,
     *     outboundVoiceProfileID?: string,
     *     t38ReinviteSource?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     *     techPrefix?: string,
     *   }|OutboundIP,
     *   rtcpSettings?: array{
     *     captureEnabled?: bool,
     *     port?: 'rtcp-mux'|'rtp+1'|Port,
     *     reportFrequencySecs?: int,
     *   }|ConnectionRtcpSettings,
     *   tags?: list<string>,
     *   transportProtocol?: 'UDP'|'TCP'|'TLS'|IPConnectionUpdateParams\TransportProtocol,
     *   webhookAPIVersion?: '1'|'2'|IPConnectionUpdateParams\WebhookAPIVersion,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|IPConnectionUpdateParams $params
     *
     * @return BaseResponse<IPConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|IPConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   filter?: array{
     *     connectionName?: array{contains?: string},
     *     fqdn?: string,
     *     outboundVoiceProfileID?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'connection_name'|'active'|Sort,
     * }|IPConnectionListParams $params
     *
     * @return BaseResponse<IPConnectionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|IPConnectionListParams $params,
        ?RequestOptions $requestOptions = null
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
            convert: IPConnectionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing IP connection.
     *
     * @param string $id identifies the type of resource
     *
     * @return BaseResponse<IPConnectionDeleteResponse>
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
            path: ['ip_connections/%1$s', $id],
            options: $requestOptions,
            convert: IPConnectionDeleteResponse::class,
        );
    }
}
