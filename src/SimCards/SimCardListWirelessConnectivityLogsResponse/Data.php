<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse\Data\LogType;

/**
 * This object represents a wireless connectivity session log that happened through a SIM card. It aids in finding out potential problems when the SIM is not able to attach properly.
 *
 * @phpstan-type data_alias = array{
 *   id?: int|null,
 *   apn?: string|null,
 *   cellID?: string|null,
 *   createdAt?: string|null,
 *   imei?: string|null,
 *   imsi?: string|null,
 *   ipv4?: string|null,
 *   ipv6?: string|null,
 *   lastSeen?: string|null,
 *   logType?: value-of<LogType>|null,
 *   mobileCountryCode?: string|null,
 *   mobileNetworkCode?: string|null,
 *   radioAccessTechnology?: string|null,
 *   recordType?: string|null,
 *   simCardID?: string|null,
 *   startTime?: string|null,
 *   state?: string|null,
 *   stopTime?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Uniquely identifies the session.
     */
    #[Api(optional: true)]
    public ?int $id;

    /**
     * The Access Point Name (APN) identifies the packet data network that a mobile data user wants to communicate with.
     */
    #[Api(optional: true)]
    public ?string $apn;

    /**
     * The cell ID to which the SIM connected.
     */
    #[Api('cell_id', optional: true)]
    public ?string $cellID;

    /**
     * ISO 8601 formatted date-time indicating when the record was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * The International Mobile Equipment Identity (or IMEI) is a number, usually unique, that identifies the device currently being used connect to the network.
     */
    #[Api(optional: true)]
    public ?string $imei;

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
     * ISO 8601 formatted date-time indicating when the last heartbeat to the device was successfully recorded.
     */
    #[Api('last_seen', optional: true)]
    public ?string $lastSeen;

    /**
     * The type of the session, 'registration' being the initial authentication session and 'data' the actual data transfer sessions.
     *
     * @var value-of<LogType>|null $logType
     */
    #[Api('log_type', enum: LogType::class, optional: true)]
    public ?string $logType;

    /**
     * It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Api('mobile_country_code', optional: true)]
    public ?string $mobileCountryCode;

    /**
     * It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Api('mobile_network_code', optional: true)]
    public ?string $mobileNetworkCode;

    /**
     * The radio technology the SIM card used during the session.
     */
    #[Api('radio_access_technology', optional: true)]
    public ?string $radioAccessTechnology;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The identification UUID of the related SIM card resource.
     */
    #[Api('sim_card_id', optional: true)]
    public ?string $simCardID;

    /**
     * ISO 8601 formatted date-time indicating when the session started.
     */
    #[Api('start_time', optional: true)]
    public ?string $startTime;

    /**
     * The state of the SIM card after when the session happened.
     */
    #[Api(optional: true)]
    public ?string $state;

    /**
     * ISO 8601 formatted date-time indicating when the session ended.
     */
    #[Api('stop_time', optional: true)]
    public ?string $stopTime;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param LogType|value-of<LogType> $logType
     */
    public static function with(
        ?int $id = null,
        ?string $apn = null,
        ?string $cellID = null,
        ?string $createdAt = null,
        ?string $imei = null,
        ?string $imsi = null,
        ?string $ipv4 = null,
        ?string $ipv6 = null,
        ?string $lastSeen = null,
        LogType|string|null $logType = null,
        ?string $mobileCountryCode = null,
        ?string $mobileNetworkCode = null,
        ?string $radioAccessTechnology = null,
        ?string $recordType = null,
        ?string $simCardID = null,
        ?string $startTime = null,
        ?string $state = null,
        ?string $stopTime = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $apn && $obj->apn = $apn;
        null !== $cellID && $obj->cellID = $cellID;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $imei && $obj->imei = $imei;
        null !== $imsi && $obj->imsi = $imsi;
        null !== $ipv4 && $obj->ipv4 = $ipv4;
        null !== $ipv6 && $obj->ipv6 = $ipv6;
        null !== $lastSeen && $obj->lastSeen = $lastSeen;
        null !== $logType && $obj->logType = $logType instanceof LogType ? $logType->value : $logType;
        null !== $mobileCountryCode && $obj->mobileCountryCode = $mobileCountryCode;
        null !== $mobileNetworkCode && $obj->mobileNetworkCode = $mobileNetworkCode;
        null !== $radioAccessTechnology && $obj->radioAccessTechnology = $radioAccessTechnology;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $simCardID && $obj->simCardID = $simCardID;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $state && $obj->state = $state;
        null !== $stopTime && $obj->stopTime = $stopTime;

        return $obj;
    }

    /**
     * Uniquely identifies the session.
     */
    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The Access Point Name (APN) identifies the packet data network that a mobile data user wants to communicate with.
     */
    public function withApn(string $apn): self
    {
        $obj = clone $this;
        $obj->apn = $apn;

        return $obj;
    }

    /**
     * The cell ID to which the SIM connected.
     */
    public function withCellID(string $cellID): self
    {
        $obj = clone $this;
        $obj->cellID = $cellID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the record was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The International Mobile Equipment Identity (or IMEI) is a number, usually unique, that identifies the device currently being used connect to the network.
     */
    public function withImei(string $imei): self
    {
        $obj = clone $this;
        $obj->imei = $imei;

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
     * ISO 8601 formatted date-time indicating when the last heartbeat to the device was successfully recorded.
     */
    public function withLastSeen(string $lastSeen): self
    {
        $obj = clone $this;
        $obj->lastSeen = $lastSeen;

        return $obj;
    }

    /**
     * The type of the session, 'registration' being the initial authentication session and 'data' the actual data transfer sessions.
     *
     * @param LogType|value-of<LogType> $logType
     */
    public function withLogType(LogType|string $logType): self
    {
        $obj = clone $this;
        $obj->logType = $logType instanceof LogType ? $logType->value : $logType;

        return $obj;
    }

    /**
     * It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withMobileCountryCode(string $mobileCountryCode): self
    {
        $obj = clone $this;
        $obj->mobileCountryCode = $mobileCountryCode;

        return $obj;
    }

    /**
     * It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withMobileNetworkCode(string $mobileNetworkCode): self
    {
        $obj = clone $this;
        $obj->mobileNetworkCode = $mobileNetworkCode;

        return $obj;
    }

    /**
     * The radio technology the SIM card used during the session.
     */
    public function withRadioAccessTechnology(
        string $radioAccessTechnology
    ): self {
        $obj = clone $this;
        $obj->radioAccessTechnology = $radioAccessTechnology;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The identification UUID of the related SIM card resource.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj->simCardID = $simCardID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the session started.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * The state of the SIM card after when the session happened.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the session ended.
     */
    public function withStopTime(string $stopTime): self
    {
        $obj = clone $this;
        $obj->stopTime = $stopTime;

        return $obj;
    }
}
