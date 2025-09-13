<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\SimCardGroupListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\ConsumedData;
use Telnyx\SimCardGroups\SimCardGroupListResponse\Data\DataLimit;

/**
 * @phpstan-type data_alias = array{
 *   id?: string,
 *   consumedData?: ConsumedData,
 *   createdAt?: string,
 *   dataLimit?: DataLimit,
 *   default?: bool,
 *   name?: string,
 *   privateWirelessGatewayID?: string,
 *   recordType?: string,
 *   simCardCount?: int,
 *   updatedAt?: string,
 *   wirelessBlocklistID?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Represents the amount of data consumed.
     */
    #[Api('consumed_data', optional: true)]
    public ?ConsumedData $consumedData;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     */
    #[Api('data_limit', optional: true)]
    public ?DataLimit $dataLimit;

    /**
     * Indicates whether the SIM card group is the users default group.<br/>The default group is created for the user and can not be removed.
     */
    #[Api(optional: true)]
    public ?bool $default;

    /**
     * A user friendly name for the SIM card group.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    #[Api('private_wireless_gateway_id', optional: true)]
    public ?string $privateWirelessGatewayID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The number of SIM cards associated with the group.
     */
    #[Api('sim_card_count', optional: true)]
    public ?int $simCardCount;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    #[Api('wireless_blocklist_id', optional: true)]
    public ?string $wirelessBlocklistID;

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
        ?ConsumedData $consumedData = null,
        ?string $createdAt = null,
        ?DataLimit $dataLimit = null,
        ?bool $default = null,
        ?string $name = null,
        ?string $privateWirelessGatewayID = null,
        ?string $recordType = null,
        ?int $simCardCount = null,
        ?string $updatedAt = null,
        ?string $wirelessBlocklistID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $consumedData && $obj->consumedData = $consumedData;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $dataLimit && $obj->dataLimit = $dataLimit;
        null !== $default && $obj->default = $default;
        null !== $name && $obj->name = $name;
        null !== $privateWirelessGatewayID && $obj->privateWirelessGatewayID = $privateWirelessGatewayID;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $simCardCount && $obj->simCardCount = $simCardCount;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $wirelessBlocklistID && $obj->wirelessBlocklistID = $wirelessBlocklistID;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Represents the amount of data consumed.
     */
    public function withConsumedData(ConsumedData $consumedData): self
    {
        $obj = clone $this;
        $obj->consumedData = $consumedData;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     */
    public function withDataLimit(DataLimit $dataLimit): self
    {
        $obj = clone $this;
        $obj->dataLimit = $dataLimit;

        return $obj;
    }

    /**
     * Indicates whether the SIM card group is the users default group.<br/>The default group is created for the user and can not be removed.
     */
    public function withDefault(bool $default): self
    {
        $obj = clone $this;
        $obj->default = $default;

        return $obj;
    }

    /**
     * A user friendly name for the SIM card group.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    public function withPrivateWirelessGatewayID(
        string $privateWirelessGatewayID
    ): self {
        $obj = clone $this;
        $obj->privateWirelessGatewayID = $privateWirelessGatewayID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The number of SIM cards associated with the group.
     */
    public function withSimCardCount(int $simCardCount): self
    {
        $obj = clone $this;
        $obj->simCardCount = $simCardCount;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    public function withWirelessBlocklistID(string $wirelessBlocklistID): self
    {
        $obj = clone $this;
        $obj->wirelessBlocklistID = $wirelessBlocklistID;

        return $obj;
    }
}
