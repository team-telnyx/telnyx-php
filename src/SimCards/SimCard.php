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
 * @phpstan-type sim_card = array{
 *   id?: string,
 *   actionsInProgress?: bool,
 *   authorizedImeis?: list<string>|null,
 *   createdAt?: string,
 *   currentBillingPeriodConsumedData?: CurrentBillingPeriodConsumedData,
 *   currentDeviceLocation?: CurrentDeviceLocation,
 *   currentImei?: string,
 *   currentMcc?: string,
 *   currentMnc?: string,
 *   dataLimit?: DataLimit,
 *   eid?: string|null,
 *   esimInstallationStatus?: value-of<EsimInstallationStatus>|null,
 *   iccid?: string,
 *   imsi?: string,
 *   ipv4?: string,
 *   ipv6?: string,
 *   liveDataSession?: value-of<LiveDataSession>,
 *   msisdn?: string,
 *   pinPukCodes?: PinPukCodes,
 *   recordType?: string,
 *   resourcesWithInProgressActions?: list<mixed>,
 *   simCardGroupID?: string,
 *   status?: SimCardStatus,
 *   tags?: list<string>,
 *   type?: value-of<Type>,
 *   updatedAt?: string,
 *   version?: string,
 * }
 */
final class SimCard implements BaseModel
{
    /** @use SdkModel<sim_card> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Indicate whether the SIM card has any pending (in-progress) actions.
     */
    #[Api('actions_in_progress', optional: true)]
    public ?bool $actionsInProgress;

    /**
     * List of IMEIs authorized to use a given SIM card.
     *
     * @var list<string>|null $authorizedImeis
     */
    #[Api('authorized_imeis', list: 'string', nullable: true, optional: true)]
    public ?array $authorizedImeis;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * The SIM card consumption so far in the current billing cycle.
     */
    #[Api('current_billing_period_consumed_data', optional: true)]
    public ?CurrentBillingPeriodConsumedData $currentBillingPeriodConsumedData;

    /**
     * Current physical location data of a given SIM card. Accuracy is given in meters.
     */
    #[Api('current_device_location', optional: true)]
    public ?CurrentDeviceLocation $currentDeviceLocation;

    /**
     * IMEI of the device where a given SIM card is currently being used.
     */
    #[Api('current_imei', optional: true)]
    public ?string $currentImei;

    /**
     * Mobile Country Code of the current network to which the SIM card is connected. It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Api('current_mcc', optional: true)]
    public ?string $currentMcc;

    /**
     * Mobile Network Code of the current network to which the SIM card is connected. It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Api('current_mnc', optional: true)]
    public ?string $currentMnc;

    /**
     * The SIM card individual data limit configuration.
     */
    #[Api('data_limit', optional: true)]
    public ?DataLimit $dataLimit;

