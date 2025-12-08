<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationSettings\NotificationSetting\Parameter;
use Telnyx\NotificationSettings\NotificationSetting\Status;

/**
 * @phpstan-type NotificationSettingNewResponseShape = array{
 *   data?: NotificationSetting|null
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
     * @param NotificationSetting|array{
     *   id?: string|null,
     *   associated_record_type?: string|null,
     *   associated_record_type_value?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   notification_channel_id?: string|null,
     *   notification_event_condition_id?: string|null,
     *   notification_profile_id?: string|null,
     *   parameters?: list<Parameter>|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(NotificationSetting|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param NotificationSetting|array{
     *   id?: string|null,
     *   associated_record_type?: string|null,
     *   associated_record_type_value?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   notification_channel_id?: string|null,
     *   notification_event_condition_id?: string|null,
     *   notification_profile_id?: string|null,
     *   parameters?: list<Parameter>|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(NotificationSetting|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
