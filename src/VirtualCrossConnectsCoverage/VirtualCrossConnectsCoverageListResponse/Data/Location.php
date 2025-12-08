<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type LocationShape = array{
 *   code?: string|null,
 *   name?: string|null,
 *   pop?: string|null,
 *   region?: string|null,
 *   site?: string|null,
 * }
 */
final class Location implements BaseModel
{
    /** @use SdkModel<LocationShape> */
    use SdkModel;

    /**
     * Location code.
     */
    #[Optional]
    public ?string $code;

    /**
     * Human readable name of location.
     */
    #[Optional]
    public ?string $name;

    /**
     * Point of presence of location.
     */
    #[Optional]
    public ?string $pop;

    /**
     * Identifies the geographical region of location.
     */
    #[Optional]
    public ?string $region;

    /**
     * Site of location.
     */
    #[Optional]
    public ?string $site;

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
        ?string $code = null,
        ?string $name = null,
        ?string $pop = null,
        ?string $region = null,
        ?string $site = null,
    ): self {
        $obj = new self;

        null !== $code && $obj['code'] = $code;
        null !== $name && $obj['name'] = $name;
        null !== $pop && $obj['pop'] = $pop;
        null !== $region && $obj['region'] = $region;
        null !== $site && $obj['site'] = $site;

        return $obj;
    }

    /**
     * Location code.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    /**
     * Human readable name of location.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Point of presence of location.
     */
    public function withPop(string $pop): self
    {
        $obj = clone $this;
        $obj['pop'] = $pop;

        return $obj;
    }

    /**
     * Identifies the geographical region of location.
     */
    public function withRegion(string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }

    /**
     * Site of location.
     */
    public function withSite(string $site): self
    {
        $obj = clone $this;
        $obj['site'] = $site;

        return $obj;
    }
}
