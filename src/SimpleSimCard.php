<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardStatus\Value;
use Telnyx\SimpleSimCard\CurrentBillingPeriodConsumedData;
use Telnyx\SimpleSimCard\DataLimit;
use Telnyx\SimpleSimCard\DataLimit\Unit;
use Telnyx\SimpleSimCard\EsimInstallationStatus;
use Telnyx\SimpleSimCard\Type;

/**
 * @phpstan-type SimpleSimCardShape = array{
 *   id?: string|null,
 *   actionsInProgress?: bool|null,
 *   authorizedImeis?: list<string>|null,
 *   createdAt?: string|null,
 *   currentBillingPeriodConsumedData?: CurrentBillingPeriodConsumedData|null,
 *   dataLimit?: DataLimit|null,
 *   eid?: string|null,
 *   esimInstallationStatus?: value-of<EsimInstallationStatus>|null,
 *   iccid?: string|null,
 *   imsi?: string|null,
 *   msisdn?: string|null,
 *   recordType?: string|null,
 *   resourcesWithInProgressActions?: list<mixed>|null,
 *   simCardGroupID?: string|null,
 *   status?: SimCardStatus|null,
 *   tags?: list<string>|null,
 *   type?: value-of<Type>|null,
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
     * @var list<mixed>|null $resourcesWithInProgressActions
     */
    #[Optional('resources_with_in_progress_actions', list: 'mixed')]
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
     * @param CurrentBillingPeriodConsumedData|array{
     *   amount?: string|null, unit?: string|null
     * } $currentBillingPeriodConsumedData
     * @param DataLimit|array{
     *   amount?: string|null, unit?: value-of<Unit>|null
     * } $dataLimit
     * @param EsimInstallationStatus|value-of<EsimInstallationStatus>|null $esimInstallationStatus
     * @param list<mixed> $resourcesWithInProgressActions
     * @param SimCardStatus|array{
     *   reason?: string|null, value?: value-of<Value>|null
     * } $status
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $actionsInProgress && $obj['actionsInProgress'] = $actionsInProgress;
        null !== $authorizedImeis && $obj['authorizedImeis'] = $authorizedImeis;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $currentBillingPeriodConsumedData && $obj['currentBillingPeriodConsumedData'] = $currentBillingPeriodConsumedData;
        null !== $dataLimit && $obj['dataLimit'] = $dataLimit;
        null !== $eid && $obj['eid'] = $eid;
        null !== $esimInstallationStatus && $obj['esimInstallationStatus'] = $esimInstallationStatus;
        null !== $iccid && $obj['iccid'] = $iccid;
        null !== $imsi && $obj['imsi'] = $imsi;
        null !== $msisdn && $obj['msisdn'] = $msisdn;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $resourcesWithInProgressActions && $obj['resourcesWithInProgressActions'] = $resourcesWithInProgressActions;
        null !== $simCardGroupID && $obj['simCardGroupID'] = $simCardGroupID;
        null !== $status && $obj['status'] = $status;
        null !== $tags && $obj['tags'] = $tags;
        null !== $type && $obj['type'] = $type;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $version && $obj['version'] = $version;

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
     * Indicate whether the SIM card has any pending (in-progress) actions.
     */
    public function withActionsInProgress(bool $actionsInProgress): self
    {
        $obj = clone $this;
        $obj['actionsInProgress'] = $actionsInProgress;

        return $obj;
    }

    /**
     * List of IMEIs authorized to use a given SIM card.
     *
     * @param list<string>|null $authorizedImeis
     */
    public function withAuthorizedImeis(?array $authorizedImeis): self
    {
        $obj = clone $this;
        $obj['authorizedImeis'] = $authorizedImeis;

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
     * The SIM card consumption so far in the current billing cycle.
     *
     * @param CurrentBillingPeriodConsumedData|array{
     *   amount?: string|null, unit?: string|null
     * } $currentBillingPeriodConsumedData
     */
    public function withCurrentBillingPeriodConsumedData(
        CurrentBillingPeriodConsumedData|array $currentBillingPeriodConsumedData
    ): self {
        $obj = clone $this;
        $obj['currentBillingPeriodConsumedData'] = $currentBillingPeriodConsumedData;

        return $obj;
    }

    /**
     * The SIM card individual data limit configuration.
     *
     * @param DataLimit|array{
     *   amount?: string|null, unit?: value-of<Unit>|null
     * } $dataLimit
     */
    public function withDataLimit(DataLimit|array $dataLimit): self
    {
        $obj = clone $this;
        $obj['dataLimit'] = $dataLimit;

        return $obj;
    }

    /**
     * The Embedded Identity Document (eID) for eSIM cards.
     */
    public function withEid(?string $eid): self
    {
        $obj = clone $this;
        $obj['eid'] = $eid;

        return $obj;
    }

    /**
     * The installation status of the eSIM. Only applicable for eSIM cards.
     *
     * @param EsimInstallationStatus|value-of<EsimInstallationStatus>|null $esimInstallationStatus
     */
    public function withEsimInstallationStatus(
        EsimInstallationStatus|string|null $esimInstallationStatus
    ): self {
        $obj = clone $this;
        $obj['esimInstallationStatus'] = $esimInstallationStatus;

        return $obj;
    }

    /**
     * The ICCID is the identifier of the specific SIM card/chip. Each SIM is internationally identified by its integrated circuit card identifier (ICCID). ICCIDs are stored in the SIM card's memory and are also engraved or printed on the SIM card body during a process called personalization.
     */
    public function withIccid(string $iccid): self
    {
        $obj = clone $this;
        $obj['iccid'] = $iccid;

        return $obj;
    }

    /**
     * SIM cards are identified on their individual network operators by a unique International Mobile Subscriber Identity (IMSI). <br/>
     * Mobile network operators connect mobile phone calls and communicate with their market SIM cards using their IMSIs. The IMSI is stored in the Subscriber  Identity Module (SIM) inside the device and is sent by the device to the appropriate network. It is used to acquire the details of the device in the Home  Location Register (HLR) or the Visitor Location Register (VLR).
     */
    public function withImsi(string $imsi): self
    {
        $obj = clone $this;
        $obj['imsi'] = $imsi;

        return $obj;
    }

    /**
     * Mobile Station International Subscriber Directory Number (MSISDN) is a number used to identify a mobile phone number internationally. <br/>
     * MSISDN is defined by the E.164 numbering plan. It includes a country code and a National Destination Code which identifies the subscriber's operator.
     */
    public function withMsisdn(string $msisdn): self
    {
        $obj = clone $this;
        $obj['msisdn'] = $msisdn;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * List of resources with actions in progress.
     *
     * @param list<mixed> $resourcesWithInProgressActions
     */
    public function withResourcesWithInProgressActions(
        array $resourcesWithInProgressActions
    ): self {
        $obj = clone $this;
        $obj['resourcesWithInProgressActions'] = $resourcesWithInProgressActions;

        return $obj;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $obj = clone $this;
        $obj['simCardGroupID'] = $simCardGroupID;

        return $obj;
    }

    /**
     * @param SimCardStatus|array{
     *   reason?: string|null, value?: value-of<Value>|null
     * } $status
     */
    public function withStatus(SimCardStatus|array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Searchable tags associated with the SIM card.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * The type of SIM card.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

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
     * The version of the SIM card.
     */
    public function withVersion(string $version): self
    {
        $obj = clone $this;
        $obj['version'] = $version;

        return $obj;
    }
}
