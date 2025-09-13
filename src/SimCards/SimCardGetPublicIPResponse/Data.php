<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardGetPublicIPResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardGetPublicIPResponse\Data\Type;

/**
 * @phpstan-type data_alias = array{
 *   createdAt?: string,
 *   ip?: string,
 *   recordType?: string,
 *   regionCode?: string,
 *   simCardID?: string,
 *   type?: value-of<Type>,
 *   updatedAt?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * The provisioned IP address. This attribute will only be available when underlying resource status is in a "provisioned" status.
     */
    #[Api(optional: true)]
    public ?string $ip;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    #[Api('region_code', optional: true)]
    public ?string $regionCode;

    #[Api('sim_card_id', optional: true)]
    public ?string $simCardID;

    /** @var value-of<Type>|null $type */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

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
     */
    public static function with(
        ?string $createdAt = null,
        ?string $ip = null,
        ?string $recordType = null,
        ?string $regionCode = null,
        ?string $simCardID = null,
        Type|string|null $type = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $ip && $obj->ip = $ip;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $regionCode && $obj->regionCode = $regionCode;
        null !== $simCardID && $obj->simCardID = $simCardID;
        null !== $type && $obj->type = $type instanceof Type ? $type->value : $type;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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
     * The provisioned IP address. This attribute will only be available when underlying resource status is in a "provisioned" status.
     */
    public function withIP(string $ip): self
    {
        $obj = clone $this;
        $obj->ip = $ip;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }

    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj->simCardID = $simCardID;

        return $obj;
    }

    /**
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
}
