<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationChannels\NotificationChannel\ChannelTypeID;

/**
 * @phpstan-type NotificationChannelListResponseShape = array{
 *   data?: list<NotificationChannel>|null, meta?: PaginationMeta|null
 * }
 */
final class NotificationChannelListResponse implements BaseModel
{
    /** @use SdkModel<NotificationChannelListResponseShape> */
    use SdkModel;

    /** @var list<NotificationChannel>|null $data */
    #[Optional(list: NotificationChannel::class)]
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
     * @param list<NotificationChannel|array{
     *   id?: string|null,
     *   channelDestination?: string|null,
     *   channelTypeID?: value-of<ChannelTypeID>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   notificationProfileID?: string|null,
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
     * @param list<NotificationChannel|array{
     *   id?: string|null,
     *   channelDestination?: string|null,
     *   channelTypeID?: value-of<ChannelTypeID>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   notificationProfileID?: string|null,
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
