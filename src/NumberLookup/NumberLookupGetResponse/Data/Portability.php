<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability\LineType;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability\PortedStatus;

/**
 * @phpstan-type PortabilityShape = array{
 *   altspid?: string|null,
 *   altspidCarrierName?: string|null,
 *   altspidCarrierType?: string|null,
 *   city?: string|null,
 *   lineType?: null|LineType|value-of<LineType>,
 *   lrn?: string|null,
 *   ocn?: string|null,
 *   portedDate?: string|null,
 *   portedStatus?: null|PortedStatus|value-of<PortedStatus>,
 *   spid?: string|null,
 *   spidCarrierName?: string|null,
 *   spidCarrierType?: string|null,
 *   state?: string|null,
 * }
 */
final class Portability implements BaseModel
{
    /** @use SdkModel<PortabilityShape> */
    use SdkModel;

    /**
     * Alternative SPID (Service Provider ID). Often used when a carrier is using a number from another carrier.
     */
    #[Optional]
    public ?string $altspid;

    /**
     * Alternative service provider name.
     */
    #[Optional('altspid_carrier_name')]
    public ?string $altspidCarrierName;

    /**
     * Alternative service provider type.
     */
    #[Optional('altspid_carrier_type')]
    public ?string $altspidCarrierType;

    /**
     * City name extracted from the locality in the Local Exchange Routing Guide (LERG) database.
     */
    #[Optional]
    public ?string $city;

    /**
     * The line type of the phone number. Uses the same value set as carrier.type; see the API reference for the full list.
     *
     * @var value-of<LineType>|null $lineType
     */
    #[Optional('line_type', enum: LineType::class)]
    public ?string $lineType;

    /**
     * Local Routing Number, if assigned to the requested phone number.
     */
    #[Optional]
    public ?string $lrn;

    /**
     * Operating Company Name (OCN) as per the Local Exchange Routing Guide (LERG) database.
     */
    #[Optional]
    public ?string $ocn;

    /**
     * ISO-formatted date when the requested phone number has been ported.
     */
    #[Optional('ported_date')]
    public ?string $portedDate;

    /**
     * Indicates whether or not the requested phone number has been ported.
     *
     * @var value-of<PortedStatus>|null $portedStatus
     */
    #[Optional('ported_status', enum: PortedStatus::class)]
    public ?string $portedStatus;

    /**
     * SPID (Service Provider ID).
     */
    #[Optional]
    public ?string $spid;

    /**
     * Service provider name.
     */
    #[Optional('spid_carrier_name')]
    public ?string $spidCarrierName;

    /**
     * Service provider type.
     */
    #[Optional('spid_carrier_type')]
    public ?string $spidCarrierType;

    #[Optional]
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
     * @param LineType|value-of<LineType>|null $lineType
     * @param PortedStatus|value-of<PortedStatus>|null $portedStatus
     */
    public static function with(
        ?string $altspid = null,
        ?string $altspidCarrierName = null,
        ?string $altspidCarrierType = null,
        ?string $city = null,
        LineType|string|null $lineType = null,
        ?string $lrn = null,
        ?string $ocn = null,
        ?string $portedDate = null,
        PortedStatus|string|null $portedStatus = null,
        ?string $spid = null,
        ?string $spidCarrierName = null,
        ?string $spidCarrierType = null,
        ?string $state = null,
    ): self {
        $self = new self;

        null !== $altspid && $self['altspid'] = $altspid;
        null !== $altspidCarrierName && $self['altspidCarrierName'] = $altspidCarrierName;
        null !== $altspidCarrierType && $self['altspidCarrierType'] = $altspidCarrierType;
        null !== $city && $self['city'] = $city;
        null !== $lineType && $self['lineType'] = $lineType;
        null !== $lrn && $self['lrn'] = $lrn;
        null !== $ocn && $self['ocn'] = $ocn;
        null !== $portedDate && $self['portedDate'] = $portedDate;
        null !== $portedStatus && $self['portedStatus'] = $portedStatus;
        null !== $spid && $self['spid'] = $spid;
        null !== $spidCarrierName && $self['spidCarrierName'] = $spidCarrierName;
        null !== $spidCarrierType && $self['spidCarrierType'] = $spidCarrierType;
        null !== $state && $self['state'] = $state;

        return $self;
    }

    /**
     * Alternative SPID (Service Provider ID). Often used when a carrier is using a number from another carrier.
     */
    public function withAltspid(string $altspid): self
    {
        $self = clone $this;
        $self['altspid'] = $altspid;

        return $self;
    }

    /**
     * Alternative service provider name.
     */
    public function withAltspidCarrierName(string $altspidCarrierName): self
    {
        $self = clone $this;
        $self['altspidCarrierName'] = $altspidCarrierName;

        return $self;
    }

    /**
     * Alternative service provider type.
     */
    public function withAltspidCarrierType(string $altspidCarrierType): self
    {
        $self = clone $this;
        $self['altspidCarrierType'] = $altspidCarrierType;

        return $self;
    }

    /**
     * City name extracted from the locality in the Local Exchange Routing Guide (LERG) database.
     */
    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * The line type of the phone number. Uses the same value set as carrier.type; see the API reference for the full list.
     *
     * @param LineType|value-of<LineType> $lineType
     */
    public function withLineType(LineType|string $lineType): self
    {
        $self = clone $this;
        $self['lineType'] = $lineType;

        return $self;
    }

    /**
     * Local Routing Number, if assigned to the requested phone number.
     */
    public function withLrn(string $lrn): self
    {
        $self = clone $this;
        $self['lrn'] = $lrn;

        return $self;
    }

    /**
     * Operating Company Name (OCN) as per the Local Exchange Routing Guide (LERG) database.
     */
    public function withOcn(string $ocn): self
    {
        $self = clone $this;
        $self['ocn'] = $ocn;

        return $self;
    }

    /**
     * ISO-formatted date when the requested phone number has been ported.
     */
    public function withPortedDate(string $portedDate): self
    {
        $self = clone $this;
        $self['portedDate'] = $portedDate;

        return $self;
    }

    /**
     * Indicates whether or not the requested phone number has been ported.
     *
     * @param PortedStatus|value-of<PortedStatus> $portedStatus
     */
    public function withPortedStatus(PortedStatus|string $portedStatus): self
    {
        $self = clone $this;
        $self['portedStatus'] = $portedStatus;

        return $self;
    }

    /**
     * SPID (Service Provider ID).
     */
    public function withSpid(string $spid): self
    {
        $self = clone $this;
        $self['spid'] = $spid;

        return $self;
    }

    /**
     * Service provider name.
     */
    public function withSpidCarrierName(string $spidCarrierName): self
    {
        $self = clone $this;
        $self['spidCarrierName'] = $spidCarrierName;

        return $self;
    }

    /**
     * Service provider type.
     */
    public function withSpidCarrierType(string $spidCarrierType): self
    {
        $self = clone $this;
        $self['spidCarrierType'] = $spidCarrierType;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
