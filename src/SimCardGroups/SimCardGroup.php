<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\SimCardGroup\DataLimit;

/**
 * @phpstan-type SimCardGroupShape = array{
 *   id?: string|null,
 *   consumed_data?: ConsumedData|null,
 *   created_at?: string|null,
 *   data_limit?: DataLimit|null,
 *   default?: bool|null,
 *   name?: string|null,
 *   private_wireless_gateway_id?: string|null,
 *   record_type?: string|null,
 *   updated_at?: string|null,
 *   wireless_blocklist_id?: string|null,
 * }
 */
final class SimCardGroup implements BaseModel
{
    /** @use SdkModel<SimCardGroupShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * Represents the amount of data consumed.
     */
    #[Optional]
    public ?ConsumedData $consumed_data;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     */
    #[Optional]
    public ?DataLimit $data_limit;

    /**
     * Indicates whether the SIM card group is the users default group.<br/>The default group is created for the user and can not be removed.
     */
    #[Optional]
    public ?bool $default;

    /**
     * A user friendly name for the SIM card group.
     */
    #[Optional]
    public ?string $name;

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    #[Optional]
    public ?string $private_wireless_gateway_id;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional]
    public ?string $updated_at;

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    #[Optional]
    public ?string $wireless_blocklist_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConsumedData|array{
     *   amount?: string|null, unit?: string|null
     * } $consumed_data
     * @param DataLimit|array{amount?: string|null, unit?: string|null} $data_limit
     */
    public static function with(
        ?string $id = null,
        ConsumedData|array|null $consumed_data = null,
        ?string $created_at = null,
        DataLimit|array|null $data_limit = null,
        ?bool $default = null,
        ?string $name = null,
        ?string $private_wireless_gateway_id = null,
        ?string $record_type = null,
        ?string $updated_at = null,
        ?string $wireless_blocklist_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $consumed_data && $obj['consumed_data'] = $consumed_data;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $data_limit && $obj['data_limit'] = $data_limit;
        null !== $default && $obj['default'] = $default;
        null !== $name && $obj['name'] = $name;
        null !== $private_wireless_gateway_id && $obj['private_wireless_gateway_id'] = $private_wireless_gateway_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $wireless_blocklist_id && $obj['wireless_blocklist_id'] = $wireless_blocklist_id;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Represents the amount of data consumed.
     *
     * @param ConsumedData|array{
     *   amount?: string|null, unit?: string|null
     * } $consumedData
     */
    public function withConsumedData(ConsumedData|array $consumedData): self
    {
        $obj = clone $this;
        $obj['consumed_data'] = $consumedData;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     *
     * @param DataLimit|array{amount?: string|null, unit?: string|null} $dataLimit
     */
    public function withDataLimit(DataLimit|array $dataLimit): self
    {
        $obj = clone $this;
        $obj['data_limit'] = $dataLimit;

        return $obj;
    }

    /**
     * Indicates whether the SIM card group is the users default group.<br/>The default group is created for the user and can not be removed.
     */
    public function withDefault(bool $default): self
    {
        $obj = clone $this;
        $obj['default'] = $default;

        return $obj;
    }

    /**
     * A user friendly name for the SIM card group.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    public function withPrivateWirelessGatewayID(
        string $privateWirelessGatewayID
    ): self {
        $obj = clone $this;
        $obj['private_wireless_gateway_id'] = $privateWirelessGatewayID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    public function withWirelessBlocklistID(string $wirelessBlocklistID): self
    {
        $obj = clone $this;
        $obj['wireless_blocklist_id'] = $wirelessBlocklistID;

        return $obj;
    }
}
