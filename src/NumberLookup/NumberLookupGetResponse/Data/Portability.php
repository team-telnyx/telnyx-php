<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability\PortedStatus;

/**
 * @phpstan-type PortabilityShape = array{
 *   altspid?: string|null,
 *   altspid_carrier_name?: string|null,
 *   altspid_carrier_type?: string|null,
 *   city?: string|null,
 *   line_type?: string|null,
 *   lrn?: string|null,
 *   ocn?: string|null,
 *   ported_date?: string|null,
 *   ported_status?: value-of<PortedStatus>|null,
 *   spid?: string|null,
 *   spid_carrier_name?: string|null,
 *   spid_carrier_type?: string|null,
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
    #[Optional]
    public ?string $altspid_carrier_name;

    /**
     * Alternative service provider type.
     */
    #[Optional]
    public ?string $altspid_carrier_type;

    /**
     * City name extracted from the locality in the Local Exchange Routing Guide (LERG) database.
     */
    #[Optional]
    public ?string $city;

    /**
     * Type of number.
     */
    #[Optional]
    public ?string $line_type;

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
    #[Optional]
    public ?string $ported_date;

    /**
     * Indicates whether or not the requested phone number has been ported.
     *
     * @var value-of<PortedStatus>|null $ported_status
     */
    #[Optional(enum: PortedStatus::class)]
    public ?string $ported_status;

    /**
     * SPID (Service Provider ID).
     */
    #[Optional]
    public ?string $spid;

    /**
     * Service provider name.
     */
    #[Optional]
    public ?string $spid_carrier_name;

    /**
     * Service provider type.
     */
    #[Optional]
    public ?string $spid_carrier_type;

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
     * @param PortedStatus|value-of<PortedStatus> $ported_status
     */
    public static function with(
        ?string $altspid = null,
        ?string $altspid_carrier_name = null,
        ?string $altspid_carrier_type = null,
        ?string $city = null,
        ?string $line_type = null,
        ?string $lrn = null,
        ?string $ocn = null,
        ?string $ported_date = null,
        PortedStatus|string|null $ported_status = null,
        ?string $spid = null,
        ?string $spid_carrier_name = null,
        ?string $spid_carrier_type = null,
        ?string $state = null,
    ): self {
        $obj = new self;

        null !== $altspid && $obj['altspid'] = $altspid;
        null !== $altspid_carrier_name && $obj['altspid_carrier_name'] = $altspid_carrier_name;
        null !== $altspid_carrier_type && $obj['altspid_carrier_type'] = $altspid_carrier_type;
        null !== $city && $obj['city'] = $city;
        null !== $line_type && $obj['line_type'] = $line_type;
        null !== $lrn && $obj['lrn'] = $lrn;
        null !== $ocn && $obj['ocn'] = $ocn;
        null !== $ported_date && $obj['ported_date'] = $ported_date;
        null !== $ported_status && $obj['ported_status'] = $ported_status;
        null !== $spid && $obj['spid'] = $spid;
        null !== $spid_carrier_name && $obj['spid_carrier_name'] = $spid_carrier_name;
        null !== $spid_carrier_type && $obj['spid_carrier_type'] = $spid_carrier_type;
        null !== $state && $obj['state'] = $state;

        return $obj;
    }

    /**
     * Alternative SPID (Service Provider ID). Often used when a carrier is using a number from another carrier.
     */
    public function withAltspid(string $altspid): self
    {
        $obj = clone $this;
        $obj['altspid'] = $altspid;

        return $obj;
    }

    /**
     * Alternative service provider name.
     */
    public function withAltspidCarrierName(string $altspidCarrierName): self
    {
        $obj = clone $this;
        $obj['altspid_carrier_name'] = $altspidCarrierName;

        return $obj;
    }

    /**
     * Alternative service provider type.
     */
    public function withAltspidCarrierType(string $altspidCarrierType): self
    {
        $obj = clone $this;
        $obj['altspid_carrier_type'] = $altspidCarrierType;

        return $obj;
    }

    /**
     * City name extracted from the locality in the Local Exchange Routing Guide (LERG) database.
     */
    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj['city'] = $city;

        return $obj;
    }

    /**
     * Type of number.
     */
    public function withLineType(string $lineType): self
    {
        $obj = clone $this;
        $obj['line_type'] = $lineType;

        return $obj;
    }

    /**
     * Local Routing Number, if assigned to the requested phone number.
     */
    public function withLrn(string $lrn): self
    {
        $obj = clone $this;
        $obj['lrn'] = $lrn;

        return $obj;
    }

    /**
     * Operating Company Name (OCN) as per the Local Exchange Routing Guide (LERG) database.
     */
    public function withOcn(string $ocn): self
    {
        $obj = clone $this;
        $obj['ocn'] = $ocn;

        return $obj;
    }

    /**
     * ISO-formatted date when the requested phone number has been ported.
     */
    public function withPortedDate(string $portedDate): self
    {
        $obj = clone $this;
        $obj['ported_date'] = $portedDate;

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
        $obj['ported_status'] = $portedStatus;

        return $obj;
    }

    /**
     * SPID (Service Provider ID).
     */
    public function withSpid(string $spid): self
    {
        $obj = clone $this;
        $obj['spid'] = $spid;

        return $obj;
    }

    /**
     * Service provider name.
     */
    public function withSpidCarrierName(string $spidCarrierName): self
    {
        $obj = clone $this;
        $obj['spid_carrier_name'] = $spidCarrierName;

        return $obj;
    }

    /**
     * Service provider type.
     */
    public function withSpidCarrierType(string $spidCarrierType): self
    {
        $obj = clone $this;
        $obj['spid_carrier_type'] = $spidCarrierType;

        return $obj;
    }

    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }
}
