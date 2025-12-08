<?php

declare(strict_types=1);

namespace Telnyx\NotificationProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type NotificationProfileUpdateResponseShape = array{
 *   data?: NotificationProfile|null
 * }
 */
final class NotificationProfileUpdateResponse implements BaseModel
{
    /** @use SdkModel<NotificationProfileUpdateResponseShape> */
    use SdkModel;

    /**
     * A Collection of Notification Channels.
     */
    #[Api(optional: true)]
    public ?NotificationProfile $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NotificationProfile|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   name?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(NotificationProfile|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * A Collection of Notification Channels.
     *
     * @param NotificationProfile|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   name?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(NotificationProfile|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
