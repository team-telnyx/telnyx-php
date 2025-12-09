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
use Telnyx\ServiceContracts\IPConnectionsContract;

final class IPConnectionsService implements IPConnectionsContract
{
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
     *   anchorsite_override?: value-of<AnchorsiteOverride>,
     *   android_push_credential_id?: string|null,
     *   call_cost_in_webhooks?: bool,
     *   connection_name?: string,
     *   default_on_hold_comfort_noise_enabled?: bool,
     *   dtmf_type?: 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType,
     *   encode_contact_header_enabled?: bool,
     *   encrypted_media?: 'SRTP'|EncryptedMedia|null,
     *   inbound?: array{
     *     ani_number_format?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national'|AniNumberFormat,
     *     channel_limit?: int,
     *     codecs?: list<string>,
     *     default_routing_method?: 'sequential'|'round-robin'|DefaultRoutingMethod,
     *     dnis_number_format?: '+e164'|'e164'|'national'|'sip_username'|DnisNumberFormat,
     *     generate_ringback_tone?: bool,
     *     isup_headers_enabled?: bool,
     *     prack_enabled?: bool,
     *     shaken_stir_enabled?: bool,
     *     sip_compact_headers_enabled?: bool,
     *     sip_region?: 'US'|'Europe'|'Australia'|SipRegion,
     *     sip_subdomain?: string,
     *     sip_subdomain_receive_settings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     *     timeout_1xx_secs?: int,
     *     timeout_2xx_secs?: int,
     *   },
     *   ios_push_credential_id?: string|null,
     *   onnet_t38_passthrough_enabled?: bool,
     *   outbound?: array{
     *     ani_override?: string,
     *     ani_override_type?: 'always'|'normal'|'emergency'|AniOverrideType,
     *     call_parking_enabled?: bool|null,
     *     channel_limit?: int,
     *     generate_ringback_tone?: bool,
     *     instant_ringback_enabled?: bool,
     *     ip_authentication_method?: 'tech-prefixp-charge-info'|'token'|IPAuthenticationMethod,
     *     ip_authentication_token?: string,
     *     localization?: string,
     *     outbound_voice_profile_id?: string,
     *     t38_reinvite_source?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     *     tech_prefix?: string,
     *   }|OutboundIP,
     *   rtcp_settings?: array{
     *     capture_enabled?: bool,
     *     port?: 'rtcp-mux'|'rtp+1'|Port,
     *     report_frequency_secs?: int,
     *   }|ConnectionRtcpSettings,
     *   tags?: list<string>,
     *   transport_protocol?: 'UDP'|'TCP'|'TLS'|TransportProtocol,
     *   webhook_api_version?: '1'|'2'|WebhookAPIVersion,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string,
     *   webhook_timeout_secs?: int|null,
     * }|IPConnectionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|IPConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): IPConnectionNewResponse {
        [$parsed, $options] = IPConnectionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<IPConnectionNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'ip_connections',
            body: (object) $parsed,
            options: $options,
            convert: IPConnectionNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the details of an existing ip connection.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPConnectionGetResponse {
        /** @var BaseResponse<IPConnectionGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['ip_connections/%1$s', $id],
            options: $requestOptions,
            convert: IPConnectionGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates settings of an existing IP connection.
     *
     * @param array{
     *   active?: bool,
     *   anchorsite_override?: value-of<AnchorsiteOverride>,
     *   android_push_credential_id?: string|null,
     *   call_cost_in_webhooks?: bool,
     *   connection_name?: string,
     *   default_on_hold_comfort_noise_enabled?: bool,
     *   dtmf_type?: 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType,
     *   encode_contact_header_enabled?: bool,
     *   encrypted_media?: 'SRTP'|EncryptedMedia|null,
     *   inbound?: array{
     *     ani_number_format?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national'|InboundIP\AniNumberFormat,
     *     channel_limit?: int,
     *     codecs?: list<string>,
     *     default_primary_ip_id?: string,
     *     default_routing_method?: 'sequential'|'round-robin'|InboundIP\DefaultRoutingMethod,
     *     default_secondary_ip_id?: string,
     *     default_tertiary_ip_id?: string,
     *     dnis_number_format?: '+e164'|'e164'|'national'|'sip_username'|InboundIP\DnisNumberFormat,
     *     generate_ringback_tone?: bool,
     *     isup_headers_enabled?: bool,
     *     prack_enabled?: bool,
     *     shaken_stir_enabled?: bool,
     *     sip_compact_headers_enabled?: bool,
     *     sip_region?: 'US'|'Europe'|'Australia'|InboundIP\SipRegion,
     *     sip_subdomain?: string,
     *     sip_subdomain_receive_settings?: 'only_my_connections'|'from_anyone'|InboundIP\SipSubdomainReceiveSettings,
     *     timeout_1xx_secs?: int,
     *     timeout_2xx_secs?: int,
     *   }|InboundIP,
     *   ios_push_credential_id?: string|null,
     *   onnet_t38_passthrough_enabled?: bool,
     *   outbound?: array{
     *     ani_override?: string,
     *     ani_override_type?: 'always'|'normal'|'emergency'|AniOverrideType,
     *     call_parking_enabled?: bool|null,
     *     channel_limit?: int,
     *     generate_ringback_tone?: bool,
     *     instant_ringback_enabled?: bool,
     *     ip_authentication_method?: 'tech-prefixp-charge-info'|'token'|IPAuthenticationMethod,
     *     ip_authentication_token?: string,
     *     localization?: string,
     *     outbound_voice_profile_id?: string,
     *     t38_reinvite_source?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     *     tech_prefix?: string,
     *   }|OutboundIP,
     *   rtcp_settings?: array{
     *     capture_enabled?: bool,
     *     port?: 'rtcp-mux'|'rtp+1'|Port,
     *     report_frequency_secs?: int,
     *   }|ConnectionRtcpSettings,
     *   tags?: list<string>,
     *   transport_protocol?: 'UDP'|'TCP'|'TLS'|IPConnectionUpdateParams\TransportProtocol,
     *   webhook_api_version?: '1'|'2'|IPConnectionUpdateParams\WebhookAPIVersion,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string,
     *   webhook_timeout_secs?: int|null,
     * }|IPConnectionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|IPConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): IPConnectionUpdateResponse {
        [$parsed, $options] = IPConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<IPConnectionUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['ip_connections/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: IPConnectionUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your IP connections.
     *
     * @param array{
     *   filter?: array{
     *     connection_name?: array{contains?: string},
     *     fqdn?: string,
     *     outbound_voice_profile_id?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'connection_name'|'active'|Sort,
     * }|IPConnectionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|IPConnectionListParams $params,
        ?RequestOptions $requestOptions = null
    ): IPConnectionListResponse {
        [$parsed, $options] = IPConnectionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<IPConnectionListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'ip_connections',
            query: $parsed,
            options: $options,
            convert: IPConnectionListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an existing IP connection.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPConnectionDeleteResponse {
        /** @var BaseResponse<IPConnectionDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['ip_connections/%1$s', $id],
            options: $requestOptions,
            convert: IPConnectionDeleteResponse::class,
        );

        return $response->parse();
    }
}
