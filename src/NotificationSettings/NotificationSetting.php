<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationSettings\NotificationSetting\Parameter;
use Telnyx\NotificationSettings\NotificationSetting\Status;

/**
 * @phpstan-type notification_setting = array{
 *   id?: string,
 *   associatedRecordType?: string,
 *   associatedRecordTypeValue?: string,
 *   createdAt?: \DateTimeInterface,
 *   notificationChannelID?: string,
 *   notificationEventConditionID?: string,
 *   notificationProfileID?: string,
 *   parameters?: list<Parameter>,
 *   status?: value-of<Status>,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class NotificationSetting implements BaseModel
{
    /** @use SdkModel<notification_setting> */
    use SdkModel;

    /**
     * A UUID.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api('associated_record_type', optional: true)]
    public ?string $associatedRecordType;

    #[Api('associated_record_type_value', optional: true)]
    public ?string $associatedRecordTypeValue;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

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
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

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
        ?string $associatedRecordType = null,
        ?string $associatedRecordTypeValue = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $notificationChannelID = null,
        ?string $notificationEventConditionID = null,
        ?string $notificationProfileID = null,
        ?array $parameters = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $associatedRecordType && $obj->associatedRecordType = $associatedRecordType;
        null !== $associatedRecordTypeValue && $obj->associatedRecordTypeValue = $associatedRecordTypeValue;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $notificationChannelID && $obj->notificationChannelID = $notificationChannelID;
        null !== $notificationEventConditionID && $obj->notificationEventConditionID = $notificationEventConditionID;
        null !== $notificationProfileID && $obj->notificationProfileID = $notificationProfileID;
        null !== $parameters && $obj->parameters = $parameters;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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
        $obj->associatedRecordType = $associatedRecordType;

        return $obj;
    }

    public function withAssociatedRecordTypeValue(
        string $associatedRecordTypeValue
    ): self {
        $obj = clone $this;
        $obj->associatedRecordTypeValue = $associatedRecordTypeValue;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
