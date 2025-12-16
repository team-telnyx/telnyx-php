<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\SimpleSimCard\CurrentBillingPeriodConsumedData;
use Telnyx\SimpleSimCard\DataLimit;
use Telnyx\SimpleSimCard\EsimInstallationStatus;
use Telnyx\SimpleSimCard\Type;

/**
 * @phpstan-import-type CurrentBillingPeriodConsumedDataShape from \Telnyx\SimpleSimCard\CurrentBillingPeriodConsumedData
 * @phpstan-import-type DataLimitShape from \Telnyx\SimpleSimCard\DataLimit
 * @phpstan-import-type SimCardStatusShape from \Telnyx\SimCardStatus
 *
 * @phpstan-type SimpleSimCardShape = array{
 *   id?: string|null,
 *   actionsInProgress?: bool|null,
 *   authorizedImeis?: list<string>|null,
 *   createdAt?: string|null,
 *   currentBillingPeriodConsumedData?: null|CurrentBillingPeriodConsumedData|CurrentBillingPeriodConsumedDataShape,
 *   dataLimit?: null|DataLimit|DataLimitShape,
 *   eid?: string|null,
 *   esimInstallationStatus?: null|EsimInstallationStatus|value-of<EsimInstallationStatus>,
 *   iccid?: string|null,
 *   imsi?: string|null,
 *   msisdn?: string|null,
 *   recordType?: string|null,
 *   resourcesWithInProgressActions?: list<array<string,mixed>>|null,
 *   simCardGroupID?: string|null,
 *   status?: null|SimCardStatus|SimCardStatusShape,
 *   tags?: list<string>|null,
 *   type?: null|Type|value-of<Type>,
 *   updatedAt?: string|null,
 *   version?: string|null,
 * }
 */
final class SimpleSimCard implements BaseModel
{
    /** @use SdkModel<SimpleSimCardShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * Indicate whether the SIM card has any pending (in-progress) actions.
     */
    #[Optional('actions_in_progress')]
    public ?bool $actionsInProgress;

    /**
     * List of IMEIs authorized to use a given SIM card.
     *
     * @var list<string>|null $authorizedImeis
     */
    #[Optional('authorized_imeis', list: 'string', nullable: true)]
    public ?array $authorizedImeis;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * The SIM card consumption so far in the current billing cycle.
     */
    #[Optional('current_billing_period_consumed_data')]
    public ?CurrentBillingPeriodConsumedData $currentBillingPeriodConsumedData;

    /**
     * The SIM card individual data limit configuration.
     */
    #[Optional('data_limit')]
    public ?DataLimit $dataLimit;

    /**
     * The Embedded Identity Document (eID) for eSIM cards.
     */
    #[Optional(nullable: true)]
    public ?string $eid;

