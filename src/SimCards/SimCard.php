<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCard\CurrentBillingPeriodConsumedData;
use Telnyx\SimCards\SimCard\CurrentDeviceLocation;
use Telnyx\SimCards\SimCard\DataLimit;
use Telnyx\SimCards\SimCard\EsimInstallationStatus;
use Telnyx\SimCards\SimCard\LiveDataSession;
use Telnyx\SimCards\SimCard\PinPukCodes;
use Telnyx\SimCards\SimCard\Type;
use Telnyx\SimCardStatus;

/**
 * @phpstan-type SimCardShape = array{
 *   id?: string|null,
 *   actions_in_progress?: bool|null,
 *   authorized_imeis?: list<string>|null,
 *   created_at?: string|null,
 *   current_billing_period_consumed_data?: CurrentBillingPeriodConsumedData|null,
 *   current_device_location?: CurrentDeviceLocation|null,
 *   current_imei?: string|null,
 *   current_mcc?: string|null,
 *   current_mnc?: string|null,
 *   data_limit?: DataLimit|null,
 *   eid?: string|null,
 *   esim_installation_status?: value-of<EsimInstallationStatus>|null,
 *   iccid?: string|null,
 *   imsi?: string|null,
 *   ipv4?: string|null,
 *   ipv6?: string|null,
 *   live_data_session?: value-of<LiveDataSession>|null,
 *   msisdn?: string|null,
 *   pin_puk_codes?: PinPukCodes|null,
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
final class SimCard implements BaseModel
{
    /** @use SdkModel<SimCardShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Indicate whether the SIM card has any pending (in-progress) actions.
     */
    #[Api(optional: true)]
    public ?bool $actions_in_progress;

    /**
     * List of IMEIs authorized to use a given SIM card.
     *
     * @var list<string>|null $authorized_imeis
     */
    #[Api(list: 'string', nullable: true, optional: true)]
    public ?array $authorized_imeis;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * The SIM card consumption so far in the current billing cycle.
     */
    #[Api(optional: true)]
    public ?CurrentBillingPeriodConsumedData $current_billing_period_consumed_data;

    /**
     * Current physical location data of a given SIM card. Accuracy is given in meters.
     */
    #[Api(optional: true)]
    public ?CurrentDeviceLocation $current_device_location;

    /**
     * IMEI of the device where a given SIM card is currently being used.
     */
    #[Api(optional: true)]
    public ?string $current_imei;

    /**
     * Mobile Country Code of the current network to which the SIM card is connected. It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Api(optional: true)]
    public ?string $current_mcc;

    /**
     * Mobile Network Code of the current network to which the SIM card is connected. It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Api(optional: true)]
    public ?string $current_mnc;

    /**
     * The SIM card individual data limit configuration.
     */
    #[Api(optional: true)]
    public ?DataLimit $data_limit;

    /**
     * The Embedded Identity Document (eID) for eSIM cards.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $eid;

    /**
     * The installation status of the eSIM. Only applicable for eSIM cards.
     *
     * @var value-of<EsimInstallationStatus>|null $esim_installation_status
     */
    #[Api(enum: EsimInstallationStatus::class, nullable: true, optional: true)]
    public ?string $esim_installation_status;

    /**
     * The ICCID is the identifier of the specific SIM card/chip. Each SIM is internationally identified by its integrated circuit card identifier (ICCID). ICCIDs are stored in the SIM card's memory and are also engraved or printed on the SIM card body during a process called personalization.
     */
    #[Api(optional: true)]
    public ?string $iccid;

    /**
     * SIM cards are identified on their individual network operators by a unique International Mobile Subscriber Identity (IMSI). <br/>
     * Mobile network operators connect mobile phone calls and communicate with their market SIM cards using their IMSIs. The IMSI is stored in the Subscriber  Identity Module (SIM) inside the device and is sent by the device to the appropriate network. It is used to acquire the details of the device in the Home  Location Register (HLR) or the Visitor Location Register (VLR).
     */
    #[Api(optional: true)]
    public ?string $imsi;

    /**
     * The SIM's address in the currently connected network. This IPv4 address is usually obtained dynamically, so it may vary according to the location or new connections.
     */
    #[Api(optional: true)]
    public ?string $ipv4;

    /**
     * The SIM's address in the currently connected network. This IPv6 address is usually obtained dynamically, so it may vary according to the location or new connections.
     */
    #[Api(optional: true)]
    public ?string $ipv6;

    /**
     * Indicates whether the device is actively connected to a network and able to run data.
     *
     * @var value-of<LiveDataSession>|null $live_data_session
     */
    #[Api(enum: LiveDataSession::class, optional: true)]
    public ?string $live_data_session;

    /**
     * Mobile Station International Subscriber Directory Number (MSISDN) is a number used to identify a mobile phone number internationally. <br/>
     * MSISDN is defined by the E.164 numbering plan. It includes a country code and a National Destination Code which identifies the subscriber's operator.
     */
    #[Api(optional: true)]
    public ?string $msisdn;

    /**
     * PIN and PUK codes for the SIM card. Only available when include_pin_puk_codes=true is set in the request.
     */
    #[Api(optional: true)]
    public ?PinPukCodes $pin_puk_codes;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * List of resources with actions in progress.
     *
     * @var list<mixed>|null $resources_with_in_progress_actions
     */
    #[Api(list: 'mixed', optional: true)]
    public ?array $resources_with_in_progress_actions;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Api(optional: true)]
    public ?string $sim_card_group_id;

    #[Api(optional: true)]
    public ?SimCardStatus $status;

    /**
     * Searchable tags associated with the SIM card.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * The type of SIM card.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * The version of the SIM card.
     */
    #[Api(optional: true)]
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
     * @param EsimInstallationStatus|value-of<EsimInstallationStatus>|null $esim_installation_status
     * @param LiveDataSession|value-of<LiveDataSession> $live_data_session
     * @param list<mixed> $resources_with_in_progress_actions
     * @param list<string> $tags
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?bool $actions_in_progress = null,
        ?array $authorized_imeis = null,
        ?string $created_at = null,
        ?CurrentBillingPeriodConsumedData $current_billing_period_consumed_data = null,
        ?CurrentDeviceLocation $current_device_location = null,
        ?string $current_imei = null,
        ?string $current_mcc = null,
        ?string $current_mnc = null,
        ?DataLimit $data_limit = null,
        ?string $eid = null,
        EsimInstallationStatus|string|null $esim_installation_status = null,
        ?string $iccid = null,
        ?string $imsi = null,
        ?string $ipv4 = null,
        ?string $ipv6 = null,
        LiveDataSession|string|null $live_data_session = null,
        ?string $msisdn = null,
        ?PinPukCodes $pin_puk_codes = null,
        ?string $record_type = null,
        ?array $resources_with_in_progress_actions = null,
        ?string $sim_card_group_id = null,
        ?SimCardStatus $status = null,
        ?array $tags = null,
        Type|string|null $type = null,
        ?string $updated_at = null,
        ?string $version = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $actions_in_progress && $obj->actions_in_progress = $actions_in_progress;
        null !== $authorized_imeis && $obj->authorized_imeis = $authorized_imeis;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $current_billing_period_consumed_data && $obj->current_billing_period_consumed_data = $current_billing_period_consumed_data;
        null !== $current_device_location && $obj->current_device_location = $current_device_location;
        null !== $current_imei && $obj->current_imei = $current_imei;
        null !== $current_mcc && $obj->current_mcc = $current_mcc;
        null !== $current_mnc && $obj->current_mnc = $current_mnc;
        null !== $data_limit && $obj->data_limit = $data_limit;
        null !== $eid && $obj->eid = $eid;
        null !== $esim_installation_status && $obj['esim_installation_status'] = $esim_installation_status;
        null !== $iccid && $obj->iccid = $iccid;
        null !== $imsi && $obj->imsi = $imsi;
        null !== $ipv4 && $obj->ipv4 = $ipv4;
        null !== $ipv6 && $obj->ipv6 = $ipv6;
        null !== $live_data_session && $obj['live_data_session'] = $live_data_session;
        null !== $msisdn && $obj->msisdn = $msisdn;
        null !== $pin_puk_codes && $obj->pin_puk_codes = $pin_puk_codes;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $resources_with_in_progress_actions && $obj->resources_with_in_progress_actions = $resources_with_in_progress_actions;
        null !== $sim_card_group_id && $obj->sim_card_group_id = $sim_card_group_id;
        null !== $status && $obj->status = $status;
        null !== $tags && $obj->tags = $tags;
        null !== $type && $obj['type'] = $type;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $version && $obj->version = $version;

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
     * Indicate whether the SIM card has any pending (in-progress) actions.
     */
    public function withActionsInProgress(bool $actionsInProgress): self
    {
        $obj = clone $this;
        $obj->actions_in_progress = $actionsInProgress;

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
        $obj->authorized_imeis = $authorizedImeis;

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
     * The SIM card consumption so far in the current billing cycle.
     */
    public function withCurrentBillingPeriodConsumedData(
        CurrentBillingPeriodConsumedData $currentBillingPeriodConsumedData
    ): self {
        $obj = clone $this;
        $obj->current_billing_period_consumed_data = $currentBillingPeriodConsumedData;

        return $obj;
    }

    /**
     * Current physical location data of a given SIM card. Accuracy is given in meters.
     */
    public function withCurrentDeviceLocation(
        CurrentDeviceLocation $currentDeviceLocation
    ): self {
        $obj = clone $this;
        $obj->current_device_location = $currentDeviceLocation;

        return $obj;
    }

    /**
     * IMEI of the device where a given SIM card is currently being used.
     */
    public function withCurrentImei(string $currentImei): self
    {
        $obj = clone $this;
        $obj->current_imei = $currentImei;

        return $obj;
    }

    /**
     * Mobile Country Code of the current network to which the SIM card is connected. It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withCurrentMcc(string $currentMcc): self
    {
        $obj = clone $this;
        $obj->current_mcc = $currentMcc;

        return $obj;
    }

    /**
     * Mobile Network Code of the current network to which the SIM card is connected. It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withCurrentMnc(string $currentMnc): self
    {
        $obj = clone $this;
        $obj->current_mnc = $currentMnc;

        return $obj;
    }

    /**
     * The SIM card individual data limit configuration.
     */
    public function withDataLimit(DataLimit $dataLimit): self
    {
        $obj = clone $this;
        $obj->data_limit = $dataLimit;

        return $obj;
    }

    /**
     * The Embedded Identity Document (eID) for eSIM cards.
     */
    public function withEid(?string $eid): self
    {
        $obj = clone $this;
        $obj->eid = $eid;

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
        $obj->iccid = $iccid;

        return $obj;
    }

    /**
     * SIM cards are identified on their individual network operators by a unique International Mobile Subscriber Identity (IMSI). <br/>
     * Mobile network operators connect mobile phone calls and communicate with their market SIM cards using their IMSIs. The IMSI is stored in the Subscriber  Identity Module (SIM) inside the device and is sent by the device to the appropriate network. It is used to acquire the details of the device in the Home  Location Register (HLR) or the Visitor Location Register (VLR).
     */
    public function withImsi(string $imsi): self
    {
        $obj = clone $this;
        $obj->imsi = $imsi;

        return $obj;
    }

    /**
     * The SIM's address in the currently connected network. This IPv4 address is usually obtained dynamically, so it may vary according to the location or new connections.
     */
    public function withIpv4(string $ipv4): self
    {
        $obj = clone $this;
        $obj->ipv4 = $ipv4;

        return $obj;
    }

    /**
     * The SIM's address in the currently connected network. This IPv6 address is usually obtained dynamically, so it may vary according to the location or new connections.
     */
    public function withIpv6(string $ipv6): self
    {
        $obj = clone $this;
        $obj->ipv6 = $ipv6;

        return $obj;
    }

    /**
     * Indicates whether the device is actively connected to a network and able to run data.
     *
     * @param LiveDataSession|value-of<LiveDataSession> $liveDataSession
     */
    public function withLiveDataSession(
        LiveDataSession|string $liveDataSession
    ): self {
        $obj = clone $this;
        $obj['live_data_session'] = $liveDataSession;

        return $obj;
    }

    /**
     * Mobile Station International Subscriber Directory Number (MSISDN) is a number used to identify a mobile phone number internationally. <br/>
     * MSISDN is defined by the E.164 numbering plan. It includes a country code and a National Destination Code which identifies the subscriber's operator.
     */
    public function withMsisdn(string $msisdn): self
    {
        $obj = clone $this;
        $obj->msisdn = $msisdn;

        return $obj;
    }

    /**
     * PIN and PUK codes for the SIM card. Only available when include_pin_puk_codes=true is set in the request.
     */
    public function withPinPukCodes(PinPukCodes $pinPukCodes): self
    {
        $obj = clone $this;
        $obj->pin_puk_codes = $pinPukCodes;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

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
        $obj->resources_with_in_progress_actions = $resourcesWithInProgressActions;

        return $obj;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $obj = clone $this;
        $obj->sim_card_group_id = $simCardGroupID;

        return $obj;
    }

    public function withStatus(SimCardStatus $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

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
        $obj->tags = $tags;

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
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    /**
     * The version of the SIM card.
     */
    public function withVersion(string $version): self
    {
        $obj = clone $this;
        $obj->version = $version;

        return $obj;
    }
}
