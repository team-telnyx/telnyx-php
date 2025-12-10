<?php

declare(strict_types=1);

namespace Telnyx\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\ReportListWdrsResponse\Cost;
use Telnyx\Reports\ReportListWdrsResponse\Cost\Currency;
use Telnyx\Reports\ReportListWdrsResponse\DownlinkData;
use Telnyx\Reports\ReportListWdrsResponse\DownlinkData\Unit;
use Telnyx\Reports\ReportListWdrsResponse\Rate;
use Telnyx\Reports\ReportListWdrsResponse\UplinkData;

/**
 * @phpstan-type ReportListWdrsResponseShape = array{
 *   id?: string|null,
 *   cost?: Cost|null,
 *   createdAt?: \DateTimeInterface|null,
 *   downlinkData?: DownlinkData|null,
 *   durationSeconds?: float|null,
 *   imsi?: string|null,
 *   mcc?: string|null,
 *   mnc?: string|null,
 *   phoneNumber?: string|null,
 *   rate?: Rate|null,
 *   recordType?: string|null,
 *   simCardID?: string|null,
 *   simGroupID?: string|null,
 *   simGroupName?: string|null,
 *   uplinkData?: UplinkData|null,
 * }
 */
final class ReportListWdrsResponse implements BaseModel
{
    /** @use SdkModel<ReportListWdrsResponseShape> */
    use SdkModel;

    /**
     * WDR id.
     */
    #[Optional]
    public ?string $id;

    #[Optional]
    public ?Cost $cost;

    /**
     * Record created time.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('downlink_data')]
    public ?DownlinkData $downlinkData;

    /**
     * Session duration in seconds.
     */
    #[Optional('duration_seconds')]
    public ?float $durationSeconds;

    /**
     * International mobile subscriber identity.
     */
    #[Optional]
    public ?string $imsi;

    /**
     * Mobile country code.
     */
    #[Optional]
    public ?string $mcc;

    /**
     * Mobile network code.
     */
    #[Optional]
    public ?string $mnc;

    /**
     * Phone number.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    #[Optional]
    public ?Rate $rate;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Sim card unique identifier.
     */
    #[Optional('sim_card_id')]
    public ?string $simCardID;

    /**
     * Sim group unique identifier.
     */
    #[Optional('sim_group_id')]
    public ?string $simGroupID;

    /**
     * Defined sim group name.
     */
    #[Optional('sim_group_name')]
    public ?string $simGroupName;

    #[Optional('uplink_data')]
    public ?UplinkData $uplinkData;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Cost|array{
     *   amount?: string|null, currency?: value-of<Currency>|null
     * } $cost
     * @param DownlinkData|array{
     *   amount?: float|null, unit?: value-of<Unit>|null
     * } $downlinkData
     * @param Rate|array{
     *   amount?: string|null,
     *   currency?: value-of<Rate\Currency>|null,
     * } $rate
     * @param UplinkData|array{
     *   amount?: float|null,
     *   unit?: value-of<UplinkData\Unit>|null,
     * } $uplinkData
     */
    public static function with(
        ?string $id = null,
        Cost|array|null $cost = null,
        ?\DateTimeInterface $createdAt = null,
        DownlinkData|array|null $downlinkData = null,
        ?float $durationSeconds = null,
        ?string $imsi = null,
        ?string $mcc = null,
        ?string $mnc = null,
        ?string $phoneNumber = null,
        Rate|array|null $rate = null,
        ?string $recordType = null,
        ?string $simCardID = null,
        ?string $simGroupID = null,
        ?string $simGroupName = null,
        UplinkData|array|null $uplinkData = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $cost && $self['cost'] = $cost;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $downlinkData && $self['downlinkData'] = $downlinkData;
        null !== $durationSeconds && $self['durationSeconds'] = $durationSeconds;
        null !== $imsi && $self['imsi'] = $imsi;
        null !== $mcc && $self['mcc'] = $mcc;
        null !== $mnc && $self['mnc'] = $mnc;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $rate && $self['rate'] = $rate;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $simCardID && $self['simCardID'] = $simCardID;
        null !== $simGroupID && $self['simGroupID'] = $simGroupID;
        null !== $simGroupName && $self['simGroupName'] = $simGroupName;
        null !== $uplinkData && $self['uplinkData'] = $uplinkData;

        return $self;
    }

    /**
     * WDR id.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Cost|array{
     *   amount?: string|null, currency?: value-of<Currency>|null
     * } $cost
     */
    public function withCost(Cost|array $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Record created time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param DownlinkData|array{
     *   amount?: float|null, unit?: value-of<Unit>|null
     * } $downlinkData
     */
    public function withDownlinkData(DownlinkData|array $downlinkData): self
    {
        $self = clone $this;
        $self['downlinkData'] = $downlinkData;

        return $self;
    }

    /**
     * Session duration in seconds.
     */
    public function withDurationSeconds(float $durationSeconds): self
    {
        $self = clone $this;
        $self['durationSeconds'] = $durationSeconds;

        return $self;
    }

    /**
     * International mobile subscriber identity.
     */
    public function withImsi(string $imsi): self
    {
        $self = clone $this;
        $self['imsi'] = $imsi;

        return $self;
    }

    /**
     * Mobile country code.
     */
    public function withMcc(string $mcc): self
    {
        $self = clone $this;
        $self['mcc'] = $mcc;

        return $self;
    }

    /**
     * Mobile network code.
     */
    public function withMnc(string $mnc): self
    {
        $self = clone $this;
        $self['mnc'] = $mnc;

        return $self;
    }

    /**
     * Phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * @param Rate|array{
     *   amount?: string|null,
     *   currency?: value-of<Rate\Currency>|null,
     * } $rate
     */
    public function withRate(Rate|array $rate): self
    {
        $self = clone $this;
        $self['rate'] = $rate;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Sim card unique identifier.
     */
    public function withSimCardID(string $simCardID): self
    {
        $self = clone $this;
        $self['simCardID'] = $simCardID;

        return $self;
    }

    /**
     * Sim group unique identifier.
     */
    public function withSimGroupID(string $simGroupID): self
    {
        $self = clone $this;
        $self['simGroupID'] = $simGroupID;

        return $self;
    }

    /**
     * Defined sim group name.
     */
    public function withSimGroupName(string $simGroupName): self
    {
        $self = clone $this;
        $self['simGroupName'] = $simGroupName;

        return $self;
    }

    /**
     * @param UplinkData|array{
     *   amount?: float|null,
     *   unit?: value-of<UplinkData\Unit>|null,
     * } $uplinkData
     */
    public function withUplinkData(UplinkData|array $uplinkData): self
    {
        $self = clone $this;
        $self['uplinkData'] = $uplinkData;

        return $self;
    }
}
