<?php

declare(strict_types=1);

namespace Telnyx\NotificationProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NotificationProfileShape from \Telnyx\NotificationProfiles\NotificationProfile
 *
 * @phpstan-type NotificationProfileNewResponseShape = array{
 *   data?: null|NotificationProfile|NotificationProfileShape
 * }
 */
final class NotificationProfileNewResponse implements BaseModel
{
    /** @use SdkModel<NotificationProfileNewResponseShape> */
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
     * @param NotificationProfile|NotificationProfileShape|null $data
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
     * @param NotificationProfile|NotificationProfileShape $data
     */
    public function withData(NotificationProfile|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
