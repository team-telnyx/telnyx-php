<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SimCardUsageDetailRecordShape = array{
 *   record_type: string,
 *   id?: string|null,
 *   closed_at?: \DateTimeInterface|null,
 *   created_at?: \DateTimeInterface|null,
 *   currency?: string|null,
 *   data_cost?: float|null,
 *   data_rate?: string|null,
 *   data_unit?: string|null,
 *   downlink_data?: float|null,
 *   imsi?: string|null,
 *   ip_address?: string|null,
 *   mcc?: string|null,
 *   mnc?: string|null,
 *   phone_number?: string|null,
 *   sim_card_id?: string|null,
 *   sim_card_tags?: string|null,
 *   sim_group_id?: string|null,
 *   sim_group_name?: string|null,
 *   uplink_data?: float|null,
 * }
 */
final class SimCardUsageDetailRecord implements BaseModel
{
    /** @use SdkModel<SimCardUsageDetailRecordShape> */
    use SdkModel;

    #[Required]
    public string $record_type;

    /**
     * Unique identifier for this SIM Card Usage.
     */
    #[Optional]
    public ?string $id;

    /**
     * Event close time.
     */
    #[Optional]
    public ?\DateTimeInterface $closed_at;

    /**
     * Event creation time.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Data cost.
     */
    #[Optional]
    public ?float $data_cost;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional]
    public ?string $data_rate;

    /**
     * Unit of wireless link consumption.
     */
    #[Optional]
    public ?string $data_unit;

    /**
     * Number of megabytes downloaded.
     */
    #[Optional]
    public ?float $downlink_data;

    /**
     * International Mobile Subscriber Identity.
     */
    #[Optional]
    public ?string $imsi;

    /**
     * Ip address that generated the event.
     */
    #[Optional]
    public ?string $ip_address;

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
     * Telephone number associated to SIM card.
     */
    #[Optional]
    public ?string $phone_number;

    /**
     * Unique identifier for SIM card.
     */
    #[Optional]
    public ?string $sim_card_id;

    /**
     * User-provided tags.
     */
    #[Optional]
    public ?string $sim_card_tags;

    /**
     * Unique identifier for SIM group.
     */
    #[Optional]
    public ?string $sim_group_id;

    /**
     * Sim group name for sim card.
     */
    #[Optional]
    public ?string $sim_group_name;

    /**
     * Number of megabytes uploaded.
     */
    #[Optional]
    public ?float $uplink_data;

    /**
     * `new SimCardUsageDetailRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimCardUsageDetailRecord::with(record_type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimCardUsageDetailRecord)->withRecordType(...)
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
        string $record_type = 'sim_card_usage',
        ?string $id = null,
        ?\DateTimeInterface $closed_at = null,
        ?\DateTimeInterface $created_at = null,
        ?string $currency = null,
        ?float $data_cost = null,
        ?string $data_rate = null,
        ?string $data_unit = null,
        ?float $downlink_data = null,
        ?string $imsi = null,
        ?string $ip_address = null,
        ?string $mcc = null,
        ?string $mnc = null,
        ?string $phone_number = null,
        ?string $sim_card_id = null,
        ?string $sim_card_tags = null,
        ?string $sim_group_id = null,
        ?string $sim_group_name = null,
        ?float $uplink_data = null,
    ): self {
        $obj = new self;

        $obj['record_type'] = $record_type;

        null !== $id && $obj['id'] = $id;
        null !== $closed_at && $obj['closed_at'] = $closed_at;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $currency && $obj['currency'] = $currency;
        null !== $data_cost && $obj['data_cost'] = $data_cost;
        null !== $data_rate && $obj['data_rate'] = $data_rate;
        null !== $data_unit && $obj['data_unit'] = $data_unit;
        null !== $downlink_data && $obj['downlink_data'] = $downlink_data;
        null !== $imsi && $obj['imsi'] = $imsi;
        null !== $ip_address && $obj['ip_address'] = $ip_address;
        null !== $mcc && $obj['mcc'] = $mcc;
        null !== $mnc && $obj['mnc'] = $mnc;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $sim_card_id && $obj['sim_card_id'] = $sim_card_id;
        null !== $sim_card_tags && $obj['sim_card_tags'] = $sim_card_tags;
        null !== $sim_group_id && $obj['sim_group_id'] = $sim_group_id;
        null !== $sim_group_name && $obj['sim_group_name'] = $sim_group_name;
        null !== $uplink_data && $obj['uplink_data'] = $uplink_data;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Unique identifier for this SIM Card Usage.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Event close time.
     */
    public function withClosedAt(\DateTimeInterface $closedAt): self
    {
        $obj = clone $this;
        $obj['closed_at'] = $closedAt;

        return $obj;
    }

    /**
     * Event creation time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Data cost.
     */
    public function withDataCost(float $dataCost): self
    {
        $obj = clone $this;
        $obj['data_cost'] = $dataCost;

        return $obj;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    public function withDataRate(string $dataRate): self
    {
        $obj = clone $this;
        $obj['data_rate'] = $dataRate;

        return $obj;
    }

    /**
     * Unit of wireless link consumption.
     */
    public function withDataUnit(string $dataUnit): self
    {
        $obj = clone $this;
        $obj['data_unit'] = $dataUnit;

        return $obj;
    }

    /**
     * Number of megabytes downloaded.
     */
    public function withDownlinkData(float $downlinkData): self
    {
        $obj = clone $this;
        $obj['downlink_data'] = $downlinkData;

        return $obj;
    }

    /**
     * International Mobile Subscriber Identity.
     */
    public function withImsi(string $imsi): self
    {
        $obj = clone $this;
        $obj['imsi'] = $imsi;

        return $obj;
    }

    /**
     * Ip address that generated the event.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj['ip_address'] = $ipAddress;

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
     * Telephone number associated to SIM card.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Unique identifier for SIM card.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['sim_card_id'] = $simCardID;

        return $obj;
    }

    /**
     * User-provided tags.
     */
    public function withSimCardTags(string $simCardTags): self
    {
        $obj = clone $this;
        $obj['sim_card_tags'] = $simCardTags;

        return $obj;
    }

    /**
     * Unique identifier for SIM group.
     */
    public function withSimGroupID(string $simGroupID): self
    {
        $obj = clone $this;
        $obj['sim_group_id'] = $simGroupID;

        return $obj;
    }

    /**
     * Sim group name for sim card.
     */
    public function withSimGroupName(string $simGroupName): self
    {
        $obj = clone $this;
        $obj['sim_group_name'] = $simGroupName;

        return $obj;
    }

    /**
     * Number of megabytes uploaded.
     */
    public function withUplinkData(float $uplinkData): self
    {
        $obj = clone $this;
        $obj['uplink_data'] = $uplinkData;

        return $obj;
    }
}
