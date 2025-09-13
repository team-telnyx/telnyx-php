<?php

declare(strict_types=1);

namespace Telnyx\Brand\ExternalVetting;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type external_vetting_import_response = array{
 *   createDate?: string,
 *   evpID?: string,
 *   vettedDate?: string,
 *   vettingClass?: string,
 *   vettingID?: string,
 *   vettingScore?: int,
 *   vettingToken?: string,
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ExternalVettingImportResponse implements BaseModel
{
    /** @use SdkModel<external_vetting_import_response> */
    use SdkModel;

    /**
     * Vetting submission date. This is the date when the vetting request is generated in ISO 8601 format.
     */
    #[Api(optional: true)]
    public ?string $createDate;

    /**
     * External vetting provider ID for the brand.
     */
    #[Api('evpId', optional: true)]
    public ?string $evpID;

    /**
     * Vetting effective date. This is the date when vetting was completed, or the starting effective date in ISO 8601 format. If this date is missing, then the vetting was not complete or not valid.
     */
    #[Api(optional: true)]
    public ?string $vettedDate;

    /**
     * Identifies the vetting classification.
     */
    #[Api(optional: true)]
    public ?string $vettingClass;

    /**
     * Unique ID that identifies a vetting transaction performed by a vetting provider. This ID is provided by the vetting provider at time of vetting.
     */
    #[Api('vettingId', optional: true)]
    public ?string $vettingID;

    /**
     * Vetting score ranging from 0-100.
     */
    #[Api(optional: true)]
    public ?int $vettingScore;

    /**
     * Required by some providers for vetting record confirmation.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $createDate && $obj->createDate = $createDate;
        null !== $evpID && $obj->evpID = $evpID;
        null !== $vettedDate && $obj->vettedDate = $vettedDate;
        null !== $vettingClass && $obj->vettingClass = $vettingClass;
        null !== $vettingID && $obj->vettingID = $vettingID;
        null !== $vettingScore && $obj->vettingScore = $vettingScore;
        null !== $vettingToken && $obj->vettingToken = $vettingToken;

        return $obj;
    }

    /**
     * Vetting submission date. This is the date when the vetting request is generated in ISO 8601 format.
     */
    public function withCreateDate(string $createDate): self
    {
        $obj = clone $this;
        $obj->createDate = $createDate;

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
     * Vetting effective date. This is the date when vetting was completed, or the starting effective date in ISO 8601 format. If this date is missing, then the vetting was not complete or not valid.
     */
    public function withVettedDate(string $vettedDate): self
    {
        $obj = clone $this;
        $obj->vettedDate = $vettedDate;

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

    /**
     * Unique ID that identifies a vetting transaction performed by a vetting provider. This ID is provided by the vetting provider at time of vetting.
     */
    public function withVettingID(string $vettingID): self
    {
        $obj = clone $this;
        $obj->vettingID = $vettingID;

        return $obj;
    }

    /**
     * Vetting score ranging from 0-100.
     */
    public function withVettingScore(int $vettingScore): self
    {
        $obj = clone $this;
        $obj->vettingScore = $vettingScore;

        return $obj;
    }

    /**
     * Required by some providers for vetting record confirmation.
     */
    public function withVettingToken(string $vettingToken): self
    {
        $obj = clone $this;
        $obj->vettingToken = $vettingToken;

        return $obj;
    }
}
