<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardGetPublicIPResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardGetPublicIPResponse\Data\Type;

/**
 * @phpstan-type DataShape = array{
 *   createdAt?: string|null,
 *   ip?: string|null,
 *   recordType?: string|null,
 *   regionCode?: string|null,
 *   simCardID?: string|null,
 *   type?: null|Type|value-of<Type>,
 *   updatedAt?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * The provisioned IP address. This attribute will only be available when underlying resource status is in a "provisioned" status.
     */
    #[Optional]
    public ?string $ip;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('region_code')]
    public ?string $regionCode;

    #[Optional('sim_card_id')]
    public ?string $simCardID;

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
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
     * @param Type|value-of<Type>|null $type
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
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $ip && $self['ip'] = $ip;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $regionCode && $self['regionCode'] = $regionCode;
        null !== $simCardID && $self['simCardID'] = $simCardID;
        null !== $type && $self['type'] = $type;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The provisioned IP address. This attribute will only be available when underlying resource status is in a "provisioned" status.
     */
    public function withIP(string $ip): self
    {
        $self = clone $this;
        $self['ip'] = $ip;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }

    public function withSimCardID(string $simCardID): self
    {
        $self = clone $this;
        $self['simCardID'] = $simCardID;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
