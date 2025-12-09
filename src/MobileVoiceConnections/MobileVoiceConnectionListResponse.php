<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections;

use Telnyx\Core\Attributes\Optional;
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
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
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
     *   connectionName?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: value-of<RecordType>|null,
     *   tags?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
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
     *   connectionName?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: value-of<RecordType>|null,
     *   tags?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
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
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
