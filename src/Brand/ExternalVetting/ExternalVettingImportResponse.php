<?php

declare(strict_types=1);

namespace Telnyx\Brand\ExternalVetting;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalVettingImportResponseShape = array{
 *   createDate?: string|null,
 *   evpId?: string|null,
 *   vettedDate?: string|null,
 *   vettingClass?: string|null,
 *   vettingId?: string|null,
 *   vettingScore?: int|null,
 *   vettingToken?: string|null,
 * }
 */
final class ExternalVettingImportResponse implements BaseModel
{
    /** @use SdkModel<ExternalVettingImportResponseShape> */
    use SdkModel;

    /**
     * Vetting submission date. This is the date when the vetting request is generated in ISO 8601 format.
     */
    #[Optional]
    public ?string $createDate;

    /**
     * External vetting provider ID for the brand.
     */
    #[Optional]
    public ?string $evpId;

    /**
     * Vetting effective date. This is the date when vetting was completed, or the starting effective date in ISO 8601 format. If this date is missing, then the vetting was not complete or not valid.
     */
    #[Optional]
    public ?string $vettedDate;

    /**
     * Identifies the vetting classification.
     */
    #[Optional]
    public ?string $vettingClass;

    /**
     * Unique ID that identifies a vetting transaction performed by a vetting provider. This ID is provided by the vetting provider at time of vetting.
     */
    #[Optional]
    public ?string $vettingId;

    /**
     * Vetting score ranging from 0-100.
     */
    #[Optional]
    public ?int $vettingScore;

    /**
     * Required by some providers for vetting record confirmation.
     */
    #[Optional]
    public ?string $vettingToken;

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
        ?string $createDate = null,
        ?string $evpId = null,
        ?string $vettedDate = null,
        ?string $vettingClass = null,
        ?string $vettingId = null,
        ?int $vettingScore = null,
        ?string $vettingToken = null,
    ): self {
        $obj = new self;

        null !== $createDate && $obj['createDate'] = $createDate;
        null !== $evpId && $obj['evpId'] = $evpId;
        null !== $vettedDate && $obj['vettedDate'] = $vettedDate;
        null !== $vettingClass && $obj['vettingClass'] = $vettingClass;
        null !== $vettingId && $obj['vettingId'] = $vettingId;
        null !== $vettingScore && $obj['vettingScore'] = $vettingScore;
        null !== $vettingToken && $obj['vettingToken'] = $vettingToken;

        return $obj;
    }

    /**
     * Vetting submission date. This is the date when the vetting request is generated in ISO 8601 format.
     */
    public function withCreateDate(string $createDate): self
    {
        $obj = clone $this;
        $obj['createDate'] = $createDate;

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
     * Vetting effective date. This is the date when vetting was completed, or the starting effective date in ISO 8601 format. If this date is missing, then the vetting was not complete or not valid.
     */
    public function withVettedDate(string $vettedDate): self
    {
        $obj = clone $this;
        $obj['vettedDate'] = $vettedDate;

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
     * Vetting score ranging from 0-100.
     */
    public function withVettingScore(int $vettingScore): self
    {
        $obj = clone $this;
        $obj['vettingScore'] = $vettingScore;

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
