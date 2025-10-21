<?php

declare(strict_types=1);

namespace Telnyx\Brand\ExternalVetting;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Order new external vetting for a brand.
 *
 * @see Telnyx\Brand\ExternalVetting->order
 *
 * @phpstan-type external_vetting_order_params = array{
 *   evpID: string, vettingClass: string
 * }
 */
final class ExternalVettingOrderParams implements BaseModel
{
    /** @use SdkModel<external_vetting_order_params> */
    use SdkModel;
    use SdkParams;

    /**
     * External vetting provider ID for the brand.
     */
    #[Api('evpId')]
    public string $evpID;

    /**
     * Identifies the vetting classification.
     */
    #[Api]
    public string $vettingClass;

    /**
     * `new ExternalVettingOrderParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalVettingOrderParams::with(evpID: ..., vettingClass: ...)
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
    public static function with(string $evpID, string $vettingClass): self
    {
        $obj = new self;

        $obj->evpID = $evpID;
        $obj->vettingClass = $vettingClass;

        return $obj;
    }

    /**
     * External vetting provider ID for the brand.
     */
    public function withEvpID(string $evpID): self
    {
        $obj = clone $this;
        $obj->evpID = $evpID;

        return $obj;
    }

    /**
     * Identifies the vetting classification.
     */
    public function withVettingClass(string $vettingClass): self
    {
        $obj = clone $this;
        $obj->vettingClass = $vettingClass;

        return $obj;
    }
}
