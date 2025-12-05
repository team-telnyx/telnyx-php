<?php

declare(strict_types=1);

namespace Telnyx\Brand\ExternalVetting;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This operation can be used to import an external vetting record from a TCR-approved
 * vetting provider. If the vetting provider confirms validity of the record, it will be
 * saved with the brand and will be considered for future campaign qualification.
 *
 * @see Telnyx\Services\Brand\ExternalVettingService::import()
 *
 * @phpstan-type ExternalVettingImportParamsShape = array{
 *   evpId: string, vettingId: string, vettingToken?: string
 * }
 */
final class ExternalVettingImportParams implements BaseModel
{
    /** @use SdkModel<ExternalVettingImportParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * External vetting provider ID for the brand.
     */
    #[Api]
    public string $evpId;

    /**
     * Unique ID that identifies a vetting transaction performed by a vetting provider. This ID is provided by the vetting provider at time of vetting.
     */
    #[Api]
    public string $vettingId;

    /**
     * Required by some providers for vetting record confirmation.
     */
    #[Api(optional: true)]
    public ?string $vettingToken;

    /**
     * `new ExternalVettingImportParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalVettingImportParams::with(evpId: ..., vettingId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalVettingImportParams)->withEvpID(...)->withVettingID(...)
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
        string $evpId,
        string $vettingId,
        ?string $vettingToken = null
    ): self {
        $obj = new self;

        $obj['evpId'] = $evpId;
        $obj['vettingId'] = $vettingId;

        null !== $vettingToken && $obj['vettingToken'] = $vettingToken;

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
     * Unique ID that identifies a vetting transaction performed by a vetting provider. This ID is provided by the vetting provider at time of vetting.
     */
    public function withVettingID(string $vettingID): self
    {
        $obj = clone $this;
        $obj['vettingId'] = $vettingID;

        return $obj;
    }

    /**
     * Required by some providers for vetting record confirmation.
     */
    public function withVettingToken(string $vettingToken): self
    {
        $obj = clone $this;
        $obj['vettingToken'] = $vettingToken;

        return $obj;
    }
}
