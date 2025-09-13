<?php

declare(strict_types=1);

namespace Telnyx\NotificationEvents\NotificationEventListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object representing the available notifications.
 *
 * @phpstan-type data_alias = array{
 *   id?: string,
 *   createdAt?: \DateTimeInterface,
 *   enabled?: bool,
 *   name?: string,
 *   notificationCategory?: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * A UUID.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?bool $enabled;

    /**
     * A human readable name.
     */
    #[Api(optional: true)]
    public ?string $name;

    #[Api('notification_category', optional: true)]
    public ?string $notificationCategory;

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
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?bool $enabled = null,
        ?string $name = null,
        ?string $notificationCategory = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $enabled && $obj->enabled = $enabled;
        null !== $name && $obj->name = $name;
        null !== $notificationCategory && $obj->notificationCategory = $notificationCategory;
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
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withEnabled(bool $enabled): self
    {
        $obj = clone $this;
        $obj->enabled = $enabled;

        return $obj;
    }

    /**
     * A human readable name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withNotificationCategory(string $notificationCategory): self
    {
        $obj = clone $this;
        $obj->notificationCategory = $notificationCategory;

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
