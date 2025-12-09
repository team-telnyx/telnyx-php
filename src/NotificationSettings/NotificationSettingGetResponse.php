<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationSettings\NotificationSetting\Parameter;
use Telnyx\NotificationSettings\NotificationSetting\Status;

/**
 * @phpstan-type NotificationSettingGetResponseShape = array{
 *   data?: NotificationSetting|null
 * }
 */
final class NotificationSettingGetResponse implements BaseModel
{
    /** @use SdkModel<NotificationSettingGetResponseShape> */
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
     *   associatedRecordType?: string|null,
     *   associatedRecordTypeValue?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   notificationChannelID?: string|null,
     *   notificationEventConditionID?: string|null,
     *   notificationProfileID?: string|null,
     *   parameters?: list<Parameter>|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
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
     *   associatedRecordType?: string|null,
     *   associatedRecordTypeValue?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   notificationChannelID?: string|null,
     *   notificationEventConditionID?: string|null,
     *   notificationProfileID?: string|null,
     *   parameters?: list<Parameter>|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(NotificationSetting|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
