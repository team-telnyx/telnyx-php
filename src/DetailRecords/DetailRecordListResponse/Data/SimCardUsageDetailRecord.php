<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SimCardUsageDetailRecordShape = array{
 *   recordType: string,
 *   id?: string|null,
 *   closedAt?: \DateTimeInterface|null,
 *   createdAt?: \DateTimeInterface|null,
 *   currency?: string|null,
 *   dataCost?: float|null,
 *   dataRate?: string|null,
 *   dataUnit?: string|null,
 *   downlinkData?: float|null,
 *   imsi?: string|null,
 *   ipAddress?: string|null,
 *   mcc?: string|null,
 *   mnc?: string|null,
 *   phoneNumber?: string|null,
 *   simCardID?: string|null,
 *   simCardTags?: string|null,
 *   simGroupID?: string|null,
 *   simGroupName?: string|null,
 *   uplinkData?: float|null,
 * }
 */
final class SimCardUsageDetailRecord implements BaseModel
{
    /** @use SdkModel<SimCardUsageDetailRecordShape> */
    use SdkModel;

    #[Required('record_type')]
    public string $recordType;

    /**
     * Unique identifier for this SIM Card Usage.
     */
    #[Optional]
    public ?string $id;

    /**
     * Event close time.
     */
    #[Optional('closed_at')]
    public ?\DateTimeInterface $closedAt;

    /**
     * Event creation time.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Data cost.
     */
    #[Optional('data_cost')]
    public ?float $dataCost;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional('data_rate')]
    public ?string $dataRate;

    /**
     * Unit of wireless link consumption.
     */
    #[Optional('data_unit')]
    public ?string $dataUnit;

    /**
     * Number of megabytes downloaded.
     */
    #[Optional('downlink_data')]
    public ?float $downlinkData;

    /**
     * International Mobile Subscriber Identity.
     */
    #[Optional]
    public ?string $imsi;

    /**
     * Ip address that generated the event.
     */
    #[Optional('ip_address')]
    public ?string $ipAddress;

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
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Unique identifier for SIM card.
     */
    #[Optional('sim_card_id')]
    public ?string $simCardID;

    /**
     * User-provided tags.
     */
    #[Optional('sim_card_tags')]
    public ?string $simCardTags;

    /**
     * Unique identifier for SIM group.
     */
    #[Optional('sim_group_id')]
    public ?string $simGroupID;

    /**
     * Sim group name for sim card.
     */
    #[Optional('sim_group_name')]
    public ?string $simGroupName;

    /**
     * Number of megabytes uploaded.
     */
    #[Optional('uplink_data')]
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
        $self = new self;

        $self['recordType'] = $recordType;

        null !== $id && $self['id'] = $id;
        null !== $closedAt && $self['closedAt'] = $closedAt;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $currency && $self['currency'] = $currency;
        null !== $dataCost && $self['dataCost'] = $dataCost;
        null !== $dataRate && $self['dataRate'] = $dataRate;
        null !== $dataUnit && $self['dataUnit'] = $dataUnit;
        null !== $downlinkData && $self['downlinkData'] = $downlinkData;
        null !== $imsi && $self['imsi'] = $imsi;
        null !== $ipAddress && $self['ipAddress'] = $ipAddress;
        null !== $mcc && $self['mcc'] = $mcc;
        null !== $mnc && $self['mnc'] = $mnc;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $simCardID && $self['simCardID'] = $simCardID;
        null !== $simCardTags && $self['simCardTags'] = $simCardTags;
        null !== $simGroupID && $self['simGroupID'] = $simGroupID;
        null !== $simGroupName && $self['simGroupName'] = $simGroupName;
        null !== $uplinkData && $self['uplinkData'] = $uplinkData;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Unique identifier for this SIM Card Usage.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Event close time.
     */
    public function withClosedAt(\DateTimeInterface $closedAt): self
    {
        $self = clone $this;
        $self['closedAt'] = $closedAt;

        return $self;
    }

    /**
     * Event creation time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Data cost.
     */
    public function withDataCost(float $dataCost): self
    {
        $self = clone $this;
        $self['dataCost'] = $dataCost;

        return $self;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    public function withDataRate(string $dataRate): self
    {
        $self = clone $this;
        $self['dataRate'] = $dataRate;

        return $self;
    }

    /**
     * Unit of wireless link consumption.
     */
    public function withDataUnit(string $dataUnit): self
    {
        $self = clone $this;
        $self['dataUnit'] = $dataUnit;

        return $self;
    }

    /**
     * Number of megabytes downloaded.
     */
    public function withDownlinkData(float $downlinkData): self
    {
        $self = clone $this;
        $self['downlinkData'] = $downlinkData;

        return $self;
    }

    /**
     * International Mobile Subscriber Identity.
     */
    public function withImsi(string $imsi): self
    {
        $self = clone $this;
        $self['imsi'] = $imsi;

        return $self;
    }

    /**
     * Ip address that generated the event.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

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
     * Telephone number associated to SIM card.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Unique identifier for SIM card.
     */
    public function withSimCardID(string $simCardID): self
    {
        $self = clone $this;
        $self['simCardID'] = $simCardID;

        return $self;
    }

    /**
     * User-provided tags.
     */
    public function withSimCardTags(string $simCardTags): self
    {
        $self = clone $this;
        $self['simCardTags'] = $simCardTags;

        return $self;
    }

    /**
     * Unique identifier for SIM group.
     */
    public function withSimGroupID(string $simGroupID): self
    {
        $self = clone $this;
        $self['simGroupID'] = $simGroupID;

        return $self;
    }

    /**
     * Sim group name for sim card.
     */
    public function withSimGroupName(string $simGroupName): self
    {
        $self = clone $this;
        $self['simGroupName'] = $simGroupName;

        return $self;
    }

    /**
     * Number of megabytes uploaded.
     */
    public function withUplinkData(float $uplinkData): self
    {
        $self = clone $this;
        $self['uplinkData'] = $uplinkData;

        return $self;
    }
}
