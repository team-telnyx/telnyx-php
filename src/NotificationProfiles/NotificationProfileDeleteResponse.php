<?php

declare(strict_types=1);

namespace Telnyx\NotificationProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type NotificationProfileDeleteResponseShape = array{
 *   data?: NotificationProfile|null
 * }
 */
final class NotificationProfileDeleteResponse implements BaseModel
{
    /** @use SdkModel<NotificationProfileDeleteResponseShape> */
    use SdkModel;

    /**
     * A Collection of Notification Channels.
     */
    #[Optional]
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
     *   createdAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(NotificationProfile|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A Collection of Notification Channels.
     *
     * @param NotificationProfile|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(NotificationProfile|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
