<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse\LogType;

/**
 * This object represents a wireless connectivity session log that happened through a SIM card. It aids in finding out potential problems when the SIM is not able to attach properly.
 *
 * @phpstan-type SimCardListWirelessConnectivityLogsResponseShape = array{
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
final class SimCardListWirelessConnectivityLogsResponse implements BaseModel
{
    /** @use SdkModel<SimCardListWirelessConnectivityLogsResponseShape> */
    use SdkModel;

    /**
     * Uniquely identifies the session.
     */
    #[Optional]
    public ?int $id;

    /**
     * The Access Point Name (APN) identifies the packet data network that a mobile data user wants to communicate with.
     */
    #[Optional]
    public ?string $apn;

    /**
     * The cell ID to which the SIM connected.
     */
    #[Optional('cell_id')]
    public ?string $cellID;

    /**
     * ISO 8601 formatted date-time indicating when the record was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * The International Mobile Equipment Identity (or IMEI) is a number, usually unique, that identifies the device currently being used connect to the network.
     */
    #[Optional]
    public ?string $imei;

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
     * ISO 8601 formatted date-time indicating when the last heartbeat to the device was successfully recorded.
     */
    #[Optional('last_seen')]
    public ?string $lastSeen;

    /**
     * The type of the session, 'registration' being the initial authentication session and 'data' the actual data transfer sessions.
     *
     * @var value-of<LogType>|null $logType
     */
    #[Optional('log_type', enum: LogType::class)]
    public ?string $logType;

    /**
     * It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Optional('mobile_country_code')]
    public ?string $mobileCountryCode;

    /**
     * It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Optional('mobile_network_code')]
    public ?string $mobileNetworkCode;

    /**
     * The radio technology the SIM card used during the session.
     */
    #[Optional('radio_access_technology')]
    public ?string $radioAccessTechnology;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The identification UUID of the related SIM card resource.
     */
    #[Optional('sim_card_id')]
    public ?string $simCardID;

    /**
     * ISO 8601 formatted date-time indicating when the session started.
     */
    #[Optional('start_time')]
    public ?string $startTime;

    /**
     * The state of the SIM card after when the session happened.
     */
    #[Optional]
    public ?string $state;

    /**
     * ISO 8601 formatted date-time indicating when the session ended.
     */
    #[Optional('stop_time')]
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $apn && $self['apn'] = $apn;
        null !== $cellID && $self['cellID'] = $cellID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $imei && $self['imei'] = $imei;
        null !== $imsi && $self['imsi'] = $imsi;
        null !== $ipv4 && $self['ipv4'] = $ipv4;
        null !== $ipv6 && $self['ipv6'] = $ipv6;
        null !== $lastSeen && $self['lastSeen'] = $lastSeen;
        null !== $logType && $self['logType'] = $logType;
        null !== $mobileCountryCode && $self['mobileCountryCode'] = $mobileCountryCode;
        null !== $mobileNetworkCode && $self['mobileNetworkCode'] = $mobileNetworkCode;
        null !== $radioAccessTechnology && $self['radioAccessTechnology'] = $radioAccessTechnology;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $simCardID && $self['simCardID'] = $simCardID;
        null !== $startTime && $self['startTime'] = $startTime;
        null !== $state && $self['state'] = $state;
        null !== $stopTime && $self['stopTime'] = $stopTime;

        return $self;
    }

    /**
     * Uniquely identifies the session.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The Access Point Name (APN) identifies the packet data network that a mobile data user wants to communicate with.
     */
    public function withApn(string $apn): self
    {
        $self = clone $this;
        $self['apn'] = $apn;

        return $self;
    }

    /**
     * The cell ID to which the SIM connected.
     */
    public function withCellID(string $cellID): self
    {
        $self = clone $this;
        $self['cellID'] = $cellID;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the record was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The International Mobile Equipment Identity (or IMEI) is a number, usually unique, that identifies the device currently being used connect to the network.
     */
    public function withImei(string $imei): self
    {
        $self = clone $this;
        $self['imei'] = $imei;

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
     * ISO 8601 formatted date-time indicating when the last heartbeat to the device was successfully recorded.
     */
    public function withLastSeen(string $lastSeen): self
    {
        $self = clone $this;
        $self['lastSeen'] = $lastSeen;

        return $self;
    }

    /**
     * The type of the session, 'registration' being the initial authentication session and 'data' the actual data transfer sessions.
     *
     * @param LogType|value-of<LogType> $logType
     */
    public function withLogType(LogType|string $logType): self
    {
        $self = clone $this;
        $self['logType'] = $logType;

        return $self;
    }

    /**
     * It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withMobileCountryCode(string $mobileCountryCode): self
    {
        $self = clone $this;
        $self['mobileCountryCode'] = $mobileCountryCode;

        return $self;
    }

    /**
     * It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withMobileNetworkCode(string $mobileNetworkCode): self
    {
        $self = clone $this;
        $self['mobileNetworkCode'] = $mobileNetworkCode;

        return $self;
    }

    /**
     * The radio technology the SIM card used during the session.
     */
    public function withRadioAccessTechnology(
        string $radioAccessTechnology
    ): self {
        $self = clone $this;
        $self['radioAccessTechnology'] = $radioAccessTechnology;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The identification UUID of the related SIM card resource.
     */
    public function withSimCardID(string $simCardID): self
    {
        $self = clone $this;
        $self['simCardID'] = $simCardID;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the session started.
     */
    public function withStartTime(string $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * The state of the SIM card after when the session happened.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the session ended.
     */
    public function withStopTime(string $stopTime): self
    {
        $self = clone $this;
        $self['stopTime'] = $stopTime;

        return $self;
    }
}
