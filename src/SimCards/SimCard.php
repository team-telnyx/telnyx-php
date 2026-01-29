<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\SimCards\SimCard\CurrentBillingPeriodConsumedData;
use Telnyx\SimCards\SimCard\CurrentDeviceLocation;
use Telnyx\SimCards\SimCard\DataLimit;
use Telnyx\SimCards\SimCard\EsimInstallationStatus;
use Telnyx\SimCards\SimCard\LiveDataSession;
use Telnyx\SimCards\SimCard\PinPukCodes;
use Telnyx\SimCards\SimCard\Type;
use Telnyx\SimCardStatus;

/**
 * @phpstan-import-type CurrentBillingPeriodConsumedDataShape from \Telnyx\SimCards\SimCard\CurrentBillingPeriodConsumedData
 * @phpstan-import-type CurrentDeviceLocationShape from \Telnyx\SimCards\SimCard\CurrentDeviceLocation
 * @phpstan-import-type DataLimitShape from \Telnyx\SimCards\SimCard\DataLimit
 * @phpstan-import-type PinPukCodesShape from \Telnyx\SimCards\SimCard\PinPukCodes
 * @phpstan-import-type SimCardStatusShape from \Telnyx\SimCardStatus
 *
 * @phpstan-type SimCardShape = array{
 *   id?: string|null,
 *   actionsInProgress?: bool|null,
 *   authorizedImeis?: list<string>|null,
 *   createdAt?: string|null,
 *   currentBillingPeriodConsumedData?: null|CurrentBillingPeriodConsumedData|CurrentBillingPeriodConsumedDataShape,
 *   currentDeviceLocation?: null|CurrentDeviceLocation|CurrentDeviceLocationShape,
 *   currentImei?: string|null,
 *   currentMcc?: string|null,
 *   currentMnc?: string|null,
 *   dataLimit?: null|DataLimit|DataLimitShape,
 *   eid?: string|null,
 *   esimInstallationStatus?: null|EsimInstallationStatus|value-of<EsimInstallationStatus>,
 *   iccid?: string|null,
 *   imsi?: string|null,
 *   ipv4?: string|null,
 *   ipv6?: string|null,
 *   liveDataSession?: null|LiveDataSession|value-of<LiveDataSession>,
 *   msisdn?: string|null,
 *   pinPukCodes?: null|PinPukCodes|PinPukCodesShape,
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
final class SimCard implements BaseModel
{
    /** @use SdkModel<SimCardShape> */
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
     * Current physical location data of a given SIM card. Accuracy is given in meters.
     */
    #[Optional('current_device_location')]
    public ?CurrentDeviceLocation $currentDeviceLocation;

    /**
     * IMEI of the device where a given SIM card is currently being used.
     */
    #[Optional('current_imei')]
    public ?string $currentImei;

    /**
     * Mobile Country Code of the current network to which the SIM card is connected. It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Optional('current_mcc')]
    public ?string $currentMcc;

    /**
     * Mobile Network Code of the current network to which the SIM card is connected. It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Optional('current_mnc')]
    public ?string $currentMnc;

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
     * The SIM's address in the currently connected network. This IPv4 address is usually obtained dynamically, so it may vary according to the location or new connections.
     */
    #[Optional]
    public ?string $ipv4;

    /**
     * The SIM's address in the currently connected network. This IPv6 address is usually obtained dynamically, so it may vary according to the location or new connections.
     */
    #[Optional]
    public ?string $ipv6;

    /**
     * Indicates whether the device is actively connected to a network and able to run data.
     *
     * @var value-of<LiveDataSession>|null $liveDataSession
     */
    #[Optional('live_data_session', enum: LiveDataSession::class)]
    public ?string $liveDataSession;

    /**
     * Mobile Station International Subscriber Directory Number (MSISDN) is a number used to identify a mobile phone number internationally. <br/>
     * MSISDN is defined by the E.164 numbering plan. It includes a country code and a National Destination Code which identifies the subscriber's operator.
     */
    #[Optional]
    public ?string $msisdn;

    /**
     * PIN and PUK codes for the SIM card. Only available when include_pin_puk_codes=true is set in the request.
     */
    #[Optional('pin_puk_codes')]
    public ?PinPukCodes $pinPukCodes;

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
     * @param CurrentBillingPeriodConsumedData|CurrentBillingPeriodConsumedDataShape|null $currentBillingPeriodConsumedData
     * @param CurrentDeviceLocation|CurrentDeviceLocationShape|null $currentDeviceLocation
     * @param DataLimit|DataLimitShape|null $dataLimit
     * @param EsimInstallationStatus|value-of<EsimInstallationStatus>|null $esimInstallationStatus
     * @param LiveDataSession|value-of<LiveDataSession>|null $liveDataSession
     * @param PinPukCodes|PinPukCodesShape|null $pinPukCodes
     * @param list<array<string,mixed>>|null $resourcesWithInProgressActions
     * @param SimCardStatus|SimCardStatusShape|null $status
     * @param list<string>|null $tags
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $id = null,
        ?bool $actionsInProgress = null,
        ?array $authorizedImeis = null,
        ?string $createdAt = null,
        CurrentBillingPeriodConsumedData|array|null $currentBillingPeriodConsumedData = null,
        CurrentDeviceLocation|array|null $currentDeviceLocation = null,
        ?string $currentImei = null,
        ?string $currentMcc = null,
        ?string $currentMnc = null,
        DataLimit|array|null $dataLimit = null,
        ?string $eid = null,
        EsimInstallationStatus|string|null $esimInstallationStatus = null,
        ?string $iccid = null,
        ?string $imsi = null,
        ?string $ipv4 = null,
        ?string $ipv6 = null,
        LiveDataSession|string|null $liveDataSession = null,
        ?string $msisdn = null,
        PinPukCodes|array|null $pinPukCodes = null,
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
        null !== $currentDeviceLocation && $self['currentDeviceLocation'] = $currentDeviceLocation;
        null !== $currentImei && $self['currentImei'] = $currentImei;
        null !== $currentMcc && $self['currentMcc'] = $currentMcc;
        null !== $currentMnc && $self['currentMnc'] = $currentMnc;
        null !== $dataLimit && $self['dataLimit'] = $dataLimit;
        null !== $eid && $self['eid'] = $eid;
        null !== $esimInstallationStatus && $self['esimInstallationStatus'] = $esimInstallationStatus;
        null !== $iccid && $self['iccid'] = $iccid;
        null !== $imsi && $self['imsi'] = $imsi;
        null !== $ipv4 && $self['ipv4'] = $ipv4;
        null !== $ipv6 && $self['ipv6'] = $ipv6;
        null !== $liveDataSession && $self['liveDataSession'] = $liveDataSession;
        null !== $msisdn && $self['msisdn'] = $msisdn;
        null !== $pinPukCodes && $self['pinPukCodes'] = $pinPukCodes;
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
     * @param CurrentBillingPeriodConsumedData|CurrentBillingPeriodConsumedDataShape $currentBillingPeriodConsumedData
     */
    public function withCurrentBillingPeriodConsumedData(
        CurrentBillingPeriodConsumedData|array $currentBillingPeriodConsumedData
    ): self {
        $self = clone $this;
        $self['currentBillingPeriodConsumedData'] = $currentBillingPeriodConsumedData;

        return $self;
    }

    /**
     * Current physical location data of a given SIM card. Accuracy is given in meters.
     *
     * @param CurrentDeviceLocation|CurrentDeviceLocationShape $currentDeviceLocation
     */
    public function withCurrentDeviceLocation(
        CurrentDeviceLocation|array $currentDeviceLocation
    ): self {
        $self = clone $this;
        $self['currentDeviceLocation'] = $currentDeviceLocation;

        return $self;
    }

    /**
     * IMEI of the device where a given SIM card is currently being used.
     */
    public function withCurrentImei(string $currentImei): self
    {
        $self = clone $this;
        $self['currentImei'] = $currentImei;

        return $self;
    }

    /**
     * Mobile Country Code of the current network to which the SIM card is connected. It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withCurrentMcc(string $currentMcc): self
    {
        $self = clone $this;
        $self['currentMcc'] = $currentMcc;

        return $self;
    }

    /**
     * Mobile Network Code of the current network to which the SIM card is connected. It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withCurrentMnc(string $currentMnc): self
    {
        $self = clone $this;
        $self['currentMnc'] = $currentMnc;

        return $self;
    }

    /**
     * The SIM card individual data limit configuration.
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
     * The SIM's address in the currently connected network. This IPv4 address is usually obtained dynamically, so it may vary according to the location or new connections.
     */
    public function withIpv4(string $ipv4): self
    {
        $self = clone $this;
        $self['ipv4'] = $ipv4;

        return $self;
    }

    /**
     * The SIM's address in the currently connected network. This IPv6 address is usually obtained dynamically, so it may vary according to the location or new connections.
     */
    public function withIpv6(string $ipv6): self
    {
        $self = clone $this;
        $self['ipv6'] = $ipv6;

        return $self;
    }

    /**
     * Indicates whether the device is actively connected to a network and able to run data.
     *
     * @param LiveDataSession|value-of<LiveDataSession> $liveDataSession
     */
    public function withLiveDataSession(
        LiveDataSession|string $liveDataSession
    ): self {
        $self = clone $this;
        $self['liveDataSession'] = $liveDataSession;

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

    /**
     * PIN and PUK codes for the SIM card. Only available when include_pin_puk_codes=true is set in the request.
     *
     * @param PinPukCodes|PinPukCodesShape $pinPukCodes
     */
    public function withPinPukCodes(PinPukCodes|array $pinPukCodes): self
    {
        $self = clone $this;
        $self['pinPukCodes'] = $pinPukCodes;

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
     * @param SimCardStatus|SimCardStatusShape $status
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
