<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Brand\ExternalVetting;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This operation can be used to import an external vetting record from a TCR-approved
 * vetting provider. If the vetting provider confirms validity of the record, it will be
 * saved with the brand and will be considered for future campaign qualification.
 *
 * @see Telnyx\Services\Number10dlc\Brand\ExternalVettingService::imports()
 *
 * @phpstan-type ExternalVettingImportsParamsShape = array{
 *   evpID: string, vettingID: string, vettingToken?: string
 * }
 */
final class ExternalVettingImportsParams implements BaseModel
{
    /** @use SdkModel<ExternalVettingImportsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * External vetting provider ID for the brand.
     */
    #[Required('evpId')]
    public string $evpID;

    /**
     * Unique ID that identifies a vetting transaction performed by a vetting provider. This ID is provided by the vetting provider at time of vetting.
     */
    #[Required('vettingId')]
    public string $vettingID;

    /**
     * Required by some providers for vetting record confirmation.
     */
    #[Optional]
    public ?string $vettingToken;

    /**
     * `new ExternalVettingImportsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalVettingImportsParams::with(evpID: ..., vettingID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalVettingImportsParams)->withEvpID(...)->withVettingID(...)
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
    public static function with(
        string $evpID,
        string $vettingID,
        ?string $vettingToken = null
    ): self {
        $self = new self;

        $self['evpID'] = $evpID;
        $self['vettingID'] = $vettingID;

        null !== $vettingToken && $self['vettingToken'] = $vettingToken;

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
     * Unique ID that identifies a vetting transaction performed by a vetting provider. This ID is provided by the vetting provider at time of vetting.
     */
    public function withVettingID(string $vettingID): self
    {
        $self = clone $this;
        $self['vettingID'] = $vettingID;

        return $self;
    }

    /**
     * Required by some providers for vetting record confirmation.
     */
    public function withVettingToken(string $vettingToken): self
    {
        $self = clone $this;
        $self['vettingToken'] = $vettingToken;

        return $self;
    }
}
