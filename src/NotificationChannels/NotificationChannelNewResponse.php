<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\NotificationChannels\NotificationChannel\ChannelTypeID;

/**
 * @phpstan-type NotificationChannelNewResponseShape = array{
 *   data?: NotificationChannel|null
 * }
 */
final class NotificationChannelNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NotificationChannelNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * A Notification Channel.
     */
    #[Api(optional: true)]
    public ?NotificationChannel $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NotificationChannel|array{
     *   id?: string|null,
     *   channel_destination?: string|null,
     *   channel_type_id?: value-of<ChannelTypeID>|null,
     *   created_at?: \DateTimeInterface|null,
     *   notification_profile_id?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(NotificationChannel|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * A Notification Channel.
     *
     * @param NotificationChannel|array{
     *   id?: string|null,
     *   channel_destination?: string|null,
     *   channel_type_id?: value-of<ChannelTypeID>|null,
     *   created_at?: \DateTimeInterface|null,
     *   notification_profile_id?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(NotificationChannel|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
