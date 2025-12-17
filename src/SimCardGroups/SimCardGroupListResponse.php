<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\SimCardGroupListResponse\DataLimit;

/**
 * @phpstan-import-type ConsumedDataShape from \Telnyx\SimCardGroups\ConsumedData
 * @phpstan-import-type DataLimitShape from \Telnyx\SimCardGroups\SimCardGroupListResponse\DataLimit
 *
 * @phpstan-type SimCardGroupListResponseShape = array{
 *   id?: string|null,
 *   consumedData?: null|ConsumedData|ConsumedDataShape,
 *   createdAt?: string|null,
 *   dataLimit?: null|DataLimit|DataLimitShape,
 *   default?: bool|null,
 *   name?: string|null,
 *   privateWirelessGatewayID?: string|null,
 *   recordType?: string|null,
 *   simCardCount?: int|null,
 *   updatedAt?: string|null,
 *   wirelessBlocklistID?: string|null,
 * }
 */
final class SimCardGroupListResponse implements BaseModel
{
    /** @use SdkModel<SimCardGroupListResponseShape> */
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
     * The number of SIM cards associated with the group.
     */
    #[Optional('sim_card_count')]
    public ?int $simCardCount;

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
     * @param ConsumedData|ConsumedDataShape|null $consumedData
     * @param DataLimit|DataLimitShape|null $dataLimit
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
        ?int $simCardCount = null,
        ?string $updatedAt = null,
        ?string $wirelessBlocklistID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $consumedData && $self['consumedData'] = $consumedData;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $dataLimit && $self['dataLimit'] = $dataLimit;
        null !== $default && $self['default'] = $default;
        null !== $name && $self['name'] = $name;
        null !== $privateWirelessGatewayID && $self['privateWirelessGatewayID'] = $privateWirelessGatewayID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $simCardCount && $self['simCardCount'] = $simCardCount;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $wirelessBlocklistID && $self['wirelessBlocklistID'] = $wirelessBlocklistID;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Represents the amount of data consumed.
     *
     * @param ConsumedData|ConsumedDataShape $consumedData
     */
    public function withConsumedData(ConsumedData|array $consumedData): self
    {
        $self = clone $this;
        $self['consumedData'] = $consumedData;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     *
     * @param DataLimit|DataLimitShape $dataLimit
     */
    public function withDataLimit(DataLimit|array $dataLimit): self
    {
        $self = clone $this;
        $self['dataLimit'] = $dataLimit;

        return $self;
    }

    /**
     * Indicates whether the SIM card group is the users default group.<br/>The default group is created for the user and can not be removed.
     */
    public function withDefault(bool $default): self
    {
        $self = clone $this;
        $self['default'] = $default;

        return $self;
    }

    /**
     * A user friendly name for the SIM card group.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The identification of the related Private Wireless Gateway resource.
     */
    public function withPrivateWirelessGatewayID(
        string $privateWirelessGatewayID
    ): self {
        $self = clone $this;
        $self['privateWirelessGatewayID'] = $privateWirelessGatewayID;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The number of SIM cards associated with the group.
     */
    public function withSimCardCount(int $simCardCount): self
    {
        $self = clone $this;
        $self['simCardCount'] = $simCardCount;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    public function withWirelessBlocklistID(string $wirelessBlocklistID): self
    {
        $self = clone $this;
        $self['wirelessBlocklistID'] = $wirelessBlocklistID;

        return $self;
    }
}
