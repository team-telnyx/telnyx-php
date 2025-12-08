<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\CredentialConnection\SipUriCallingPreference;
use Telnyx\CredentialConnections\CredentialConnection\WebhookAPIVersion;

/**
 * @phpstan-type CredentialConnectionNewResponseShape = array{
 *   data?: CredentialConnection|null
 * }
 */
final class CredentialConnectionNewResponse implements BaseModel
{
    /** @use SdkModel<CredentialConnectionNewResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?CredentialConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CredentialConnection|array{
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
     *   inbound?: CredentialInbound|null,
     *   onnet_t38_passthrough_enabled?: bool|null,
     *   outbound?: CredentialOutbound|null,
     *   password?: string|null,
     *   record_type?: string|null,
     *   rtcp_settings?: ConnectionRtcpSettings|null,
     *   sip_uri_calling_preference?: value-of<SipUriCallingPreference>|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     *   user_name?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public static function with(CredentialConnection|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param CredentialConnection|array{
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
     *   inbound?: CredentialInbound|null,
     *   onnet_t38_passthrough_enabled?: bool|null,
     *   outbound?: CredentialOutbound|null,
     *   password?: string|null,
     *   record_type?: string|null,
     *   rtcp_settings?: ConnectionRtcpSettings|null,
     *   sip_uri_calling_preference?: value-of<SipUriCallingPreference>|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     *   user_name?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * } $data
     */
    public function withData(CredentialConnection|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
