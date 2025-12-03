<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\FqdnConnections\FqdnConnectionCreateParams;
use Telnyx\FqdnConnections\FqdnConnectionDeleteResponse;
use Telnyx\FqdnConnections\FqdnConnectionGetResponse;
use Telnyx\FqdnConnections\FqdnConnectionListParams;
use Telnyx\FqdnConnections\FqdnConnectionListResponse;
use Telnyx\FqdnConnections\FqdnConnectionNewResponse;
use Telnyx\FqdnConnections\FqdnConnectionUpdateParams;
use Telnyx\FqdnConnections\FqdnConnectionUpdateResponse;
use Telnyx\FqdnConnections\InboundFqdn;
use Telnyx\FqdnConnections\OutboundFqdn;
use Telnyx\FqdnConnections\TransportProtocol;
use Telnyx\FqdnConnections\WebhookAPIVersion;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FqdnConnectionsContract;

final class FqdnConnectionsService implements FqdnConnectionsContract
{
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
     *   connection_name: string,
     *   active?: bool,
     *   anchorsite_override?: value-of<AnchorsiteOverride>,
     *   android_push_credential_id?: string|null,
     *   call_cost_in_webhooks?: bool,
     *   default_on_hold_comfort_noise_enabled?: bool,
     *   dtmf_type?: 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType,
     *   encode_contact_header_enabled?: bool,
     *   encrypted_media?: 'SRTP'|EncryptedMedia|null,
     *   inbound?: array{
     *     ani_number_format?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national',
     *     channel_limit?: int|null,
     *     codecs?: list<string>,
     *     default_primary_fqdn_id?: string|null,
     *     default_routing_method?: 'sequential'|'round-robin'|null,
     *     default_secondary_fqdn_id?: string|null,
     *     default_tertiary_fqdn_id?: string|null,
     *     dnis_number_format?: '+e164'|'e164'|'national'|'sip_username',
     *     generate_ringback_tone?: bool,
     *     isup_headers_enabled?: bool,
     *     prack_enabled?: bool,
     *     shaken_stir_enabled?: bool,
     *     sip_compact_headers_enabled?: bool,
     *     sip_region?: 'US'|'Europe'|'Australia',
     *     sip_subdomain?: string|null,
     *     sip_subdomain_receive_settings?: 'only_my_connections'|'from_anyone',
     *     timeout_1xx_secs?: int,
     *     timeout_2xx_secs?: int,
     *   }|InboundFqdn,
     *   ios_push_credential_id?: string|null,
     *   microsoft_teams_sbc?: bool,
     *   onnet_t38_passthrough_enabled?: bool,
     *   outbound?: array{
     *     ani_override?: string,
     *     ani_override_type?: 'always'|'normal'|'emergency',
     *     call_parking_enabled?: bool|null,
     *     channel_limit?: int,
     *     encrypted_media?: 'SRTP'|EncryptedMedia|null,
     *     generate_ringback_tone?: bool,
     *     instant_ringback_enabled?: bool,
     *     ip_authentication_method?: 'credential-authentication'|'ip-authentication',
     *     ip_authentication_token?: string,
     *     localization?: string,
     *     outbound_voice_profile_id?: string,
     *     t38_reinvite_source?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru',
     *     tech_prefix?: string,
     *     timeout_1xx_secs?: int,
     *     timeout_2xx_secs?: int,
     *   }|OutboundFqdn,
     *   rtcp_settings?: array{
     *     capture_enabled?: bool,
     *     port?: 'rtcp-mux'|'rtp+1',
     *     report_frequency_secs?: int,
     *   }|ConnectionRtcpSettings,
     *   tags?: list<string>,
     *   transport_protocol?: 'UDP'|'TCP'|'TLS'|TransportProtocol,
     *   webhook_api_version?: '1'|'2'|WebhookAPIVersion,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string,
     *   webhook_timeout_secs?: int|null,
     * }|FqdnConnectionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|FqdnConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FqdnConnectionNewResponse {
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnConnectionGetResponse {
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
     *     channel_limit?: int|null,
     *     codecs?: list<string>,
     *     default_primary_fqdn_id?: string|null,
     *     default_routing_method?: 'sequential'|'round-robin'|null,
     *     default_secondary_fqdn_id?: string|null,
     *     default_tertiary_fqdn_id?: string|null,
     *     dnis_number_format?: '+e164'|'e164'|'national'|'sip_username',
     *     generate_ringback_tone?: bool,
     *     isup_headers_enabled?: bool,
     *     prack_enabled?: bool,
     *     shaken_stir_enabled?: bool,
     *     sip_compact_headers_enabled?: bool,
     *     sip_region?: 'US'|'Europe'|'Australia',
     *     sip_subdomain?: string|null,
     *     sip_subdomain_receive_settings?: 'only_my_connections'|'from_anyone',
     *     timeout_1xx_secs?: int,
     *     timeout_2xx_secs?: int,
     *   }|InboundFqdn,
     *   ios_push_credential_id?: string|null,
     *   onnet_t38_passthrough_enabled?: bool,
     *   outbound?: array{
     *     ani_override?: string,
     *     ani_override_type?: 'always'|'normal'|'emergency',
     *     call_parking_enabled?: bool|null,
     *     channel_limit?: int,
     *     encrypted_media?: 'SRTP'|EncryptedMedia|null,
     *     generate_ringback_tone?: bool,
     *     instant_ringback_enabled?: bool,
     *     ip_authentication_method?: 'credential-authentication'|'ip-authentication',
     *     ip_authentication_token?: string,
     *     localization?: string,
     *     outbound_voice_profile_id?: string,
     *     t38_reinvite_source?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru',
     *     tech_prefix?: string,
     *     timeout_1xx_secs?: int,
     *     timeout_2xx_secs?: int,
     *   }|OutboundFqdn,
     *   rtcp_settings?: array{
     *     capture_enabled?: bool,
     *     port?: 'rtcp-mux'|'rtp+1',
     *     report_frequency_secs?: int,
     *   }|ConnectionRtcpSettings,
     *   tags?: list<string>,
     *   transport_protocol?: 'UDP'|'TCP'|'TLS'|TransportProtocol,
     *   webhook_api_version?: '1'|'2'|WebhookAPIVersion,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string,
     *   webhook_timeout_secs?: int|null,
     * }|FqdnConnectionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|FqdnConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FqdnConnectionUpdateResponse {
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
     *     connection_name?: array{contains?: string},
     *     fqdn?: string,
     *     outbound_voice_profile_id?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'connection_name'|'active',
     * }|FqdnConnectionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|FqdnConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): FqdnConnectionListResponse {
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
            convert: FqdnConnectionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an FQDN connection.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnConnectionDeleteResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['fqdn_connections/%1$s', $id],
            options: $requestOptions,
            convert: FqdnConnectionDeleteResponse::class,
        );
    }
}
