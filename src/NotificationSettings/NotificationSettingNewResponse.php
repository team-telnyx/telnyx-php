<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NotificationSettingShape from \Telnyx\NotificationSettings\NotificationSetting
 *
 * @phpstan-type NotificationSettingNewResponseShape = array{
 *   data?: null|NotificationSetting|NotificationSettingShape
 * }
 */
final class NotificationSettingNewResponse implements BaseModel
{
    /** @use SdkModel<NotificationSettingNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?NotificationSetting $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NotificationSettingShape $data
     */
    public static function with(NotificationSetting|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NotificationSettingShape $data
     */
    public function withData(NotificationSetting|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
