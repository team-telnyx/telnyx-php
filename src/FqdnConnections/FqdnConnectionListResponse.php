<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections;

use Telnyx\ConnectionsPaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;

/**
 * @phpstan-type FqdnConnectionListResponseShape = array{
 *   data?: list<FqdnConnection>|null, meta?: ConnectionsPaginationMeta|null
 * }
 */
final class FqdnConnectionListResponse implements BaseModel
{
    /** @use SdkModel<FqdnConnectionListResponseShape> */
    use SdkModel;

    /** @var list<FqdnConnection>|null $data */
    #[Optional(list: FqdnConnection::class)]
    public ?array $data;

    #[Optional]
    public ?ConnectionsPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<FqdnConnection|array{
     *   connection_name: string,
     *   id?: string|null,
     *   active?: bool|null,
     *   adjust_dtmf_timestamp?: bool|null,
     *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
     *   call_cost_enabled?: bool|null,
     *   call_cost_in_webhooks?: bool|null,
     *   created_at?: string|null,
     *   default_on_hold_comfort_noise_enabled?: bool|null,
     *   dtmf_type?: value-of<DtmfType>|null,
     *   encode_contact_header_enabled?: bool|null,
     *   encrypted_media?: value-of<EncryptedMedia>|null,
     *   ignore_dtmf_duration?: bool|null,
     *   ignore_mark_bit?: bool|null,
     *   inbound?: InboundFqdn|null,
     *   microsoft_teams_sbc?: bool|null,
     *   noise_suppression?: bool|null,
     *   onnet_t38_passthrough_enabled?: bool|null,
     *   outbound?: OutboundFqdn|null,
     *   password?: string|null,
     *   record_type?: string|null,
     *   rtcp_settings?: ConnectionRtcpSettings|null,
     *   rtp_pass_codecs_on_stream_change?: bool|null,
     *   send_normalized_timestamps?: bool|null,
     *   tags?: list<string>|null,
     *   third_party_control_enabled?: bool|null,
     *   transport_protocol?: value-of<TransportProtocol>|null,
     *   txt_name?: string|null,
     *   txt_ttl?: int|null,
     *   txt_value?: string|null,
     *   updated_at?: string|null,
     *   user_name?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * }> $data
     * @param ConnectionsPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        ConnectionsPaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<FqdnConnection|array{
     *   connection_name: string,
     *   id?: string|null,
     *   active?: bool|null,
     *   adjust_dtmf_timestamp?: bool|null,
     *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
     *   call_cost_enabled?: bool|null,
     *   call_cost_in_webhooks?: bool|null,
     *   created_at?: string|null,
     *   default_on_hold_comfort_noise_enabled?: bool|null,
     *   dtmf_type?: value-of<DtmfType>|null,
     *   encode_contact_header_enabled?: bool|null,
     *   encrypted_media?: value-of<EncryptedMedia>|null,
     *   ignore_dtmf_duration?: bool|null,
     *   ignore_mark_bit?: bool|null,
     *   inbound?: InboundFqdn|null,
     *   microsoft_teams_sbc?: bool|null,
     *   noise_suppression?: bool|null,
     *   onnet_t38_passthrough_enabled?: bool|null,
     *   outbound?: OutboundFqdn|null,
     *   password?: string|null,
     *   record_type?: string|null,
     *   rtcp_settings?: ConnectionRtcpSettings|null,
     *   rtp_pass_codecs_on_stream_change?: bool|null,
     *   send_normalized_timestamps?: bool|null,
     *   tags?: list<string>|null,
     *   third_party_control_enabled?: bool|null,
     *   transport_protocol?: value-of<TransportProtocol>|null,
     *   txt_name?: string|null,
     *   txt_ttl?: int|null,
     *   txt_value?: string|null,
     *   updated_at?: string|null,
     *   user_name?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param ConnectionsPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(ConnectionsPaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
