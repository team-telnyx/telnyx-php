<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\ConnectionsPaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\CredentialConnections\CredentialConnection\SipUriCallingPreference;
use Telnyx\CredentialConnections\CredentialConnection\WebhookAPIVersion;

/**
 * @phpstan-type CredentialConnectionListResponseShape = array{
 *   data?: list<CredentialConnection>|null, meta?: ConnectionsPaginationMeta|null
 * }
 */
final class CredentialConnectionListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CredentialConnectionListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<CredentialConnection>|null $data */
    #[Api(list: CredentialConnection::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * @param list<CredentialConnection|array{
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
     * @param list<CredentialConnection|array{
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
