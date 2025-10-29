<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions\NotificationEventConditionListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data\AssociatedRecordType;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data\Parameter;

/**
 * @phpstan-type DataShape = array{
 *   id?: string,
 *   allowMultipleChannels?: bool,
 *   associatedRecordType?: value-of<AssociatedRecordType>,
 *   asynchronous?: bool,
 *   createdAt?: \DateTimeInterface,
 *   description?: string,
 *   enabled?: bool,
 *   name?: string,
 *   notificationEventID?: string,
 *   parameters?: list<Parameter>,
 *   supportedChannels?: list<string>,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * A UUID.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Dictates whether a notification channel id needs to be provided when creating a notficiation setting.
     */
    #[Api('allow_multiple_channels', optional: true)]
    public ?bool $allowMultipleChannels;

    /** @var value-of<AssociatedRecordType>|null $associatedRecordType */
    #[Api(
        'associated_record_type',
        enum: AssociatedRecordType::class,
        optional: true
    )]
    public ?string $associatedRecordType;

    /**
     * Dictates whether a notification setting will take effect immediately.
     */
    #[Api(optional: true)]
    public ?bool $asynchronous;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?bool $enabled;

    #[Api(optional: true)]
    public ?string $name;

    #[Api('notification_event_id', optional: true)]
    public ?string $notificationEventID;

    /** @var list<Parameter>|null $parameters */
    #[Api(list: Parameter::class, optional: true)]
    public ?array $parameters;

    /**
     * Dictates the supported notification channel types that can be emitted.
     *
     * @var list<string>|null $supportedChannels
     */
    #[Api('supported_channels', list: 'string', optional: true)]
    public ?array $supportedChannels;

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
     * @param AssociatedRecordType|value-of<AssociatedRecordType> $associatedRecordType
     * @param list<Parameter> $parameters
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

        null !== $id && $obj->id = $id;
        null !== $allowMultipleChannels && $obj->allowMultipleChannels = $allowMultipleChannels;
        null !== $associatedRecordType && $obj['associatedRecordType'] = $associatedRecordType;
        null !== $asynchronous && $obj->asynchronous = $asynchronous;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $description && $obj->description = $description;
        null !== $enabled && $obj->enabled = $enabled;
        null !== $name && $obj->name = $name;
        null !== $notificationEventID && $obj->notificationEventID = $notificationEventID;
        null !== $parameters && $obj->parameters = $parameters;
        null !== $supportedChannels && $obj->supportedChannels = $supportedChannels;
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

    /**
     * Dictates whether a notification channel id needs to be provided when creating a notficiation setting.
     */
    public function withAllowMultipleChannels(bool $allowMultipleChannels): self
    {
        $obj = clone $this;
        $obj->allowMultipleChannels = $allowMultipleChannels;

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
        $obj->asynchronous = $asynchronous;

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

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withEnabled(bool $enabled): self
    {
        $obj = clone $this;
        $obj->enabled = $enabled;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withNotificationEventID(string $notificationEventID): self
    {
        $obj = clone $this;
        $obj->notificationEventID = $notificationEventID;

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
     * Dictates the supported notification channel types that can be emitted.
     *
     * @param list<string> $supportedChannels
     */
    public function withSupportedChannels(array $supportedChannels): self
    {
        $obj = clone $this;
        $obj->supportedChannels = $supportedChannels;

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
