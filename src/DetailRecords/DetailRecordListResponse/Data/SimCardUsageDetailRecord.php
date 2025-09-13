<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type sim_card_usage_detail_record = array{
 *   recordType: string,
 *   id?: string,
 *   closedAt?: \DateTimeInterface,
 *   createdAt?: \DateTimeInterface,
 *   currency?: string,
 *   dataCost?: float,
 *   dataRate?: string,
 *   dataUnit?: string,
 *   downlinkData?: float,
 *   imsi?: string,
 *   ipAddress?: string,
 *   mcc?: string,
 *   mnc?: string,
 *   phoneNumber?: string,
 *   simCardID?: string,
 *   simCardTags?: string,
 *   simGroupID?: string,
 *   simGroupName?: string,
 *   uplinkData?: float,
 * }
 */
final class SimCardUsageDetailRecord implements BaseModel
{
    /** @use SdkModel<sim_card_usage_detail_record> */
    use SdkModel;

    #[Api('record_type')]
    public string $recordType;

    /**
     * Unique identifier for this SIM Card Usage.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Event close time.
     */
    #[Api('closed_at', optional: true)]
    public ?\DateTimeInterface $closedAt;

    /**
     * Event creation time.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    #[Api(optional: true)]
    public ?string $currency;

    /**
     * Data cost.
     */
    #[Api('data_cost', optional: true)]
    public ?float $dataCost;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    #[Api('data_rate', optional: true)]
    public ?string $dataRate;

    /**
     * Unit of wireless link consumption.
     */
    #[Api('data_unit', optional: true)]
    public ?string $dataUnit;

    /**
     * Number of megabytes downloaded.
     */
    #[Api('downlink_data', optional: true)]
    public ?float $downlinkData;

    /**
     * International Mobile Subscriber Identity.
     */
    #[Api(optional: true)]
    public ?string $imsi;

    /**
     * Ip address that generated the event.
     */
    #[Api('ip_address', optional: true)]
    public ?string $ipAddress;

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
     * Telephone number associated to SIM card.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Unique identifier for SIM card.
     */
    #[Api('sim_card_id', optional: true)]
    public ?string $simCardID;

    /**
     * User-provided tags.
     */
    #[Api('sim_card_tags', optional: true)]
    public ?string $simCardTags;

    /**
     * Unique identifier for SIM group.
     */
    #[Api('sim_group_id', optional: true)]
    public ?string $simGroupID;

    /**
     * Sim group name for sim card.
     */
    #[Api('sim_group_name', optional: true)]
    public ?string $simGroupName;

    /**
     * Number of megabytes uploaded.
     */
    #[Api('uplink_data', optional: true)]
    public ?float $uplinkData;

    /**
     * `new SimCardUsageDetailRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimCardUsageDetailRecord::with(recordType: ...)
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
        string $recordType = 'sim_card_usage',
        ?string $id = null,
        ?\DateTimeInterface $closedAt = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $currency = null,
        ?float $dataCost = null,
        ?string $dataRate = null,
        ?string $dataUnit = null,
        ?float $downlinkData = null,
        ?string $imsi = null,
        ?string $ipAddress = null,
        ?string $mcc = null,
        ?string $mnc = null,
        ?string $phoneNumber = null,
        ?string $simCardID = null,
        ?string $simCardTags = null,
        ?string $simGroupID = null,
        ?string $simGroupName = null,
        ?float $uplinkData = null,
    ): self {
        $obj = new self;

        $obj->recordType = $recordType;

        null !== $id && $obj->id = $id;
        null !== $closedAt && $obj->closedAt = $closedAt;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $currency && $obj->currency = $currency;
        null !== $dataCost && $obj->dataCost = $dataCost;
        null !== $dataRate && $obj->dataRate = $dataRate;
        null !== $dataUnit && $obj->dataUnit = $dataUnit;
        null !== $downlinkData && $obj->downlinkData = $downlinkData;
        null !== $imsi && $obj->imsi = $imsi;
        null !== $ipAddress && $obj->ipAddress = $ipAddress;
        null !== $mcc && $obj->mcc = $mcc;
        null !== $mnc && $obj->mnc = $mnc;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $simCardID && $obj->simCardID = $simCardID;
        null !== $simCardTags && $obj->simCardTags = $simCardTags;
        null !== $simGroupID && $obj->simGroupID = $simGroupID;
        null !== $simGroupName && $obj->simGroupName = $simGroupName;
        null !== $uplinkData && $obj->uplinkData = $uplinkData;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Unique identifier for this SIM Card Usage.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Event close time.
     */
    public function withClosedAt(\DateTimeInterface $closedAt): self
    {
        $obj = clone $this;
        $obj->closedAt = $closedAt;

        return $obj;
    }

    /**
     * Event creation time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }

    /**
     * Data cost.
     */
    public function withDataCost(float $dataCost): self
    {
        $obj = clone $this;
        $obj->dataCost = $dataCost;

        return $obj;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    public function withDataRate(string $dataRate): self
    {
        $obj = clone $this;
        $obj->dataRate = $dataRate;

        return $obj;
    }

    /**
     * Unit of wireless link consumption.
     */
    public function withDataUnit(string $dataUnit): self
    {
        $obj = clone $this;
        $obj->dataUnit = $dataUnit;

        return $obj;
    }

    /**
     * Number of megabytes downloaded.
     */
    public function withDownlinkData(float $downlinkData): self
    {
        $obj = clone $this;
        $obj->downlinkData = $downlinkData;

        return $obj;
    }

    /**
     * International Mobile Subscriber Identity.
     */
    public function withImsi(string $imsi): self
    {
        $obj = clone $this;
        $obj->imsi = $imsi;

        return $obj;
    }

    /**
     * Ip address that generated the event.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ipAddress = $ipAddress;

        return $obj;
    }

    /**
     * Mobile country code.
     */
    public function withMcc(string $mcc): self
    {
        $obj = clone $this;
        $obj->mcc = $mcc;

        return $obj;
    }

    /**
     * Mobile network code.
     */
    public function withMnc(string $mnc): self
    {
        $obj = clone $this;
        $obj->mnc = $mnc;

        return $obj;
    }

    /**
     * Telephone number associated to SIM card.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Unique identifier for SIM card.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj->simCardID = $simCardID;

        return $obj;
    }

    /**
     * User-provided tags.
     */
    public function withSimCardTags(string $simCardTags): self
    {
        $obj = clone $this;
        $obj->simCardTags = $simCardTags;

        return $obj;
    }

    /**
     * Unique identifier for SIM group.
     */
    public function withSimGroupID(string $simGroupID): self
    {
        $obj = clone $this;
        $obj->simGroupID = $simGroupID;

        return $obj;
    }

    /**
     * Sim group name for sim card.
     */
    public function withSimGroupName(string $simGroupName): self
    {
        $obj = clone $this;
        $obj->simGroupName = $simGroupName;

        return $obj;
    }

    /**
     * Number of megabytes uploaded.
     */
    public function withUplinkData(float $uplinkData): self
    {
        $obj = clone $this;
        $obj->uplinkData = $uplinkData;

        return $obj;
    }
}
