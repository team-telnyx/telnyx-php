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
 * @phpstan-import-type ParameterShape from \Telnyx\NotificationSettings\NotificationSettingCreateParams\Parameter
 *
 * @phpstan-type NotificationSettingCreateParamsShape = array{
 *   notificationChannelID?: string|null,
 *   notificationEventConditionID?: string|null,
 *   notificationProfileID?: string|null,
 *   parameters?: list<ParameterShape>|null,
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
     * @param list<ParameterShape>|null $parameters
     */
    public static function with(
        ?string $notificationChannelID = null,
        ?string $notificationEventConditionID = null,
        ?string $notificationProfileID = null,
        ?array $parameters = null,
    ): self {
        $self = new self;

        null !== $notificationChannelID && $self['notificationChannelID'] = $notificationChannelID;
        null !== $notificationEventConditionID && $self['notificationEventConditionID'] = $notificationEventConditionID;
        null !== $notificationProfileID && $self['notificationProfileID'] = $notificationProfileID;
        null !== $parameters && $self['parameters'] = $parameters;

        return $self;
    }

    /**
     * A UUID reference to the associated Notification Channel.
     */
    public function withNotificationChannelID(
        string $notificationChannelID
    ): self {
        $self = clone $this;
        $self['notificationChannelID'] = $notificationChannelID;

        return $self;
    }

    /**
     * A UUID reference to the associated Notification Event Condition.
     */
    public function withNotificationEventConditionID(
        string $notificationEventConditionID
    ): self {
        $self = clone $this;
        $self['notificationEventConditionID'] = $notificationEventConditionID;

        return $self;
    }

    /**
     * A UUID reference to the associated Notification Profile.
     */
    public function withNotificationProfileID(
        string $notificationProfileID
    ): self {
        $self = clone $this;
        $self['notificationProfileID'] = $notificationProfileID;

        return $self;
    }

    /**
     * @param list<ParameterShape> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $self = clone $this;
        $self['parameters'] = $parameters;

        return $self;
    }
}
