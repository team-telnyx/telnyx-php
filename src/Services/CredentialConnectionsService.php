<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams;
use Telnyx\CredentialConnections\CredentialConnectionDeleteResponse;
use Telnyx\CredentialConnections\CredentialConnectionGetResponse;
use Telnyx\CredentialConnections\CredentialConnectionListParams;
use Telnyx\CredentialConnections\CredentialConnectionListResponse;
use Telnyx\CredentialConnections\CredentialConnectionNewResponse;
use Telnyx\CredentialConnections\CredentialConnectionUpdateParams;
use Telnyx\CredentialConnections\CredentialConnectionUpdateResponse;
use Telnyx\CredentialConnections\CredentialInbound;
use Telnyx\CredentialConnections\CredentialOutbound;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CredentialConnectionsContract;
use Telnyx\Services\CredentialConnections\ActionsService;

final class CredentialConnectionsService implements CredentialConnectionsContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates a credential connection.
     *
     * @param array{
     *   connection_name: string,
     *   password: string,
     *   user_name: string,
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
     *     channel_limit?: int,
     *     codecs?: list<string>,
     *     dnis_number_format?: '+e164'|'e164'|'national'|'sip_username',
     *     generate_ringback_tone?: bool,
     *     isup_headers_enabled?: bool,
     *     prack_enabled?: bool,
     *     shaken_stir_enabled?: bool,
     *     sip_compact_headers_enabled?: bool,
     *     timeout_1xx_secs?: int,
     *     timeout_2xx_secs?: int,
     *   }|CredentialInbound,
     *   ios_push_credential_id?: string|null,
     *   onnet_t38_passthrough_enabled?: bool,
     *   outbound?: array{
     *     ani_override?: string,
     *     ani_override_type?: 'always'|'normal'|'emergency',
     *     call_parking_enabled?: bool|null,
     *     channel_limit?: int,
     *     generate_ringback_tone?: bool,
     *     instant_ringback_enabled?: bool,
     *     localization?: string,
     *     outbound_voice_profile_id?: string,
     *     t38_reinvite_source?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru',
     *   }|CredentialOutbound,
     *   rtcp_settings?: array{
     *     capture_enabled?: bool,
     *     port?: 'rtcp-mux'|'rtp+1',
     *     report_frequency_secs?: int,
     *   }|ConnectionRtcpSettings,
     *   sip_uri_calling_preference?: 'disabled'|'unrestricted'|'internal',
     *   tags?: list<string>,
     *   webhook_api_version?: '1'|'2'|'texml',
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string,
     *   webhook_timeout_secs?: int|null,
     * }|CredentialConnectionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CredentialConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CredentialConnectionNewResponse {
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CredentialConnectionGetResponse {
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
     *     dnis_number_format?: '+e164'|'e164'|'national'|'sip_username',
     *     generate_ringback_tone?: bool,
     *     isup_headers_enabled?: bool,
     *     prack_enabled?: bool,
     *     shaken_stir_enabled?: bool,
     *     sip_compact_headers_enabled?: bool,
     *     timeout_1xx_secs?: int,
     *     timeout_2xx_secs?: int,
     *   }|CredentialInbound,
     *   ios_push_credential_id?: string|null,
     *   onnet_t38_passthrough_enabled?: bool,
     *   outbound?: array{
     *     ani_override?: string,
     *     ani_override_type?: 'always'|'normal'|'emergency',
     *     call_parking_enabled?: bool|null,
     *     channel_limit?: int,
     *     generate_ringback_tone?: bool,
     *     instant_ringback_enabled?: bool,
     *     localization?: string,
     *     outbound_voice_profile_id?: string,
     *     t38_reinvite_source?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru',
     *   }|CredentialOutbound,
     *   password?: string,
     *   rtcp_settings?: array{
     *     capture_enabled?: bool,
     *     port?: 'rtcp-mux'|'rtp+1',
     *     report_frequency_secs?: int,
     *   }|ConnectionRtcpSettings,
     *   sip_uri_calling_preference?: 'disabled'|'unrestricted'|'internal',
     *   tags?: list<string>,
     *   user_name?: string,
     *   webhook_api_version?: '1'|'2',
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string,
     *   webhook_timeout_secs?: int|null,
     * }|CredentialConnectionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CredentialConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CredentialConnectionUpdateResponse {
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
     *     connection_name?: array{contains?: string},
     *     fqdn?: string,
     *     outbound_voice_profile_id?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'connection_name'|'active',
     * }|CredentialConnectionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|CredentialConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CredentialConnectionListResponse {
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
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CredentialConnectionDeleteResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['credential_connections/%1$s', $id],
            options: $requestOptions,
            convert: CredentialConnectionDeleteResponse::class,
        );
    }
}
