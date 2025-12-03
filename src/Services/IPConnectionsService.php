<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\IPConnections\InboundIP;
use Telnyx\IPConnections\IPConnectionCreateParams;
use Telnyx\IPConnections\IPConnectionDeleteResponse;
use Telnyx\IPConnections\IPConnectionGetResponse;
use Telnyx\IPConnections\IPConnectionListParams;
use Telnyx\IPConnections\IPConnectionListResponse;
use Telnyx\IPConnections\IPConnectionNewResponse;
use Telnyx\IPConnections\IPConnectionUpdateParams;
use Telnyx\IPConnections\IPConnectionUpdateResponse;
use Telnyx\IPConnections\OutboundIP;
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
     *     ani_number_format?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national',
     *     channel_limit?: int,
     *     codecs?: list<string>,
     *     default_routing_method?: 'sequential'|'round-robin',
     *     dnis_number_format?: '+e164'|'e164'|'national'|'sip_username',
     *     generate_ringback_tone?: bool,
     *     isup_headers_enabled?: bool,
     *     prack_enabled?: bool,
     *     shaken_stir_enabled?: bool,
     *     sip_compact_headers_enabled?: bool,
     *     sip_region?: 'US'|'Europe'|'Australia',
     *     sip_subdomain?: string,
     *     sip_subdomain_receive_settings?: 'only_my_connections'|'from_anyone',
     *     timeout_1xx_secs?: int,
     *     timeout_2xx_secs?: int,
     *   },
     *   ios_push_credential_id?: string|null,
     *   onnet_t38_passthrough_enabled?: bool,
     *   outbound?: array{
     *     ani_override?: string,
     *     ani_override_type?: 'always'|'normal'|'emergency',
     *     call_parking_enabled?: bool|null,
     *     channel_limit?: int,
     *     generate_ringback_tone?: bool,
     *     instant_ringback_enabled?: bool,
     *     ip_authentication_method?: 'tech-prefixp-charge-info'|'token',
     *     ip_authentication_token?: string,
     *     localization?: string,
     *     outbound_voice_profile_id?: string,
     *     t38_reinvite_source?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru',
     *     tech_prefix?: string,
     *   }|OutboundIP,
     *   rtcp_settings?: array{
     *     capture_enabled?: bool,
     *     port?: 'rtcp-mux'|'rtp+1',
     *     report_frequency_secs?: int,
     *   }|ConnectionRtcpSettings,
     *   tags?: list<string>,
     *   transport_protocol?: 'UDP'|'TCP'|'TLS',
     *   webhook_api_version?: '1'|'2',
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

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPConnectionGetResponse {
        // @phpstan-ignore-next-line;
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
     *     ani_number_format?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national',
     *     channel_limit?: int,
     *     codecs?: list<string>,
     *     default_primary_ip_id?: string,
     *     default_routing_method?: 'sequential'|'round-robin',
     *     default_secondary_ip_id?: string,
     *     default_tertiary_ip_id?: string,
     *     dnis_number_format?: '+e164'|'e164'|'national'|'sip_username',
     *     generate_ringback_tone?: bool,
     *     isup_headers_enabled?: bool,
     *     prack_enabled?: bool,
     *     shaken_stir_enabled?: bool,
     *     sip_compact_headers_enabled?: bool,
     *     sip_region?: 'US'|'Europe'|'Australia',
     *     sip_subdomain?: string,
     *     sip_subdomain_receive_settings?: 'only_my_connections'|'from_anyone',
     *     timeout_1xx_secs?: int,
     *     timeout_2xx_secs?: int,
     *   }|InboundIP,
     *   ios_push_credential_id?: string|null,
     *   onnet_t38_passthrough_enabled?: bool,
     *   outbound?: array{
     *     ani_override?: string,
     *     ani_override_type?: 'always'|'normal'|'emergency',
     *     call_parking_enabled?: bool|null,
     *     channel_limit?: int,
     *     generate_ringback_tone?: bool,
     *     instant_ringback_enabled?: bool,
     *     ip_authentication_method?: 'tech-prefixp-charge-info'|'token',
     *     ip_authentication_token?: string,
     *     localization?: string,
     *     outbound_voice_profile_id?: string,
     *     t38_reinvite_source?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru',
     *     tech_prefix?: string,
     *   }|OutboundIP,
     *   rtcp_settings?: array{
     *     capture_enabled?: bool,
     *     port?: 'rtcp-mux'|'rtp+1',
     *     report_frequency_secs?: int,
     *   }|ConnectionRtcpSettings,
     *   tags?: list<string>,
     *   transport_protocol?: 'UDP'|'TCP'|'TLS',
     *   webhook_api_version?: '1'|'2',
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

        // @phpstan-ignore-next-line;
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
     *     connection_name?: array{contains?: string},
     *     fqdn?: string,
     *     outbound_voice_profile_id?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'connection_name'|'active',
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

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPConnectionDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ip_connections/%1$s', $id],
            options: $requestOptions,
            convert: IPConnectionDeleteResponse::class,
        );
    }
}
