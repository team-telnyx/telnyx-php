<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type LocationShape = array{
 *   id?: string, additionalInfo?: string, description?: string, isDefault?: bool
 * }
 */
final class Location implements BaseModel
{
    /** @use SdkModel<LocationShape> */
    use SdkModel;

    /**
     * Uniquely identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api('additional_info', optional: true)]
    public ?string $additionalInfo;

    #[Api(optional: true)]
    public ?string $description;

    /**
     * Represents whether the location is the default or not.
     */
    #[Api('is_default', optional: true)]
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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $additionalInfo && $obj->additionalInfo = $additionalInfo;
        null !== $description && $obj->description = $description;
        null !== $isDefault && $obj->isDefault = $isDefault;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withAdditionalInfo(string $additionalInfo): self
    {
        $obj = clone $this;
        $obj->additionalInfo = $additionalInfo;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Represents whether the location is the default or not.
     */
    public function withIsDefault(bool $isDefault): self
    {
        $obj = clone $this;
        $obj->isDefault = $isDefault;

        return $obj;
    }
}
