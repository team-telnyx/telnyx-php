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
 *   consumedData?: ConsumedData|null,
 *   createdAt?: string|null,
 *   dataLimit?: DataLimit|null,
 *   default?: bool|null,
 *   name?: string|null,
 *   privateWirelessGatewayID?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: string|null,
 *   wirelessBlocklistID?: string|null,
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
    #[Optional('consumed_data')]
    public ?ConsumedData $consumedData;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     */
    #[Optional('data_limit')]
    public ?DataLimit $dataLimit;

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
    #[Optional('private_wireless_gateway_id')]
    public ?string $privateWirelessGatewayID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    #[Optional('wireless_blocklist_id')]
    public ?string $wirelessBlocklistID;

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
     * } $consumedData
     * @param DataLimit|array{amount?: string|null, unit?: string|null} $dataLimit
     */
    public static function with(
        ?string $id = null,
        ConsumedData|array|null $consumedData = null,
        ?string $createdAt = null,
        DataLimit|array|null $dataLimit = null,
        ?bool $default = null,
        ?string $name = null,
        ?string $privateWirelessGatewayID = null,
        ?string $recordType = null,
        ?string $updatedAt = null,
        ?string $wirelessBlocklistID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $consumedData && $obj['consumedData'] = $consumedData;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $dataLimit && $obj['dataLimit'] = $dataLimit;
        null !== $default && $obj['default'] = $default;
        null !== $name && $obj['name'] = $name;
        null !== $privateWirelessGatewayID && $obj['privateWirelessGatewayID'] = $privateWirelessGatewayID;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $wirelessBlocklistID && $obj['wirelessBlocklistID'] = $wirelessBlocklistID;

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
        $obj['consumedData'] = $consumedData;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
        $obj['dataLimit'] = $dataLimit;

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
        $obj['privateWirelessGatewayID'] = $privateWirelessGatewayID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    public function withWirelessBlocklistID(string $wirelessBlocklistID): self
    {
        $obj = clone $this;
        $obj['wirelessBlocklistID'] = $wirelessBlocklistID;

        return $obj;
    }
}
