<?php

declare(strict_types=1);

namespace Telnyx\Brand\ExternalVetting;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Order new external vetting for a brand.
 *
 * @see Telnyx\Services\Brand\ExternalVettingService::order()
 *
 * @phpstan-type ExternalVettingOrderParamsShape = array{
 *   evpId: string, vettingClass: string
 * }
 */
final class ExternalVettingOrderParams implements BaseModel
{
    /** @use SdkModel<ExternalVettingOrderParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * External vetting provider ID for the brand.
     */
    #[Required]
    public string $evpId;

    /**
     * Identifies the vetting classification.
     */
    #[Required]
    public string $vettingClass;

    /**
     * `new ExternalVettingOrderParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalVettingOrderParams::with(evpId: ..., vettingClass: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalVettingOrderParams)->withEvpID(...)->withVettingClass(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $evpId, string $vettingClass): self
    {
        $obj = new self;

        $obj['evpId'] = $evpId;
        $obj['vettingClass'] = $vettingClass;

        return $obj;
    }

    /**
     * External vetting provider ID for the brand.
     */
    public function withEvpID(string $evpID): self
    {
        $obj = clone $this;
        $obj['evpId'] = $evpID;

        return $obj;
    }

    /**
     * Identifies the vetting classification.
     */
    public function withVettingClass(string $vettingClass): self
    {
        $obj = clone $this;
        $obj['vettingClass'] = $vettingClass;

        return $obj;
    }
}
