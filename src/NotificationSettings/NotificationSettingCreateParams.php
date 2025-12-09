<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationSettings\NotificationSettingCreateParams\Parameter;

/**
 * Add a notification setting.
 *
 * @see Telnyx\Services\NotificationSettingsService::create()
 *
 * @phpstan-type NotificationSettingCreateParamsShape = array{
 *   notificationChannelID?: string,
 *   notificationEventConditionID?: string,
 *   notificationProfileID?: string,
 *   parameters?: list<Parameter|array{name?: string|null, value?: string|null}>,
 * }
 */
final class NotificationSettingCreateParams implements BaseModel
{
    /** @use SdkModel<NotificationSettingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A UUID reference to the associated Notification Channel.
     */
    #[Optional('notification_channel_id')]
    public ?string $notificationChannelID;

    /**
     * A UUID reference to the associated Notification Event Condition.
     */
    #[Optional('notification_event_condition_id')]
    public ?string $notificationEventConditionID;

    /**
     * A UUID reference to the associated Notification Profile.
     */
    #[Optional('notification_profile_id')]
    public ?string $notificationProfileID;

    /** @var list<Parameter>|null $parameters */
    #[Optional(list: Parameter::class)]
    public ?array $parameters;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Parameter|array{
     *   name?: string|null, value?: string|null
     * }> $parameters
     */
    public static function with(
        ?string $notificationChannelID = null,
        ?string $notificationEventConditionID = null,
        ?string $notificationProfileID = null,
        ?array $parameters = null,
    ): self {
        $obj = new self;

        null !== $notificationChannelID && $obj['notificationChannelID'] = $notificationChannelID;
        null !== $notificationEventConditionID && $obj['notificationEventConditionID'] = $notificationEventConditionID;
        null !== $notificationProfileID && $obj['notificationProfileID'] = $notificationProfileID;
        null !== $parameters && $obj['parameters'] = $parameters;

        return $obj;
    }

    /**
     * A UUID reference to the associated Notification Channel.
     */
    public function withNotificationChannelID(
        string $notificationChannelID
    ): self {
        $obj = clone $this;
        $obj['notificationChannelID'] = $notificationChannelID;

        return $obj;
    }

    /**
     * A UUID reference to the associated Notification Event Condition.
     */
    public function withNotificationEventConditionID(
        string $notificationEventConditionID
    ): self {
        $obj = clone $this;
        $obj['notificationEventConditionID'] = $notificationEventConditionID;

        return $obj;
    }

    /**
     * A UUID reference to the associated Notification Profile.
     */
    public function withNotificationProfileID(
        string $notificationProfileID
    ): self {
        $obj = clone $this;
        $obj['notificationProfileID'] = $notificationProfileID;

        return $obj;
    }

    /**
     * @param list<Parameter|array{
     *   name?: string|null, value?: string|null
     * }> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $obj = clone $this;
        $obj['parameters'] = $parameters;

        return $obj;
    }
}
