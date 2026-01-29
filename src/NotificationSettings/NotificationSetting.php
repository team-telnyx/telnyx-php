<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationSettings\NotificationSetting\Parameter;
use Telnyx\NotificationSettings\NotificationSetting\Status;

/**
 * @phpstan-import-type ParameterShape from \Telnyx\NotificationSettings\NotificationSetting\Parameter
 *
 * @phpstan-type NotificationSettingShape = array{
 *   id?: string|null,
 *   associatedRecordType?: string|null,
 *   associatedRecordTypeValue?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   notificationChannelID?: string|null,
 *   notificationEventConditionID?: string|null,
 *   notificationProfileID?: string|null,
 *   parameters?: list<Parameter|ParameterShape>|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class NotificationSetting implements BaseModel
{
    /** @use SdkModel<NotificationSettingShape> */
    use SdkModel;

    /**
     * A UUID.
     */
    #[Optional]
    public ?string $id;

    #[Optional('associated_record_type')]
    public ?string $associatedRecordType;

    #[Optional('associated_record_type_value')]
    public ?string $associatedRecordTypeValue;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

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

    /**
     * Most preferences apply immediately; however, other may needs to propagate.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
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
     * @param list<Parameter|ParameterShape>|null $parameters
     * @param Status|value-of<Status>|null $status
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $associatedRecordType && $self['associatedRecordType'] = $associatedRecordType;
        null !== $associatedRecordTypeValue && $self['associatedRecordTypeValue'] = $associatedRecordTypeValue;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $notificationChannelID && $self['notificationChannelID'] = $notificationChannelID;
        null !== $notificationEventConditionID && $self['notificationEventConditionID'] = $notificationEventConditionID;
        null !== $notificationProfileID && $self['notificationProfileID'] = $notificationProfileID;
        null !== $parameters && $self['parameters'] = $parameters;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * A UUID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAssociatedRecordType(string $associatedRecordType): self
    {
        $self = clone $this;
        $self['associatedRecordType'] = $associatedRecordType;

        return $self;
    }

    public function withAssociatedRecordTypeValue(
        string $associatedRecordTypeValue
    ): self {
        $self = clone $this;
        $self['associatedRecordTypeValue'] = $associatedRecordTypeValue;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * @param list<Parameter|ParameterShape> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $self = clone $this;
        $self['parameters'] = $parameters;

        return $self;
    }

    /**
     * Most preferences apply immediately; however, other may needs to propagate.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
