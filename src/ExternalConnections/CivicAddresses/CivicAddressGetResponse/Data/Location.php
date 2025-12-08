<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type LocationShape = array{
 *   id?: string|null,
 *   additional_info?: string|null,
 *   description?: string|null,
 *   is_default?: bool|null,
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

    #[Optional]
    public ?string $additional_info;

    #[Optional]
    public ?string $description;

    /**
     * Represents whether the location is the default or not.
     */
    #[Optional]
    public ?bool $is_default;

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
        ?string $additional_info = null,
        ?string $description = null,
        ?bool $is_default = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $additional_info && $obj['additional_info'] = $additional_info;
        null !== $description && $obj['description'] = $description;
        null !== $is_default && $obj['is_default'] = $is_default;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withAdditionalInfo(string $additionalInfo): self
    {
        $obj = clone $this;
        $obj['additional_info'] = $additionalInfo;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Represents whether the location is the default or not.
     */
    public function withIsDefault(bool $isDefault): self
    {
        $obj = clone $this;
        $obj['is_default'] = $isDefault;

        return $obj;
    }
}
