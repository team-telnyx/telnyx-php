<?php

declare(strict_types=1);

namespace Telnyx\IPConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\IPConnections\IPConnection\TransportProtocol;
use Telnyx\IPConnections\IPConnection\WebhookAPIVersion;

/**
 * @phpstan-type IPConnectionDeleteResponseShape = array{data?: IPConnection|null}
 */
final class IPConnectionDeleteResponse implements BaseModel
{
    /** @use SdkModel<IPConnectionDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?IPConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param IPConnection|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
     *   call_cost_in_webhooks?: bool|null,
     *   connection_name?: string|null,
     *   created_at?: string|null,
     *   default_on_hold_comfort_noise_enabled?: bool|null,
     *   dtmf_type?: value-of<DtmfType>|null,
     *   encode_contact_header_enabled?: bool|null,
     *   encrypted_media?: value-of<EncryptedMedia>|null,
     *   inbound?: InboundIP|null,
     *   onnet_t38_passthrough_enabled?: bool|null,
     *   outbound?: OutboundIP|null,
     *   record_type?: string|null,
     *   rtcp_settings?: ConnectionRtcpSettings|null,
     *   tags?: list<string>|null,
     *   transport_protocol?: value-of<TransportProtocol>|null,
     *   updated_at?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public static function with(IPConnection|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param IPConnection|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
     *   call_cost_in_webhooks?: bool|null,
     *   connection_name?: string|null,
     *   created_at?: string|null,
     *   default_on_hold_comfort_noise_enabled?: bool|null,
     *   dtmf_type?: value-of<DtmfType>|null,
     *   encode_contact_header_enabled?: bool|null,
     *   encrypted_media?: value-of<EncryptedMedia>|null,
     *   inbound?: InboundIP|null,
     *   onnet_t38_passthrough_enabled?: bool|null,
     *   outbound?: OutboundIP|null,
     *   record_type?: string|null,
     *   rtcp_settings?: ConnectionRtcpSettings|null,
     *   tags?: list<string>|null,
     *   transport_protocol?: value-of<TransportProtocol>|null,
     *   updated_at?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public function withData(IPConnection|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
