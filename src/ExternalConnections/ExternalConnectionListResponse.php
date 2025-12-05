<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\ExternalConnections\ExternalConnection\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnection\Inbound;
use Telnyx\ExternalConnections\ExternalConnection\Outbound;
use Telnyx\ExternalConnections\ExternalConnection\WebhookAPIVersion;

/**
 * @phpstan-type ExternalConnectionListResponseShape = array{
 *   data?: list<ExternalConnection>|null,
 *   meta?: ExternalVoiceIntegrationsPaginationMeta|null,
 * }
 */
final class ExternalConnectionListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ExternalConnectionListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<ExternalConnection>|null $data */
    #[Api(list: ExternalConnection::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?ExternalVoiceIntegrationsPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ExternalConnection|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   created_at?: string|null,
     *   credential_active?: bool|null,
     *   external_sip_connection?: value-of<ExternalSipConnection>|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   record_type?: string|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * }> $data
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        ExternalVoiceIntegrationsPaginationMeta|array|null $meta = null,
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<ExternalConnection|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   created_at?: string|null,
     *   credential_active?: bool|null,
     *   external_sip_connection?: value-of<ExternalSipConnection>|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   record_type?: string|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
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
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(
        ExternalVoiceIntegrationsPaginationMeta|array $meta
    ): self {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
