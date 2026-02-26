<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type LocationShape = array{
 *   id?: string|null,
 *   additionalInfo?: string|null,
 *   description?: string|null,
 *   isDefault?: bool|null,
 * }
 */
final class Location implements BaseModel
{
    /** @use SdkModel<LocationShape> */
    use SdkModel;

    /**
     * Uniquely identifies the resource.
     */
    #[Optional]
    public ?string $id;

    #[Optional('additional_info')]
    public ?string $additionalInfo;

    #[Optional]
    public ?string $description;

    /**
     * Represents whether the location is the default or not.
     */
    #[Optional('is_default')]
    public ?bool $isDefault;

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
        ?string $additionalInfo = null,
        ?string $description = null,
        ?bool $isDefault = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $additionalInfo && $self['additionalInfo'] = $additionalInfo;
        null !== $description && $self['description'] = $description;
        null !== $isDefault && $self['isDefault'] = $isDefault;

        return $self;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAdditionalInfo(string $additionalInfo): self
    {
        $self = clone $this;
        $self['additionalInfo'] = $additionalInfo;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Represents whether the location is the default or not.
     */
    public function withIsDefault(bool $isDefault): self
    {
        $self = clone $this;
        $self['isDefault'] = $isDefault;

        return $self;
    }
}
