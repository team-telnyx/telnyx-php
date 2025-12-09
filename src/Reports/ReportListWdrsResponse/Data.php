<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListWdrsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\ReportListWdrsResponse\Data\Cost;
use Telnyx\Reports\ReportListWdrsResponse\Data\Cost\Currency;
use Telnyx\Reports\ReportListWdrsResponse\Data\DownlinkData;
use Telnyx\Reports\ReportListWdrsResponse\Data\DownlinkData\Unit;
use Telnyx\Reports\ReportListWdrsResponse\Data\Rate;
use Telnyx\Reports\ReportListWdrsResponse\Data\UplinkData;

/**
 * @phpstan-type DataShape = array{
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
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $cost && $obj['cost'] = $cost;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $downlinkData && $obj['downlinkData'] = $downlinkData;
        null !== $durationSeconds && $obj['durationSeconds'] = $durationSeconds;
        null !== $imsi && $obj['imsi'] = $imsi;
        null !== $mcc && $obj['mcc'] = $mcc;
        null !== $mnc && $obj['mnc'] = $mnc;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $rate && $obj['rate'] = $rate;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $simCardID && $obj['simCardID'] = $simCardID;
        null !== $simGroupID && $obj['simGroupID'] = $simGroupID;
        null !== $simGroupName && $obj['simGroupName'] = $simGroupName;
        null !== $uplinkData && $obj['uplinkData'] = $uplinkData;

        return $obj;
    }

    /**
     * WDR id.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param Cost|array{
     *   amount?: string|null, currency?: value-of<Currency>|null
     * } $cost
     */
    public function withCost(Cost|array $cost): self
    {
        $obj = clone $this;
        $obj['cost'] = $cost;

        return $obj;
    }

    /**
     * Record created time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * @param DownlinkData|array{
     *   amount?: float|null, unit?: value-of<Unit>|null
     * } $downlinkData
     */
    public function withDownlinkData(DownlinkData|array $downlinkData): self
    {
        $obj = clone $this;
        $obj['downlinkData'] = $downlinkData;

        return $obj;
    }

    /**
     * Session duration in seconds.
     */
    public function withDurationSeconds(float $durationSeconds): self
    {
        $obj = clone $this;
        $obj['durationSeconds'] = $durationSeconds;

        return $obj;
    }

    /**
     * International mobile subscriber identity.
     */
    public function withImsi(string $imsi): self
    {
        $obj = clone $this;
        $obj['imsi'] = $imsi;

        return $obj;
    }

    /**
     * Mobile country code.
     */
    public function withMcc(string $mcc): self
    {
        $obj = clone $this;
        $obj['mcc'] = $mcc;

        return $obj;
    }

    /**
     * Mobile network code.
     */
    public function withMnc(string $mnc): self
    {
        $obj = clone $this;
        $obj['mnc'] = $mnc;

        return $obj;
    }

    /**
     * Phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * @param Rate|array{
     *   amount?: string|null,
     *   currency?: value-of<Rate\Currency>|null,
     * } $rate
     */
    public function withRate(Rate|array $rate): self
    {
        $obj = clone $this;
        $obj['rate'] = $rate;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Sim card unique identifier.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['simCardID'] = $simCardID;

        return $obj;
    }

    /**
     * Sim group unique identifier.
     */
    public function withSimGroupID(string $simGroupID): self
    {
        $obj = clone $this;
        $obj['simGroupID'] = $simGroupID;

        return $obj;
    }

    /**
     * Defined sim group name.
     */
    public function withSimGroupName(string $simGroupName): self
    {
        $obj = clone $this;
        $obj['simGroupName'] = $simGroupName;

        return $obj;
    }

    /**
     * @param UplinkData|array{
     *   amount?: float|null,
     *   unit?: value-of<UplinkData\Unit>|null,
     * } $uplinkData
     */
    public function withUplinkData(UplinkData|array $uplinkData): self
    {
        $obj = clone $this;
        $obj['uplinkData'] = $uplinkData;

        return $obj;
    }
}
