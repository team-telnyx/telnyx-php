<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\CallControlApplications\CallControlApplication\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplication\DtmfType;
use Telnyx\CallControlApplications\CallControlApplication\RecordType;
use Telnyx\CallControlApplications\CallControlApplication\WebhookAPIVersion;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CallControlApplicationListResponseShape = array{
 *   data?: list<CallControlApplication>|null, meta?: PaginationMeta|null
 * }
 */
final class CallControlApplicationListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CallControlApplicationListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<CallControlApplication>|null $data */
    #[Api(list: CallControlApplication::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CallControlApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
     *   application_name?: string|null,
     *   call_cost_in_webhooks?: bool|null,
     *   created_at?: string|null,
     *   dtmf_type?: value-of<DtmfType>|null,
     *   first_command_timeout?: bool|null,
     *   first_command_timeout_secs?: int|null,
     *   inbound?: CallControlApplicationInbound|null,
     *   outbound?: CallControlApplicationOutbound|null,
     *   record_type?: value-of<RecordType>|null,
     *   redact_dtmf_debug_logging?: bool|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<CallControlApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
     *   application_name?: string|null,
     *   call_cost_in_webhooks?: bool|null,
     *   created_at?: string|null,
     *   dtmf_type?: value-of<DtmfType>|null,
     *   first_command_timeout?: bool|null,
     *   first_command_timeout_secs?: int|null,
     *   inbound?: CallControlApplicationInbound|null,
     *   outbound?: CallControlApplicationOutbound|null,
     *   record_type?: value-of<RecordType>|null,
     *   redact_dtmf_debug_logging?: bool|null,
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
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
