<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability\PortedStatus;

/**
 * @phpstan-type PortabilityShape = array{
 *   altspid?: string,
 *   altspidCarrierName?: string,
 *   altspidCarrierType?: string,
 *   city?: string,
 *   lineType?: string,
 *   lrn?: string,
 *   ocn?: string,
 *   portedDate?: string,
 *   portedStatus?: value-of<PortedStatus>,
 *   spid?: string,
 *   spidCarrierName?: string,
 *   spidCarrierType?: string,
 *   state?: string,
 * }
 */
final class Portability implements BaseModel
{
    /** @use SdkModel<PortabilityShape> */
    use SdkModel;

    /**
     * Alternative SPID (Service Provider ID). Often used when a carrier is using a number from another carrier.
     */
    #[Api(optional: true)]
    public ?string $altspid;

    /**
     * Alternative service provider name.
     */
    #[Api('altspid_carrier_name', optional: true)]
    public ?string $altspidCarrierName;

    /**
     * Alternative service provider type.
     */
    #[Api('altspid_carrier_type', optional: true)]
    public ?string $altspidCarrierType;

    /**
     * City name extracted from the locality in the Local Exchange Routing Guide (LERG) database.
     */
    #[Api(optional: true)]
    public ?string $city;

    /**
     * Type of number.
     */
    #[Api('line_type', optional: true)]
    public ?string $lineType;

    /**
     * Local Routing Number, if assigned to the requested phone number.
     */
    #[Api(optional: true)]
    public ?string $lrn;

    /**
     * Operating Company Name (OCN) as per the Local Exchange Routing Guide (LERG) database.
     */
    #[Api(optional: true)]
    public ?string $ocn;

    /**
     * ISO-formatted date when the requested phone number has been ported.
     */
    #[Api('ported_date', optional: true)]
    public ?string $portedDate;

    /**
     * Indicates whether or not the requested phone number has been ported.
     *
     * @var value-of<PortedStatus>|null $portedStatus
     */
    #[Api('ported_status', enum: PortedStatus::class, optional: true)]
    public ?string $portedStatus;

    /**
     * SPID (Service Provider ID).
     */
    #[Api(optional: true)]
    public ?string $spid;

    /**
     * Service provider name.
     */
    #[Api('spid_carrier_name', optional: true)]
    public ?string $spidCarrierName;

    /**
     * Service provider type.
     */
    #[Api('spid_carrier_type', optional: true)]
    public ?string $spidCarrierType;

    #[Api(optional: true)]
    public ?string $state;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortedStatus|value-of<PortedStatus> $portedStatus
     */
    public static function with(
        ?string $altspid = null,
        ?string $altspidCarrierName = null,
        ?string $altspidCarrierType = null,
        ?string $city = null,
        ?string $lineType = null,
        ?string $lrn = null,
        ?string $ocn = null,
        ?string $portedDate = null,
        PortedStatus|string|null $portedStatus = null,
        ?string $spid = null,
        ?string $spidCarrierName = null,
        ?string $spidCarrierType = null,
        ?string $state = null,
    ): self {
        $obj = new self;

        null !== $altspid && $obj->altspid = $altspid;
        null !== $altspidCarrierName && $obj->altspidCarrierName = $altspidCarrierName;
        null !== $altspidCarrierType && $obj->altspidCarrierType = $altspidCarrierType;
        null !== $city && $obj->city = $city;
        null !== $lineType && $obj->lineType = $lineType;
        null !== $lrn && $obj->lrn = $lrn;
        null !== $ocn && $obj->ocn = $ocn;
        null !== $portedDate && $obj->portedDate = $portedDate;
        null !== $portedStatus && $obj['portedStatus'] = $portedStatus;
        null !== $spid && $obj->spid = $spid;
        null !== $spidCarrierName && $obj->spidCarrierName = $spidCarrierName;
        null !== $spidCarrierType && $obj->spidCarrierType = $spidCarrierType;
        null !== $state && $obj->state = $state;

        return $obj;
    }

    /**
     * Alternative SPID (Service Provider ID). Often used when a carrier is using a number from another carrier.
     */
    public function withAltspid(string $altspid): self
    {
        $obj = clone $this;
        $obj->altspid = $altspid;

        return $obj;
    }

    /**
     * Alternative service provider name.
     */
    public function withAltspidCarrierName(string $altspidCarrierName): self
    {
        $obj = clone $this;
        $obj->altspidCarrierName = $altspidCarrierName;

        return $obj;
    }

    /**
     * Alternative service provider type.
     */
    public function withAltspidCarrierType(string $altspidCarrierType): self
    {
        $obj = clone $this;
        $obj->altspidCarrierType = $altspidCarrierType;

        return $obj;
    }

    /**
     * City name extracted from the locality in the Local Exchange Routing Guide (LERG) database.
     */
    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj->city = $city;

        return $obj;
    }

    /**
     * Type of number.
     */
    public function withLineType(string $lineType): self
    {
        $obj = clone $this;
        $obj->lineType = $lineType;

        return $obj;
    }

    /**
     * Local Routing Number, if assigned to the requested phone number.
     */
    public function withLrn(string $lrn): self
    {
        $obj = clone $this;
        $obj->lrn = $lrn;

        return $obj;
    }

    /**
     * Operating Company Name (OCN) as per the Local Exchange Routing Guide (LERG) database.
     */
    public function withOcn(string $ocn): self
    {
        $obj = clone $this;
        $obj->ocn = $ocn;

        return $obj;
    }

    /**
     * ISO-formatted date when the requested phone number has been ported.
     */
    public function withPortedDate(string $portedDate): self
    {
        $obj = clone $this;
        $obj->portedDate = $portedDate;

        return $obj;
    }

    /**
     * Indicates whether or not the requested phone number has been ported.
     *
     * @param PortedStatus|value-of<PortedStatus> $portedStatus
     */
    public function withPortedStatus(PortedStatus|string $portedStatus): self
    {
        $obj = clone $this;
        $obj['portedStatus'] = $portedStatus;

        return $obj;
    }

    /**
     * SPID (Service Provider ID).
     */
    public function withSpid(string $spid): self
    {
        $obj = clone $this;
        $obj->spid = $spid;

        return $obj;
    }

    /**
     * Service provider name.
     */
    public function withSpidCarrierName(string $spidCarrierName): self
    {
        $obj = clone $this;
        $obj->spidCarrierName = $spidCarrierName;

        return $obj;
    }

    /**
     * Service provider type.
     */
    public function withSpidCarrierType(string $spidCarrierType): self
    {
        $obj = clone $this;
        $obj->spidCarrierType = $spidCarrierType;

        return $obj;
    }

    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }
}
