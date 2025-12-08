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
 *   actions_in_progress?: bool|null,
 *   authorized_imeis?: list<string>|null,
 *   created_at?: string|null,
 *   current_billing_period_consumed_data?: CurrentBillingPeriodConsumedData|null,
 *   data_limit?: DataLimit|null,
 *   eid?: string|null,
 *   esim_installation_status?: value-of<EsimInstallationStatus>|null,
 *   iccid?: string|null,
 *   imsi?: string|null,
 *   msisdn?: string|null,
 *   record_type?: string|null,
 *   resources_with_in_progress_actions?: list<mixed>|null,
 *   sim_card_group_id?: string|null,
 *   status?: SimCardStatus|null,
 *   tags?: list<string>|null,
 *   type?: value-of<Type>|null,
 *   updated_at?: string|null,
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
    #[Optional]
    public ?bool $actions_in_progress;

    /**
     * List of IMEIs authorized to use a given SIM card.
     *
     * @var list<string>|null $authorized_imeis
     */
    #[Optional(list: 'string', nullable: true)]
    public ?array $authorized_imeis;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    /**
     * The SIM card consumption so far in the current billing cycle.
     */
    #[Optional]
    public ?CurrentBillingPeriodConsumedData $current_billing_period_consumed_data;

    /**
     * The SIM card individual data limit configuration.
     */
    #[Optional]
    public ?DataLimit $data_limit;

    /**
     * The Embedded Identity Document (eID) for eSIM cards.
     */
    #[Optional(nullable: true)]
    public ?string $eid;

    /**
     * The installation status of the eSIM. Only applicable for eSIM cards.
     *
     * @var value-of<EsimInstallationStatus>|null $esim_installation_status
     */
    #[Optional(enum: EsimInstallationStatus::class, nullable: true)]
    public ?string $esim_installation_status;

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

    #[Optional]
    public ?string $record_type;

    /**
     * List of resources with actions in progress.
     *
     * @var list<mixed>|null $resources_with_in_progress_actions
     */
    #[Optional(list: 'mixed')]
    public ?array $resources_with_in_progress_actions;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Optional]
    public ?string $sim_card_group_id;

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
    #[Optional]
    public ?string $updated_at;

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
     * @param list<string>|null $authorized_imeis
     * @param CurrentBillingPeriodConsumedData|array{
     *   amount?: string|null, unit?: string|null
     * } $current_billing_period_consumed_data
     * @param DataLimit|array{
     *   amount?: string|null, unit?: value-of<Unit>|null
     * } $data_limit
     * @param EsimInstallationStatus|value-of<EsimInstallationStatus>|null $esim_installation_status
     * @param list<mixed> $resources_with_in_progress_actions
     * @param SimCardStatus|array{
     *   reason?: string|null, value?: value-of<Value>|null
     * } $status
     * @param list<string> $tags
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?bool $actions_in_progress = null,
        ?array $authorized_imeis = null,
        ?string $created_at = null,
        CurrentBillingPeriodConsumedData|array|null $current_billing_period_consumed_data = null,
        DataLimit|array|null $data_limit = null,
        ?string $eid = null,
        EsimInstallationStatus|string|null $esim_installation_status = null,
        ?string $iccid = null,
        ?string $imsi = null,
        ?string $msisdn = null,
        ?string $record_type = null,
        ?array $resources_with_in_progress_actions = null,
        ?string $sim_card_group_id = null,
        SimCardStatus|array|null $status = null,
        ?array $tags = null,
        Type|string|null $type = null,
        ?string $updated_at = null,
        ?string $version = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $actions_in_progress && $obj['actions_in_progress'] = $actions_in_progress;
        null !== $authorized_imeis && $obj['authorized_imeis'] = $authorized_imeis;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $current_billing_period_consumed_data && $obj['current_billing_period_consumed_data'] = $current_billing_period_consumed_data;
        null !== $data_limit && $obj['data_limit'] = $data_limit;
        null !== $eid && $obj['eid'] = $eid;
        null !== $esim_installation_status && $obj['esim_installation_status'] = $esim_installation_status;
        null !== $iccid && $obj['iccid'] = $iccid;
        null !== $imsi && $obj['imsi'] = $imsi;
        null !== $msisdn && $obj['msisdn'] = $msisdn;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $resources_with_in_progress_actions && $obj['resources_with_in_progress_actions'] = $resources_with_in_progress_actions;
        null !== $sim_card_group_id && $obj['sim_card_group_id'] = $sim_card_group_id;
        null !== $status && $obj['status'] = $status;
        null !== $tags && $obj['tags'] = $tags;
        null !== $type && $obj['type'] = $type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
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
        $obj['actions_in_progress'] = $actionsInProgress;

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
        $obj['authorized_imeis'] = $authorizedImeis;

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
        $obj['current_billing_period_consumed_data'] = $currentBillingPeriodConsumedData;

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
        $obj['data_limit'] = $dataLimit;

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
        $obj['esim_installation_status'] = $esimInstallationStatus;

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
        $obj['record_type'] = $recordType;

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
        $obj['resources_with_in_progress_actions'] = $resourcesWithInProgressActions;

        return $obj;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $obj = clone $this;
        $obj['sim_card_group_id'] = $simCardGroupID;

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
        $obj['updated_at'] = $updatedAt;

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
