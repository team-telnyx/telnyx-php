<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\SimCardGroups\SimCardGroupListResponse\DataLimit;

/**
 * @phpstan-type SimCardGroupListResponseShape = array{
 *   id?: string|null,
 *   consumed_data?: ConsumedData|null,
 *   created_at?: string|null,
 *   data_limit?: DataLimit|null,
 *   default?: bool|null,
 *   name?: string|null,
 *   private_wireless_gateway_id?: string|null,
 *   record_type?: string|null,
 *   sim_card_count?: int|null,
 *   updated_at?: string|null,
 *   wireless_blocklist_id?: string|null,
 * }
 */
final class SimCardGroupListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SimCardGroupListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Represents the amount of data consumed.
     */
    #[Api(optional: true)]
    public ?ConsumedData $consumed_data;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     */
    #[Api(optional: true)]
    public ?DataLimit $data_limit;

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
    #[Api(optional: true)]
    public ?string $private_wireless_gateway_id;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * The number of SIM cards associated with the group.
     */
    #[Api(optional: true)]
    public ?int $sim_card_count;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    #[Api(optional: true)]
    public ?string $wireless_blocklist_id;

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
        ?ConsumedData $consumed_data = null,
        ?string $created_at = null,
        ?DataLimit $data_limit = null,
        ?bool $default = null,
        ?string $name = null,
        ?string $private_wireless_gateway_id = null,
        ?string $record_type = null,
        ?int $sim_card_count = null,
        ?string $updated_at = null,
        ?string $wireless_blocklist_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $consumed_data && $obj->consumed_data = $consumed_data;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $data_limit && $obj->data_limit = $data_limit;
        null !== $default && $obj->default = $default;
        null !== $name && $obj->name = $name;
        null !== $private_wireless_gateway_id && $obj->private_wireless_gateway_id = $private_wireless_gateway_id;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $sim_card_count && $obj->sim_card_count = $sim_card_count;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $wireless_blocklist_id && $obj->wireless_blocklist_id = $wireless_blocklist_id;

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
        $obj->consumed_data = $consumedData;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     */
    public function withDataLimit(DataLimit $dataLimit): self
    {
        $obj = clone $this;
        $obj->data_limit = $dataLimit;

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
        $obj->private_wireless_gateway_id = $privateWirelessGatewayID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * The number of SIM cards associated with the group.
     */
    public function withSimCardCount(int $simCardCount): self
    {
        $obj = clone $this;
        $obj->sim_card_count = $simCardCount;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    public function withWirelessBlocklistID(string $wirelessBlocklistID): self
    {
        $obj = clone $this;
        $obj->wireless_blocklist_id = $wirelessBlocklistID;

        return $obj;
    }
}
