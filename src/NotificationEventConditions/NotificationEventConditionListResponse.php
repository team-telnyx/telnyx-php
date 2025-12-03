<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\AssociatedRecordType;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Parameter;

/**
 * @phpstan-type NotificationEventConditionListResponseShape = array{
 *   id?: string|null,
 *   allow_multiple_channels?: bool|null,
 *   associated_record_type?: value-of<AssociatedRecordType>|null,
 *   asynchronous?: bool|null,
 *   created_at?: \DateTimeInterface|null,
 *   description?: string|null,
 *   enabled?: bool|null,
 *   name?: string|null,
 *   notification_event_id?: string|null,
 *   parameters?: list<Parameter>|null,
 *   supported_channels?: list<string>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class NotificationEventConditionListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NotificationEventConditionListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * A UUID.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Dictates whether a notification channel id needs to be provided when creating a notficiation setting.
     */
    #[Api(optional: true)]
    public ?bool $allow_multiple_channels;

    /** @var value-of<AssociatedRecordType>|null $associated_record_type */
    #[Api(enum: AssociatedRecordType::class, optional: true)]
    public ?string $associated_record_type;

    /**
     * Dictates whether a notification setting will take effect immediately.
     */
    #[Api(optional: true)]
    public ?bool $asynchronous;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?bool $enabled;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $notification_event_id;

    /** @var list<Parameter>|null $parameters */
    #[Api(list: Parameter::class, optional: true)]
    public ?array $parameters;

    /**
     * Dictates the supported notification channel types that can be emitted.
     *
     * @var list<string>|null $supported_channels
     */
    #[Api(list: 'string', optional: true)]
    public ?array $supported_channels;

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
     * @param AssociatedRecordType|value-of<AssociatedRecordType> $associated_record_type
     * @param list<Parameter> $parameters
     * @param list<string> $supported_channels
     */
    public static function with(
        ?string $id = null,
        ?bool $allow_multiple_channels = null,
        AssociatedRecordType|string|null $associated_record_type = null,
        ?bool $asynchronous = null,
        ?\DateTimeInterface $created_at = null,
        ?string $description = null,
        ?bool $enabled = null,
        ?string $name = null,
        ?string $notification_event_id = null,
        ?array $parameters = null,
        ?array $supported_channels = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $allow_multiple_channels && $obj->allow_multiple_channels = $allow_multiple_channels;
        null !== $associated_record_type && $obj['associated_record_type'] = $associated_record_type;
        null !== $asynchronous && $obj->asynchronous = $asynchronous;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $description && $obj->description = $description;
        null !== $enabled && $obj->enabled = $enabled;
        null !== $name && $obj->name = $name;
        null !== $notification_event_id && $obj->notification_event_id = $notification_event_id;
        null !== $parameters && $obj->parameters = $parameters;
        null !== $supported_channels && $obj->supported_channels = $supported_channels;
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

    /**
     * Dictates whether a notification channel id needs to be provided when creating a notficiation setting.
     */
    public function withAllowMultipleChannels(bool $allowMultipleChannels): self
    {
        $obj = clone $this;
        $obj->allow_multiple_channels = $allowMultipleChannels;

        return $obj;
    }

    /**
     * @param AssociatedRecordType|value-of<AssociatedRecordType> $associatedRecordType
     */
    public function withAssociatedRecordType(
        AssociatedRecordType|string $associatedRecordType
    ): self {
        $obj = clone $this;
        $obj['associated_record_type'] = $associatedRecordType;

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
        $obj->created_at = $createdAt;

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
        $obj->notification_event_id = $notificationEventID;

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
        $obj->supported_channels = $supportedChannels;

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
