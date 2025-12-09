<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Brand\ExternalVetting;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Order new external vetting for a brand.
 *
 * @see Telnyx\Services\Number10dlc\Brand\ExternalVettingService::order()
 *
 * @phpstan-type ExternalVettingOrderParamsShape = array{
 *   evpID: string, vettingClass: string
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
    #[Required('evpId')]
    public string $evpID;

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
        $self = new self;

        $self['evpID'] = $evpID;
        $self['vettingClass'] = $vettingClass;

        return $self;
    }

    /**
     * External vetting provider ID for the brand.
     */
    public function withEvpID(string $evpID): self
    {
        $self = clone $this;
        $self['evpID'] = $evpID;

        return $self;
    }

    /**
     * Identifies the vetting classification.
     */
    public function withVettingClass(string $vettingClass): self
    {
        $self = clone $this;
        $self['vettingClass'] = $vettingClass;

        return $self;
    }
}
