<?php

declare(strict_types=1);

namespace Telnyx\Regions\RegionListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   code?: string|null,
 *   createdAt?: string|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   supportedInterfaces?: list<string>|null,
 *   updatedAt?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * A code for the region.
     */
    #[Optional]
    public ?string $code;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * A name for the region.
     */
    #[Optional]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * List of interface types supported in this region.
     *
     * @var list<string>|null $supportedInterfaces
     */
    #[Optional('supported_interfaces', list: 'string')]
    public ?array $supportedInterfaces;

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
     * @param list<string> $supportedInterfaces
     */
    public static function with(
        ?string $code = null,
        ?string $createdAt = null,
        ?string $name = null,
        ?string $recordType = null,
        ?array $supportedInterfaces = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $supportedInterfaces && $self['supportedInterfaces'] = $supportedInterfaces;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * A code for the region.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

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
     * A name for the region.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * List of interface types supported in this region.
     *
     * @param list<string> $supportedInterfaces
     */
    public function withSupportedInterfaces(array $supportedInterfaces): self
    {
        $self = clone $this;
        $self['supportedInterfaces'] = $supportedInterfaces;

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
