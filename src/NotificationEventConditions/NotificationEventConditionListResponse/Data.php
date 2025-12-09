<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions\NotificationEventConditionListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data\AssociatedRecordType;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data\Parameter;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   allowMultipleChannels?: bool|null,
 *   associatedRecordType?: value-of<AssociatedRecordType>|null,
 *   asynchronous?: bool|null,
 *   createdAt?: \DateTimeInterface|null,
 *   description?: string|null,
 *   enabled?: bool|null,
 *   name?: string|null,
 *   notificationEventID?: string|null,
 *   parameters?: list<Parameter>|null,
 *   supportedChannels?: list<string>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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
     * @param AssociatedRecordType|value-of<AssociatedRecordType> $associatedRecordType
     * @param list<Parameter|array{
     *   dataType?: string|null, name?: string|null, optional?: bool|null
     * }> $parameters
     * @param list<string> $supportedChannels
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $allowMultipleChannels && $obj['allowMultipleChannels'] = $allowMultipleChannels;
        null !== $associatedRecordType && $obj['associatedRecordType'] = $associatedRecordType;
        null !== $asynchronous && $obj['asynchronous'] = $asynchronous;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $description && $obj['description'] = $description;
        null !== $enabled && $obj['enabled'] = $enabled;
        null !== $name && $obj['name'] = $name;
        null !== $notificationEventID && $obj['notificationEventID'] = $notificationEventID;
        null !== $parameters && $obj['parameters'] = $parameters;
        null !== $supportedChannels && $obj['supportedChannels'] = $supportedChannels;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * A UUID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Dictates whether a notification channel id needs to be provided when creating a notficiation setting.
     */
    public function withAllowMultipleChannels(bool $allowMultipleChannels): self
    {
        $obj = clone $this;
        $obj['allowMultipleChannels'] = $allowMultipleChannels;

        return $obj;
    }

    /**
     * @param AssociatedRecordType|value-of<AssociatedRecordType> $associatedRecordType
     */
    public function withAssociatedRecordType(
        AssociatedRecordType|string $associatedRecordType
    ): self {
        $obj = clone $this;
        $obj['associatedRecordType'] = $associatedRecordType;

        return $obj;
    }

    /**
     * Dictates whether a notification setting will take effect immediately.
     */
    public function withAsynchronous(bool $asynchronous): self
    {
        $obj = clone $this;
        $obj['asynchronous'] = $asynchronous;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withEnabled(bool $enabled): self
    {
        $obj = clone $this;
        $obj['enabled'] = $enabled;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withNotificationEventID(string $notificationEventID): self
    {
        $obj = clone $this;
        $obj['notificationEventID'] = $notificationEventID;

        return $obj;
    }

    /**
     * @param list<Parameter|array{
     *   dataType?: string|null, name?: string|null, optional?: bool|null
     * }> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $obj = clone $this;
        $obj['parameters'] = $parameters;

        return $obj;
    }

    /**
     * Dictates the supported notification channel types that can be emitted.
     *
     * @param list<string> $supportedChannels
     */
    public function withSupportedChannels(array $supportedChannels): self
    {
        $obj = clone $this;
        $obj['supportedChannels'] = $supportedChannels;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
