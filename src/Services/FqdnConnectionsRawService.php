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
use Telnyx\DefaultPagination;
use Telnyx\FqdnConnections\FqdnConnection;
use Telnyx\FqdnConnections\FqdnConnectionCreateParams;
use Telnyx\FqdnConnections\FqdnConnectionCreateParams\NoiseSuppression;
use Telnyx\FqdnConnections\FqdnConnectionCreateParams\NoiseSuppressionDetails\Engine;
use Telnyx\FqdnConnections\FqdnConnectionDeleteResponse;
use Telnyx\FqdnConnections\FqdnConnectionGetResponse;
use Telnyx\FqdnConnections\FqdnConnectionListParams;
use Telnyx\FqdnConnections\FqdnConnectionListParams\Sort;
use Telnyx\FqdnConnections\FqdnConnectionNewResponse;
use Telnyx\FqdnConnections\FqdnConnectionUpdateParams;
use Telnyx\FqdnConnections\FqdnConnectionUpdateResponse;
use Telnyx\FqdnConnections\InboundFqdn;
use Telnyx\FqdnConnections\InboundFqdn\AniNumberFormat;
use Telnyx\FqdnConnections\InboundFqdn\DefaultRoutingMethod;
use Telnyx\FqdnConnections\InboundFqdn\DnisNumberFormat;
use Telnyx\FqdnConnections\InboundFqdn\SipRegion;
use Telnyx\FqdnConnections\InboundFqdn\SipSubdomainReceiveSettings;
use Telnyx\FqdnConnections\OutboundFqdn;
use Telnyx\FqdnConnections\OutboundFqdn\AniOverrideType;
use Telnyx\FqdnConnections\OutboundFqdn\IPAuthenticationMethod;
use Telnyx\FqdnConnections\OutboundFqdn\T38ReinviteSource;
use Telnyx\FqdnConnections\TransportProtocol;
use Telnyx\FqdnConnections\WebhookAPIVersion;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FqdnConnectionsRawContract;

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
     *   dtmfType?: 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType,
     *   encodeContactHeaderEnabled?: bool,
     *   encryptedMedia?: 'SRTP'|EncryptedMedia|null,
     *   inbound?: array{
     *     aniNumberFormat?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national'|AniNumberFormat,
     *     channelLimit?: int|null,
     *     codecs?: list<string>,
     *     defaultPrimaryFqdnID?: string|null,
     *     defaultRoutingMethod?: 'sequential'|'round-robin'|DefaultRoutingMethod|null,
     *     defaultSecondaryFqdnID?: string|null,
     *     defaultTertiaryFqdnID?: string|null,
     *     dnisNumberFormat?: '+e164'|'e164'|'national'|'sip_username'|DnisNumberFormat,
     *     generateRingbackTone?: bool,
     *     isupHeadersEnabled?: bool,
     *     prackEnabled?: bool,
     *     shakenStirEnabled?: bool,
     *     sipCompactHeadersEnabled?: bool,
     *     sipRegion?: 'US'|'Europe'|'Australia'|SipRegion,
     *     sipSubdomain?: string|null,
     *     sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     *     timeout1xxSecs?: int,
     *     timeout2xxSecs?: int,
     *   }|InboundFqdn,
     *   iosPushCredentialID?: string|null,
     *   microsoftTeamsSbc?: bool,
     *   noiseSuppression?: 'inbound'|'outbound'|'both'|'disabled'|NoiseSuppression,
     *   noiseSuppressionDetails?: array{
     *     attenuationLimit?: int,
     *     engine?: 'denoiser'|'deep_filter_net'|'deep_filter_net_large'|'krisp_viva_tel'|'krisp_viva_tel_lite'|'krisp_viva_promodel'|'krisp_viva_ss'|Engine,
     *   },
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: array{
     *     aniOverride?: string,
     *     aniOverrideType?: 'always'|'normal'|'emergency'|AniOverrideType,
     *     callParkingEnabled?: bool|null,
     *     channelLimit?: int,
     *     encryptedMedia?: 'SRTP'|EncryptedMedia|null,
     *     generateRingbackTone?: bool,
     *     instantRingbackEnabled?: bool,
     *     ipAuthenticationMethod?: 'credential-authentication'|'ip-authentication'|IPAuthenticationMethod,
     *     ipAuthenticationToken?: string,
     *     localization?: string,
     *     outboundVoiceProfileID?: string,
     *     t38ReinviteSource?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     *     techPrefix?: string,
     *     timeout1xxSecs?: int,
     *     timeout2xxSecs?: int,
     *   }|OutboundFqdn,
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
     * }|FqdnConnectionCreateParams $params
     *
     * @return BaseResponse<FqdnConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FqdnConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<FqdnConnectionGetResponse>
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
     *   dtmfType?: 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType,
     *   encodeContactHeaderEnabled?: bool,
     *   encryptedMedia?: 'SRTP'|EncryptedMedia|null,
     *   inbound?: array{
     *     aniNumberFormat?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national'|AniNumberFormat,
     *     channelLimit?: int|null,
     *     codecs?: list<string>,
     *     defaultPrimaryFqdnID?: string|null,
     *     defaultRoutingMethod?: 'sequential'|'round-robin'|DefaultRoutingMethod|null,
     *     defaultSecondaryFqdnID?: string|null,
     *     defaultTertiaryFqdnID?: string|null,
     *     dnisNumberFormat?: '+e164'|'e164'|'national'|'sip_username'|DnisNumberFormat,
     *     generateRingbackTone?: bool,
     *     isupHeadersEnabled?: bool,
     *     prackEnabled?: bool,
     *     shakenStirEnabled?: bool,
     *     sipCompactHeadersEnabled?: bool,
     *     sipRegion?: 'US'|'Europe'|'Australia'|SipRegion,
     *     sipSubdomain?: string|null,
     *     sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     *     timeout1xxSecs?: int,
     *     timeout2xxSecs?: int,
     *   }|InboundFqdn,
     *   iosPushCredentialID?: string|null,
     *   noiseSuppression?: 'inbound'|'outbound'|'both'|'disabled'|FqdnConnectionUpdateParams\NoiseSuppression,
     *   noiseSuppressionDetails?: array{
     *     attenuationLimit?: int,
     *     engine?: 'denoiser'|'deep_filter_net'|'deep_filter_net_large'|'krisp_viva_tel'|'krisp_viva_tel_lite'|'krisp_viva_promodel'|'krisp_viva_ss'|FqdnConnectionUpdateParams\NoiseSuppressionDetails\Engine,
     *   },
     *   onnetT38PassthroughEnabled?: bool,
     *   outbound?: array{
     *     aniOverride?: string,
     *     aniOverrideType?: 'always'|'normal'|'emergency'|AniOverrideType,
     *     callParkingEnabled?: bool|null,
     *     channelLimit?: int,
     *     encryptedMedia?: 'SRTP'|EncryptedMedia|null,
     *     generateRingbackTone?: bool,
     *     instantRingbackEnabled?: bool,
     *     ipAuthenticationMethod?: 'credential-authentication'|'ip-authentication'|IPAuthenticationMethod,
     *     ipAuthenticationToken?: string,
     *     localization?: string,
     *     outboundVoiceProfileID?: string,
     *     t38ReinviteSource?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     *     techPrefix?: string,
     *     timeout1xxSecs?: int,
     *     timeout2xxSecs?: int,
     *   }|OutboundFqdn,
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
     * }|FqdnConnectionUpdateParams $params
     *
     * @return BaseResponse<FqdnConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|FqdnConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   filter?: array{
     *     connectionName?: array{contains?: string},
     *     fqdn?: string,
     *     outboundVoiceProfileID?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'connection_name'|'active'|Sort,
     * }|FqdnConnectionListParams $params
     *
     * @return BaseResponse<DefaultPagination<FqdnConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|FqdnConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<FqdnConnectionDeleteResponse>
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
            path: ['fqdn_connections/%1$s', $id],
            options: $requestOptions,
            convert: FqdnConnectionDeleteResponse::class,
        );
    }
}
