<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListWdrsResponse;

use Telnyx\Core\Attributes\Api;
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
 *   created_at?: \DateTimeInterface|null,
 *   downlink_data?: DownlinkData|null,
 *   duration_seconds?: float|null,
 *   imsi?: string|null,
 *   mcc?: string|null,
 *   mnc?: string|null,
 *   phone_number?: string|null,
 *   rate?: Rate|null,
 *   record_type?: string|null,
 *   sim_card_id?: string|null,
 *   sim_group_id?: string|null,
 *   sim_group_name?: string|null,
 *   uplink_data?: UplinkData|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * WDR id.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?Cost $cost;

    /**
     * Record created time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    #[Api(optional: true)]
    public ?DownlinkData $downlink_data;

    /**
     * Session duration in seconds.
     */
    #[Api(optional: true)]
    public ?float $duration_seconds;

    /**
     * International mobile subscriber identity.
     */
    #[Api(optional: true)]
    public ?string $imsi;

    /**
     * Mobile country code.
     */
    #[Api(optional: true)]
    public ?string $mcc;

    /**
     * Mobile network code.
     */
    #[Api(optional: true)]
    public ?string $mnc;

    /**
     * Phone number.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    #[Api(optional: true)]
    public ?Rate $rate;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * Sim card unique identifier.
     */
    #[Api(optional: true)]
    public ?string $sim_card_id;

    /**
     * Sim group unique identifier.
     */
    #[Api(optional: true)]
    public ?string $sim_group_id;

    /**
     * Defined sim group name.
     */
    #[Api(optional: true)]
    public ?string $sim_group_name;

    #[Api(optional: true)]
    public ?UplinkData $uplink_data;

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
     * } $downlink_data
     * @param Rate|array{
     *   amount?: string|null,
     *   currency?: value-of<Rate\Currency>|null,
     * } $rate
     * @param UplinkData|array{
     *   amount?: float|null,
     *   unit?: value-of<UplinkData\Unit>|null,
     * } $uplink_data
     */
    public static function with(
        ?string $id = null,
        Cost|array|null $cost = null,
        ?\DateTimeInterface $created_at = null,
        DownlinkData|array|null $downlink_data = null,
        ?float $duration_seconds = null,
        ?string $imsi = null,
        ?string $mcc = null,
        ?string $mnc = null,
        ?string $phone_number = null,
        Rate|array|null $rate = null,
        ?string $record_type = null,
        ?string $sim_card_id = null,
        ?string $sim_group_id = null,
        ?string $sim_group_name = null,
        UplinkData|array|null $uplink_data = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $cost && $obj['cost'] = $cost;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $downlink_data && $obj['downlink_data'] = $downlink_data;
        null !== $duration_seconds && $obj['duration_seconds'] = $duration_seconds;
        null !== $imsi && $obj['imsi'] = $imsi;
        null !== $mcc && $obj['mcc'] = $mcc;
        null !== $mnc && $obj['mnc'] = $mnc;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $rate && $obj['rate'] = $rate;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $sim_card_id && $obj['sim_card_id'] = $sim_card_id;
        null !== $sim_group_id && $obj['sim_group_id'] = $sim_group_id;
        null !== $sim_group_name && $obj['sim_group_name'] = $sim_group_name;
        null !== $uplink_data && $obj['uplink_data'] = $uplink_data;

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
        $obj['created_at'] = $createdAt;

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
        $obj['downlink_data'] = $downlinkData;

        return $obj;
    }

    /**
     * Session duration in seconds.
     */
    public function withDurationSeconds(float $durationSeconds): self
    {
        $obj = clone $this;
        $obj['duration_seconds'] = $durationSeconds;

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
        $obj['phone_number'] = $phoneNumber;

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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Sim card unique identifier.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['sim_card_id'] = $simCardID;

        return $obj;
    }

    /**
     * Sim group unique identifier.
     */
    public function withSimGroupID(string $simGroupID): self
    {
        $obj = clone $this;
        $obj['sim_group_id'] = $simGroupID;

        return $obj;
    }

    /**
     * Defined sim group name.
     */
    public function withSimGroupName(string $simGroupName): self
    {
        $obj = clone $this;
        $obj['sim_group_name'] = $simGroupName;

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
        $obj['uplink_data'] = $uplinkData;

        return $obj;
    }
}
