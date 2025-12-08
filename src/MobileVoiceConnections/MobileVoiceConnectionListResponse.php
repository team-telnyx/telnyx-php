<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse\Data;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse\Data\Inbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse\Data\Outbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse\Data\RecordType;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse\Data\WebhookAPIVersion;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse\Meta;

/**
 * @phpstan-type MobileVoiceConnectionListResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null
 * }
 */
final class MobileVoiceConnectionListResponse implements BaseModel
{
    /** @use SdkModel<MobileVoiceConnectionListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   connection_name?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   record_type?: value-of<RecordType>|null,
     *   tags?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * }> $data
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   connection_name?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   record_type?: value-of<RecordType>|null,
     *   tags?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
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
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