    /**
     * The Embedded Identity Document (eID) for eSIM cards.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $eid;

    /**
     * The installation status of the eSIM. Only applicable for eSIM cards.
     *
     * @var value-of<EsimInstallationStatus>|null $esimInstallationStatus
     */
    #[Api(
        'esim_installation_status',
        enum: EsimInstallationStatus::class,
        nullable: true,
        optional: true,
    )]
    public ?string $esimInstallationStatus;

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
     * @var value-of<LiveDataSession>|null $liveDataSession
     */
    #[Api('live_data_session', enum: LiveDataSession::class, optional: true)]
    public ?string $liveDataSession;

    /**
     * Mobile Station International Subscriber Directory Number (MSISDN) is a number used to identify a mobile phone number internationally. <br/>
     * MSISDN is defined by the E.164 numbering plan. It includes a country code and a National Destination Code which identifies the subscriber's operator.
     */
    #[Api(optional: true)]
    public ?string $msisdn;

    /**
     * PIN and PUK codes for the SIM card. Only available when include_pin_puk_codes=true is set in the request.
     */
    #[Api('pin_puk_codes', optional: true)]
    public ?PinPukCodes $pinPukCodes;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * List of resources with actions in progress.
     *
     * @var list<mixed>|null $resourcesWithInProgressActions
     */
    #[Api('resources_with_in_progress_actions', list: 'mixed', optional: true)]
    public ?array $resourcesWithInProgressActions;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Api('sim_card_group_id', optional: true)]
    public ?string $simCardGroupID;

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
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

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
     * @param list<string>|null $authorizedImeis
     * @param EsimInstallationStatus|value-of<EsimInstallationStatus>|null $esimInstallationStatus
     * @param LiveDataSession|value-of<LiveDataSession> $liveDataSession
     * @param list<mixed> $resourcesWithInProgressActions
     * @param list<string> $tags
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?bool $actionsInProgress = null,
        ?array $authorizedImeis = null,
        ?string $createdAt = null,
        ?CurrentBillingPeriodConsumedData $currentBillingPeriodConsumedData = null,
        ?CurrentDeviceLocation $currentDeviceLocation = null,
        ?string $currentImei = null,
        ?string $currentMcc = null,
        ?string $currentMnc = null,
        ?DataLimit $dataLimit = null,
        ?string $eid = null,
        EsimInstallationStatus|string|null $esimInstallationStatus = null,
        ?string $iccid = null,
        ?string $imsi = null,
        ?string $ipv4 = null,
        ?string $ipv6 = null,
        LiveDataSession|string|null $liveDataSession = null,
        ?string $msisdn = null,
        ?PinPukCodes $pinPukCodes = null,
        ?string $recordType = null,
        ?array $resourcesWithInProgressActions = null,
        ?string $simCardGroupID = null,
        ?SimCardStatus $status = null,
        ?array $tags = null,
        Type|string|null $type = null,
        ?string $updatedAt = null,
        ?string $version = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $actionsInProgress && $obj->actionsInProgress = $actionsInProgress;
        null !== $authorizedImeis && $obj->authorizedImeis = $authorizedImeis;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $currentBillingPeriodConsumedData && $obj->currentBillingPeriodConsumedData = $currentBillingPeriodConsumedData;
        null !== $currentDeviceLocation && $obj->currentDeviceLocation = $currentDeviceLocation;
        null !== $currentImei && $obj->currentImei = $currentImei;
        null !== $currentMcc && $obj->currentMcc = $currentMcc;
        null !== $currentMnc && $obj->currentMnc = $currentMnc;
        null !== $dataLimit && $obj->dataLimit = $dataLimit;
        null !== $eid && $obj->eid = $eid;
        null !== $esimInstallationStatus && $obj->esimInstallationStatus = $esimInstallationStatus instanceof EsimInstallationStatus ? $esimInstallationStatus->value : $esimInstallationStatus;
        null !== $iccid && $obj->iccid = $iccid;
        null !== $imsi && $obj->imsi = $imsi;
        null !== $ipv4 && $obj->ipv4 = $ipv4;
        null !== $ipv6 && $obj->ipv6 = $ipv6;
        null !== $liveDataSession && $obj->liveDataSession = $liveDataSession instanceof LiveDataSession ? $liveDataSession->value : $liveDataSession;
        null !== $msisdn && $obj->msisdn = $msisdn;
        null !== $pinPukCodes && $obj->pinPukCodes = $pinPukCodes;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $resourcesWithInProgressActions && $obj->resourcesWithInProgressActions = $resourcesWithInProgressActions;
        null !== $simCardGroupID && $obj->simCardGroupID = $simCardGroupID;
        null !== $status && $obj->status = $status;
        null !== $tags && $obj->tags = $tags;
        null !== $type && $obj->type = $type instanceof Type ? $type->value : $type;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
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
        $obj->actionsInProgress = $actionsInProgress;

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
        $obj->authorizedImeis = $authorizedImeis;

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
     * The SIM card consumption so far in the current billing cycle.
     */
    public function withCurrentBillingPeriodConsumedData(
        CurrentBillingPeriodConsumedData $currentBillingPeriodConsumedData
    ): self {
        $obj = clone $this;
        $obj->currentBillingPeriodConsumedData = $currentBillingPeriodConsumedData;

        return $obj;
    }

    /**
     * Current physical location data of a given SIM card. Accuracy is given in meters.
     */
    public function withCurrentDeviceLocation(
        CurrentDeviceLocation $currentDeviceLocation
    ): self {
        $obj = clone $this;
        $obj->currentDeviceLocation = $currentDeviceLocation;

        return $obj;
    }

    /**
     * IMEI of the device where a given SIM card is currently being used.
     */
    public function withCurrentImei(string $currentImei): self
    {
        $obj = clone $this;
        $obj->currentImei = $currentImei;

        return $obj;
    }

    /**
     * Mobile Country Code of the current network to which the SIM card is connected. It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withCurrentMcc(string $currentMcc): self
    {
        $obj = clone $this;
        $obj->currentMcc = $currentMcc;

        return $obj;
    }

    /**
     * Mobile Network Code of the current network to which the SIM card is connected. It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withCurrentMnc(string $currentMnc): self
    {
        $obj = clone $this;
        $obj->currentMnc = $currentMnc;

        return $obj;
    }

    /**
     * The SIM card individual data limit configuration.
     */
    public function withDataLimit(DataLimit $dataLimit): self
    {
        $obj = clone $this;
        $obj->dataLimit = $dataLimit;

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
        $obj->esimInstallationStatus = $esimInstallationStatus instanceof EsimInstallationStatus ? $esimInstallationStatus->value : $esimInstallationStatus;

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
        $obj->liveDataSession = $liveDataSession instanceof LiveDataSession ? $liveDataSession->value : $liveDataSession;

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
        $obj->pinPukCodes = $pinPukCodes;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

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
        $obj->resourcesWithInProgressActions = $resourcesWithInProgressActions;

        return $obj;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $obj = clone $this;
        $obj->simCardGroupID = $simCardGroupID;

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
        $obj->type = $type instanceof Type ? $type->value : $type;

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
     * The version of the SIM card.
     */
    public function withVersion(string $version): self
    {
        $obj = clone $this;
        $obj->version = $version;

        return $obj;
    }
}
