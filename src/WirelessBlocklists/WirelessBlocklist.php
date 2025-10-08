<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WirelessBlocklists\WirelessBlocklist\Type;

/**
 * @phpstan-type wireless_blocklist = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   type?: value-of<Type>|null,
 *   updatedAt?: string|null,
 *   values?: list<string>|null,
 * }
 */
final class WirelessBlocklist implements BaseModel
{
    /** @use SdkModel<wireless_blocklist> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * The wireless blocklist name.
     */
    #[Api(optional: true)]
    public ?string $name;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The type of the wireless blocklist.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

    /**
     * Values to block. The values here depend on the `type` of Wireless Blocklist.
     *
     * @var list<string>|null $values
     */
    #[Api(list: 'string', optional: true)]
    public ?array $values;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     * @param list<string> $values
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?string $name = null,
        ?string $recordType = null,
        Type|string|null $type = null,
        ?string $updatedAt = null,
        ?array $values = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $name && $obj->name = $name;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $type && $obj->type = $type instanceof Type ? $type->value : $type;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $values && $obj->values = $values;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The wireless blocklist name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The type of the wireless blocklist.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Values to block. The values here depend on the `type` of Wireless Blocklist.
     *
     * @param list<string> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj->values = $values;

        return $obj;
    }
}
