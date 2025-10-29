<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListWdrsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\ReportListWdrsResponse\Data\Cost;
use Telnyx\Reports\ReportListWdrsResponse\Data\DownlinkData;
use Telnyx\Reports\ReportListWdrsResponse\Data\Rate;
use Telnyx\Reports\ReportListWdrsResponse\Data\UplinkData;

/**
 * @phpstan-type DataShape = array{
 *   id?: string,
 *   cost?: Cost,
 *   createdAt?: \DateTimeInterface,
 *   downlinkData?: DownlinkData,
 *   durationSeconds?: float,
 *   imsi?: string,
 *   mcc?: string,
 *   mnc?: string,
 *   phoneNumber?: string,
 *   rate?: Rate,
 *   recordType?: string,
 *   simCardID?: string,
 *   simGroupID?: string,
 *   simGroupName?: string,
 *   uplinkData?: UplinkData,
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
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api('downlink_data', optional: true)]
    public ?DownlinkData $downlinkData;

    /**
     * Session duration in seconds.
     */
    #[Api('duration_seconds', optional: true)]
    public ?float $durationSeconds;

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
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    #[Api(optional: true)]
    public ?Rate $rate;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Sim card unique identifier.
     */
    #[Api('sim_card_id', optional: true)]
    public ?string $simCardID;

    /**
     * Sim group unique identifier.
     */
    #[Api('sim_group_id', optional: true)]
    public ?string $simGroupID;

    /**
     * Defined sim group name.
     */
    #[Api('sim_group_name', optional: true)]
    public ?string $simGroupName;

    #[Api('uplink_data', optional: true)]
    public ?UplinkData $uplinkData;

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
        ?string $id = null,
        ?Cost $cost = null,
        ?\DateTimeInterface $createdAt = null,
        ?DownlinkData $downlinkData = null,
        ?float $durationSeconds = null,
        ?string $imsi = null,
        ?string $mcc = null,
        ?string $mnc = null,
        ?string $phoneNumber = null,
        ?Rate $rate = null,
        ?string $recordType = null,
        ?string $simCardID = null,
        ?string $simGroupID = null,
        ?string $simGroupName = null,
        ?UplinkData $uplinkData = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $cost && $obj->cost = $cost;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $downlinkData && $obj->downlinkData = $downlinkData;
        null !== $durationSeconds && $obj->durationSeconds = $durationSeconds;
        null !== $imsi && $obj->imsi = $imsi;
        null !== $mcc && $obj->mcc = $mcc;
        null !== $mnc && $obj->mnc = $mnc;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $rate && $obj->rate = $rate;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $simCardID && $obj->simCardID = $simCardID;
        null !== $simGroupID && $obj->simGroupID = $simGroupID;
        null !== $simGroupName && $obj->simGroupName = $simGroupName;
        null !== $uplinkData && $obj->uplinkData = $uplinkData;

        return $obj;
    }

    /**
     * WDR id.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCost(Cost $cost): self
    {
        $obj = clone $this;
        $obj->cost = $cost;

        return $obj;
    }

    /**
     * Record created time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withDownlinkData(DownlinkData $downlinkData): self
    {
        $obj = clone $this;
        $obj->downlinkData = $downlinkData;

        return $obj;
    }

    /**
     * Session duration in seconds.
     */
    public function withDurationSeconds(float $durationSeconds): self
    {
        $obj = clone $this;
        $obj->durationSeconds = $durationSeconds;

        return $obj;
    }

    /**
     * International mobile subscriber identity.
     */
    public function withImsi(string $imsi): self
    {
        $obj = clone $this;
        $obj->imsi = $imsi;

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
     * Phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    public function withRate(Rate $rate): self
    {
        $obj = clone $this;
        $obj->rate = $rate;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Sim card unique identifier.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj->simCardID = $simCardID;

        return $obj;
    }

    /**
     * Sim group unique identifier.
     */
    public function withSimGroupID(string $simGroupID): self
    {
        $obj = clone $this;
        $obj->simGroupID = $simGroupID;

        return $obj;
    }

    /**
     * Defined sim group name.
     */
    public function withSimGroupName(string $simGroupName): self
    {
        $obj = clone $this;
        $obj->simGroupName = $simGroupName;

        return $obj;
    }

    public function withUplinkData(UplinkData $uplinkData): self
    {
        $obj = clone $this;
        $obj->uplinkData = $uplinkData;

        return $obj;
    }
}
