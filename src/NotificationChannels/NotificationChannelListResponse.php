<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
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
    #[Api(list: NotificationChannel::class, optional: true)]
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
     * @param list<NotificationChannel|array{
     *   id?: string|null,
     *   channel_destination?: string|null,
     *   channel_type_id?: value-of<ChannelTypeID>|null,
     *   created_at?: \DateTimeInterface|null,
     *   notification_profile_id?: string|null,
     *   updated_at?: \DateTimeInterface|null,
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
     * @param list<NotificationChannel|array{
     *   id?: string|null,
     *   channel_destination?: string|null,
     *   channel_type_id?: value-of<ChannelTypeID>|null,
     *   created_at?: \DateTimeInterface|null,
     *   notification_profile_id?: string|null,
     *   updated_at?: \DateTimeInterface|null,
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
