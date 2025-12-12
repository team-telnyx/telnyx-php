<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Brand\ExternalVetting;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalVettingListResponseItemShape = array{
 *   createDate?: string|null,
 *   evpID?: string|null,
 *   vettedDate?: string|null,
 *   vettingClass?: string|null,
 *   vettingID?: string|null,
 *   vettingScore?: int|null,
 *   vettingToken?: string|null,
 * }
 */
final class ExternalVettingListResponseItem implements BaseModel
{
    /** @use SdkModel<ExternalVettingListResponseItemShape> */
    use SdkModel;

    /**
     * Vetting submission date. This is the date when the vetting request is generated in ISO 8601 format.
     */
    #[Optional]
    public ?string $createDate;

    /**
     * External vetting provider ID for the brand.
     */
    #[Optional('evpId')]
    public ?string $evpID;

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
    #[Optional('vettingId')]
    public ?string $vettingID;

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
        ?string $evpID = null,
        ?string $vettedDate = null,
        ?string $vettingClass = null,
        ?string $vettingID = null,
        ?int $vettingScore = null,
        ?string $vettingToken = null,
    ): self {
        $self = new self;

        null !== $createDate && $self['createDate'] = $createDate;
        null !== $evpID && $self['evpID'] = $evpID;
        null !== $vettedDate && $self['vettedDate'] = $vettedDate;
        null !== $vettingClass && $self['vettingClass'] = $vettingClass;
        null !== $vettingID && $self['vettingID'] = $vettingID;
        null !== $vettingScore && $self['vettingScore'] = $vettingScore;
        null !== $vettingToken && $self['vettingToken'] = $vettingToken;

        return $self;
    }

    /**
     * Vetting submission date. This is the date when the vetting request is generated in ISO 8601 format.
     */
    public function withCreateDate(string $createDate): self
    {
        $self = clone $this;
        $self['createDate'] = $createDate;

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
     * Vetting effective date. This is the date when vetting was completed, or the starting effective date in ISO 8601 format. If this date is missing, then the vetting was not complete or not valid.
     */
    public function withVettedDate(string $vettedDate): self
    {
        $self = clone $this;
        $self['vettedDate'] = $vettedDate;

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
     * Vetting score ranging from 0-100.
     */
    public function withVettingScore(int $vettingScore): self
    {
        $self = clone $this;
        $self['vettingScore'] = $vettingScore;

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
