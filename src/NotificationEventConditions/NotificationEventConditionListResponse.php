<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data\AssociatedRecordType;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data\Parameter;

/**
 * @phpstan-type NotificationEventConditionListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class NotificationEventConditionListResponse implements BaseModel
{
    /** @use SdkModel<NotificationEventConditionListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
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
     * @param list<Data|array{
     *   id?: string|null,
     *   allowMultipleChannels?: bool|null,
     *   associatedRecordType?: value-of<AssociatedRecordType>|null,
     *   asynchronous?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   description?: string|null,
     *   enabled?: bool|null,
     *   name?: string|null,
     *   notificationEventID?: string|null,
     *   parameters?: list<Parameter>|null,
     *   supportedChannels?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
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
     * @param list<Data|array{
     *   id?: string|null,
     *   allowMultipleChannels?: bool|null,
     *   associatedRecordType?: value-of<AssociatedRecordType>|null,
     *   asynchronous?: bool|null,
     *   createdAt?: \DateTimeInterface|null,
     *   description?: string|null,
     *   enabled?: bool|null,
     *   name?: string|null,
     *   notificationEventID?: string|null,
     *   parameters?: list<Parameter>|null,
     *   supportedChannels?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
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
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
