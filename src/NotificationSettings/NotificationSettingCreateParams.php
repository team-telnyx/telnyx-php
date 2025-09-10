<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationSettings\NotificationSettingCreateParams\Parameter;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new NotificationSettingCreateParams); // set properties as needed
 * $client->notificationSettings->create(...$params->toArray());
 * ```
 * Add a notification setting.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->notificationSettings->create(...$params->toArray());`
 *
 * @see Telnyx\NotificationSettings->create
 *
 * @phpstan-type notification_setting_create_params = array{
 *   notificationChannelID?: string,
 *   notificationEventConditionID?: string,
 *   notificationProfileID?: string,
 *   parameters?: list<Parameter>,
 * }
 */
final class NotificationSettingCreateParams implements BaseModel
{
    /** @use SdkModel<notification_setting_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A UUID reference to the associated Notification Channel.
     */
    #[Api('notification_channel_id', optional: true)]
    public ?string $notificationChannelID;

    /**
     * A UUID reference to the associated Notification Event Condition.
     */
    #[Api('notification_event_condition_id', optional: true)]
    public ?string $notificationEventConditionID;

    /**
     * A UUID reference to the associated Notification Profile.
     */
    #[Api('notification_profile_id', optional: true)]
    public ?string $notificationProfileID;

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
        ?string $notificationChannelID = null,
        ?string $notificationEventConditionID = null,
        ?string $notificationProfileID = null,
        ?array $parameters = null,
    ): self {
        $obj = new self;

        null !== $notificationChannelID && $obj->notificationChannelID = $notificationChannelID;
        null !== $notificationEventConditionID && $obj->notificationEventConditionID = $notificationEventConditionID;
        null !== $notificationProfileID && $obj->notificationProfileID = $notificationProfileID;
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
        $obj->notificationChannelID = $notificationChannelID;

        return $obj;
    }

    /**
     * A UUID reference to the associated Notification Event Condition.
     */
    public function withNotificationEventConditionID(
        string $notificationEventConditionID
    ): self {
        $obj = clone $this;
        $obj->notificationEventConditionID = $notificationEventConditionID;

        return $obj;
    }

    /**
     * A UUID reference to the associated Notification Profile.
     */
    public function withNotificationProfileID(
        string $notificationProfileID
    ): self {
        $obj = clone $this;
        $obj->notificationProfileID = $notificationProfileID;

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
