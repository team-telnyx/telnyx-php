<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationSettings\NotificationSetting\Parameter;
use Telnyx\NotificationSettings\NotificationSetting\Status;

/**
 * @phpstan-type NotificationSettingShape = array{
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
 * }
 */
final class NotificationSetting implements BaseModel
{
    /** @use SdkModel<NotificationSettingShape> */
    use SdkModel;

    /**
     * A UUID.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?string $associated_record_type;

    #[Api(optional: true)]
    public ?string $associated_record_type_value;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

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

    /**
     * Most preferences apply immediately; however, other may needs to propagate.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $associated_record_type = null,
        ?string $associated_record_type_value = null,
        ?\DateTimeInterface $created_at = null,
        ?string $notification_channel_id = null,
        ?string $notification_event_condition_id = null,
        ?string $notification_profile_id = null,
        ?array $parameters = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $associated_record_type && $obj->associated_record_type = $associated_record_type;
        null !== $associated_record_type_value && $obj->associated_record_type_value = $associated_record_type_value;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $notification_channel_id && $obj->notification_channel_id = $notification_channel_id;
        null !== $notification_event_condition_id && $obj->notification_event_condition_id = $notification_event_condition_id;
        null !== $notification_profile_id && $obj->notification_profile_id = $notification_profile_id;
        null !== $parameters && $obj->parameters = $parameters;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * A UUID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withAssociatedRecordType(string $associatedRecordType): self
    {
        $obj = clone $this;
        $obj->associated_record_type = $associatedRecordType;

        return $obj;
    }

    public function withAssociatedRecordTypeValue(
        string $associatedRecordTypeValue
    ): self {
        $obj = clone $this;
        $obj->associated_record_type_value = $associatedRecordTypeValue;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

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

    /**
     * Most preferences apply immediately; however, other may needs to propagate.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
