<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\PaginationMetaSimple;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Attempt;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Status;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Webhook;

/**
 * @phpstan-type WebhookDeliveryListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMetaSimple|null
 * }
 */
final class WebhookDeliveryListResponse implements BaseModel
{
    /** @use SdkModel<WebhookDeliveryListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMetaSimple $meta;

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
     *   attempts?: list<Attempt>|null,
     *   finishedAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   startedAt?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   userID?: string|null,
     *   webhook?: Webhook|null,
     * }> $data
     * @param PaginationMetaSimple|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMetaSimple|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   attempts?: list<Attempt>|null,
     *   finishedAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   startedAt?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   userID?: string|null,
     *   webhook?: Webhook|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMetaSimple|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMetaSimple|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
