<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\AssociatedRecordType;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Parameter;

/**
 * @phpstan-import-type ParameterShape from \Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Parameter
 *
 * @phpstan-type NotificationEventConditionListResponseShape = array{
 *   id?: string|null,
 *   allowMultipleChannels?: bool|null,
 *   associatedRecordType?: null|AssociatedRecordType|value-of<AssociatedRecordType>,
 *   asynchronous?: bool|null,
 *   createdAt?: \DateTimeInterface|null,
 *   description?: string|null,
 *   enabled?: bool|null,
 *   name?: string|null,
 *   notificationEventID?: string|null,
 *   parameters?: list<ParameterShape>|null,
 *   supportedChannels?: list<string>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class NotificationEventConditionListResponse implements BaseModel
{
    /** @use SdkModel<NotificationEventConditionListResponseShape> */
    use SdkModel;

    /**
     * A UUID.
     */
    #[Optional]
    public ?string $id;

    /**
     * Dictates whether a notification channel id needs to be provided when creating a notficiation setting.
     */
    #[Optional('allow_multiple_channels')]
    public ?bool $allowMultipleChannels;

    /** @var value-of<AssociatedRecordType>|null $associatedRecordType */
    #[Optional('associated_record_type', enum: AssociatedRecordType::class)]
    public ?string $associatedRecordType;

    /**
     * Dictates whether a notification setting will take effect immediately.
     */
    #[Optional]
    public ?bool $asynchronous;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?bool $enabled;

    #[Optional]
    public ?string $name;

    #[Optional('notification_event_id')]
    public ?string $notificationEventID;

    /** @var list<Parameter>|null $parameters */
    #[Optional(list: Parameter::class)]
    public ?array $parameters;

    /**
     * Dictates the supported notification channel types that can be emitted.
     *
     * @var list<string>|null $supportedChannels
     */
    #[Optional('supported_channels', list: 'string')]
    public ?array $supportedChannels;

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
     * @param AssociatedRecordType|value-of<AssociatedRecordType>|null $associatedRecordType
     * @param list<ParameterShape>|null $parameters
     * @param list<string>|null $supportedChannels
     */
    public static function with(
        ?string $id = null,
        ?bool $allowMultipleChannels = null,
        AssociatedRecordType|string|null $associatedRecordType = null,
        ?bool $asynchronous = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $description = null,
        ?bool $enabled = null,
        ?string $name = null,
        ?string $notificationEventID = null,
        ?array $parameters = null,
        ?array $supportedChannels = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $allowMultipleChannels && $self['allowMultipleChannels'] = $allowMultipleChannels;
        null !== $associatedRecordType && $self['associatedRecordType'] = $associatedRecordType;
        null !== $asynchronous && $self['asynchronous'] = $asynchronous;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $description && $self['description'] = $description;
        null !== $enabled && $self['enabled'] = $enabled;
        null !== $name && $self['name'] = $name;
        null !== $notificationEventID && $self['notificationEventID'] = $notificationEventID;
        null !== $parameters && $self['parameters'] = $parameters;
        null !== $supportedChannels && $self['supportedChannels'] = $supportedChannels;
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

    /**
     * Dictates whether a notification channel id needs to be provided when creating a notficiation setting.
     */
    public function withAllowMultipleChannels(bool $allowMultipleChannels): self
    {
        $self = clone $this;
        $self['allowMultipleChannels'] = $allowMultipleChannels;

        return $self;
    }

    /**
     * @param AssociatedRecordType|value-of<AssociatedRecordType> $associatedRecordType
     */
    public function withAssociatedRecordType(
        AssociatedRecordType|string $associatedRecordType
    ): self {
        $self = clone $this;
        $self['associatedRecordType'] = $associatedRecordType;

        return $self;
    }

    /**
     * Dictates whether a notification setting will take effect immediately.
     */
    public function withAsynchronous(bool $asynchronous): self
    {
        $self = clone $this;
        $self['asynchronous'] = $asynchronous;

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

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withNotificationEventID(string $notificationEventID): self
    {
        $self = clone $this;
        $self['notificationEventID'] = $notificationEventID;

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

    /**
     * Dictates the supported notification channel types that can be emitted.
     *
     * @param list<string> $supportedChannels
     */
    public function withSupportedChannels(array $supportedChannels): self
    {
        $self = clone $this;
        $self['supportedChannels'] = $supportedChannels;

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
