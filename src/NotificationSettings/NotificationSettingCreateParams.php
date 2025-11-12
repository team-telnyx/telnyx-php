<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings;

use Telnyx\Core\Attributes\Api;
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
 *   notification_channel_id?: string,
 *   notification_event_condition_id?: string,
 *   notification_profile_id?: string,
 *   parameters?: list<Parameter>,
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
    #[Api(optional: true)]
    public ?string $notification_channel_id;

    /**
     * A UUID reference to the associated Notification Event Condition.
     */
    #[Api(optional: true)]
    public ?string $notification_event_condition_id;

    /**
     * A UUID reference to the associated Notification Profile.
     */
    #[Api(optional: true)]
    public ?string $notification_profile_id;

    /** @var list<Parameter>|null $parameters */
    #[Api(list: Parameter::class, optional: true)]
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
     * @param list<Parameter> $parameters
     */
    public static function with(
        ?string $notification_channel_id = null,
        ?string $notification_event_condition_id = null,
        ?string $notification_profile_id = null,
        ?array $parameters = null,
    ): self {
        $obj = new self;

        null !== $notification_channel_id && $obj->notification_channel_id = $notification_channel_id;
        null !== $notification_event_condition_id && $obj->notification_event_condition_id = $notification_event_condition_id;
        null !== $notification_profile_id && $obj->notification_profile_id = $notification_profile_id;
        null !== $parameters && $obj->parameters = $parameters;

        return $obj;
    }

    /**
     * A UUID reference to the associated Notification Channel.
     */
    public function withNotificationChannelID(
        string $notificationChannelID
    ): self {
        $obj = clone $this;
        $obj->notification_channel_id = $notificationChannelID;

        return $obj;
    }

    /**
     * A UUID reference to the associated Notification Event Condition.
     */
    public function withNotificationEventConditionID(
        string $notificationEventConditionID
    ): self {
        $obj = clone $this;
        $obj->notification_event_condition_id = $notificationEventConditionID;

        return $obj;
    }

    /**
     * A UUID reference to the associated Notification Profile.
     */
    public function withNotificationProfileID(
        string $notificationProfileID
    ): self {
        $obj = clone $this;
        $obj->notification_profile_id = $notificationProfileID;

        return $obj;
    }

    /**
     * @param list<Parameter> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $obj = clone $this;
        $obj->parameters = $parameters;

        return $obj;
    }
}