    /**
     * The installation status of the eSIM. Only applicable for eSIM cards.
     *
     * @var value-of<EsimInstallationStatus>|null $esimInstallationStatus
     */
    #[Optional(
        'esim_installation_status',
        enum: EsimInstallationStatus::class,
        nullable: true,
    )]
    public ?string $esimInstallationStatus;

    /**
     * The ICCID is the identifier of the specific SIM card/chip. Each SIM is internationally identified by its integrated circuit card identifier (ICCID). ICCIDs are stored in the SIM card's memory and are also engraved or printed on the SIM card body during a process called personalization.
     */
    #[Optional]
    public ?string $iccid;

    /**
     * SIM cards are identified on their individual network operators by a unique International Mobile Subscriber Identity (IMSI). <br/>
     * Mobile network operators connect mobile phone calls and communicate with their market SIM cards using their IMSIs. The IMSI is stored in the Subscriber  Identity Module (SIM) inside the device and is sent by the device to the appropriate network. It is used to acquire the details of the device in the Home  Location Register (HLR) or the Visitor Location Register (VLR).
     */
    #[Optional]
    public ?string $imsi;

    /**
     * Mobile Station International Subscriber Directory Number (MSISDN) is a number used to identify a mobile phone number internationally. <br/>
     * MSISDN is defined by the E.164 numbering plan. It includes a country code and a National Destination Code which identifies the subscriber's operator.
     */
    #[Optional]
    public ?string $msisdn;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * List of resources with actions in progress.
     *
     * @var list<array<string,mixed>>|null $resourcesWithInProgressActions
     */
    #[Optional('resources_with_in_progress_actions', list: new MapOf('mixed'))]
    public ?array $resourcesWithInProgressActions;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Optional('sim_card_group_id')]
    public ?string $simCardGroupID;

    #[Optional]
    public ?SimCardStatus $status;

    /**
     * Searchable tags associated with the SIM card.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * The type of SIM card.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * The version of the SIM card.
     */
    #[Optional]
    public ?string $version;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $authorizedImeis
     * @param CurrentBillingPeriodConsumedDataShape $currentBillingPeriodConsumedData
     * @param DataLimitShape $dataLimit
     * @param EsimInstallationStatus|value-of<EsimInstallationStatus>|null $esimInstallationStatus
     * @param list<array<string,mixed>> $resourcesWithInProgressActions
     * @param SimCardStatusShape $status
     * @param list<string> $tags
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?bool $actionsInProgress = null,
        ?array $authorizedImeis = null,
        ?string $createdAt = null,
        CurrentBillingPeriodConsumedData|array|null $currentBillingPeriodConsumedData = null,
        DataLimit|array|null $dataLimit = null,
        ?string $eid = null,
        EsimInstallationStatus|string|null $esimInstallationStatus = null,
        ?string $iccid = null,
        ?string $imsi = null,
        ?string $msisdn = null,
        ?string $recordType = null,
        ?array $resourcesWithInProgressActions = null,
        ?string $simCardGroupID = null,
        SimCardStatus|array|null $status = null,
        ?array $tags = null,
        Type|string|null $type = null,
        ?string $updatedAt = null,
        ?string $version = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $actionsInProgress && $self['actionsInProgress'] = $actionsInProgress;
        null !== $authorizedImeis && $self['authorizedImeis'] = $authorizedImeis;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $currentBillingPeriodConsumedData && $self['currentBillingPeriodConsumedData'] = $currentBillingPeriodConsumedData;
        null !== $dataLimit && $self['dataLimit'] = $dataLimit;
        null !== $eid && $self['eid'] = $eid;
        null !== $esimInstallationStatus && $self['esimInstallationStatus'] = $esimInstallationStatus;
        null !== $iccid && $self['iccid'] = $iccid;
        null !== $imsi && $self['imsi'] = $imsi;
        null !== $msisdn && $self['msisdn'] = $msisdn;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $resourcesWithInProgressActions && $self['resourcesWithInProgressActions'] = $resourcesWithInProgressActions;
        null !== $simCardGroupID && $self['simCardGroupID'] = $simCardGroupID;
        null !== $status && $self['status'] = $status;
        null !== $tags && $self['tags'] = $tags;
        null !== $type && $self['type'] = $type;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $version && $self['version'] = $version;

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
     * Indicate whether the SIM card has any pending (in-progress) actions.
     */
    public function withActionsInProgress(bool $actionsInProgress): self
    {
        $self = clone $this;
        $self['actionsInProgress'] = $actionsInProgress;

        return $self;
    }

    /**
     * List of IMEIs authorized to use a given SIM card.
     *
     * @param list<string>|null $authorizedImeis
     */
    public function withAuthorizedImeis(?array $authorizedImeis): self
    {
        $self = clone $this;
        $self['authorizedImeis'] = $authorizedImeis;

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
     * The SIM card consumption so far in the current billing cycle.
     *
     * @param CurrentBillingPeriodConsumedDataShape $currentBillingPeriodConsumedData
     */
    public function withCurrentBillingPeriodConsumedData(
        CurrentBillingPeriodConsumedData|array $currentBillingPeriodConsumedData
    ): self {
        $self = clone $this;
        $self['currentBillingPeriodConsumedData'] = $currentBillingPeriodConsumedData;

        return $self;
    }

    /**
     * The SIM card individual data limit configuration.
     *
     * @param DataLimitShape $dataLimit
     */
    public function withDataLimit(DataLimit|array $dataLimit): self
    {
        $self = clone $this;
        $self['dataLimit'] = $dataLimit;

        return $self;
    }

    /**
     * The Embedded Identity Document (eID) for eSIM cards.
     */
    public function withEid(?string $eid): self
    {
        $self = clone $this;
        $self['eid'] = $eid;

        return $self;
    }

    /**
     * The installation status of the eSIM. Only applicable for eSIM cards.
     *
     * @param EsimInstallationStatus|value-of<EsimInstallationStatus>|null $esimInstallationStatus
     */
    public function withEsimInstallationStatus(
        EsimInstallationStatus|string|null $esimInstallationStatus
    ): self {
        $self = clone $this;
        $self['esimInstallationStatus'] = $esimInstallationStatus;

        return $self;
    }

    /**
     * The ICCID is the identifier of the specific SIM card/chip. Each SIM is internationally identified by its integrated circuit card identifier (ICCID). ICCIDs are stored in the SIM card's memory and are also engraved or printed on the SIM card body during a process called personalization.
     */
    public function withIccid(string $iccid): self
    {
        $self = clone $this;
        $self['iccid'] = $iccid;

        return $self;
    }

    /**
     * SIM cards are identified on their individual network operators by a unique International Mobile Subscriber Identity (IMSI). <br/>
     * Mobile network operators connect mobile phone calls and communicate with their market SIM cards using their IMSIs. The IMSI is stored in the Subscriber  Identity Module (SIM) inside the device and is sent by the device to the appropriate network. It is used to acquire the details of the device in the Home  Location Register (HLR) or the Visitor Location Register (VLR).
     */
    public function withImsi(string $imsi): self
    {
        $self = clone $this;
        $self['imsi'] = $imsi;

        return $self;
    }

    /**
     * Mobile Station International Subscriber Directory Number (MSISDN) is a number used to identify a mobile phone number internationally. <br/>
     * MSISDN is defined by the E.164 numbering plan. It includes a country code and a National Destination Code which identifies the subscriber's operator.
     */
    public function withMsisdn(string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * List of resources with actions in progress.
     *
     * @param list<array<string,mixed>> $resourcesWithInProgressActions
     */
    public function withResourcesWithInProgressActions(
        array $resourcesWithInProgressActions
    ): self {
        $self = clone $this;
        $self['resourcesWithInProgressActions'] = $resourcesWithInProgressActions;

        return $self;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $self = clone $this;
        $self['simCardGroupID'] = $simCardGroupID;

        return $self;
    }

    /**
     * @param SimCardStatusShape $status
     */
    public function withStatus(SimCardStatus|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Searchable tags associated with the SIM card.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * The type of SIM card.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

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
     * The version of the SIM card.
     */
    public function withVersion(string $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }
}
