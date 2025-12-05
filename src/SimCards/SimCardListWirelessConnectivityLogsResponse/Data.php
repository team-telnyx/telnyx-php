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
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   apn?: string|null,
 *   cell_id?: string|null,
 *   created_at?: string|null,
 *   imei?: string|null,
 *   imsi?: string|null,
 *   ipv4?: string|null,
 *   ipv6?: string|null,
 *   last_seen?: string|null,
 *   log_type?: value-of<LogType>|null,
 *   mobile_country_code?: string|null,
 *   mobile_network_code?: string|null,
 *   radio_access_technology?: string|null,
 *   record_type?: string|null,
 *   sim_card_id?: string|null,
 *   start_time?: string|null,
 *   state?: string|null,
 *   stop_time?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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
    #[Api(optional: true)]
    public ?string $cell_id;

    /**
     * ISO 8601 formatted date-time indicating when the record was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

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
    #[Api(optional: true)]
    public ?string $last_seen;

    /**
     * The type of the session, 'registration' being the initial authentication session and 'data' the actual data transfer sessions.
     *
     * @var value-of<LogType>|null $log_type
     */
    #[Api(enum: LogType::class, optional: true)]
    public ?string $log_type;

    /**
     * It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Api(optional: true)]
    public ?string $mobile_country_code;

    /**
     * It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Api(optional: true)]
    public ?string $mobile_network_code;

    /**
     * The radio technology the SIM card used during the session.
     */
    #[Api(optional: true)]
    public ?string $radio_access_technology;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * The identification UUID of the related SIM card resource.
     */
    #[Api(optional: true)]
    public ?string $sim_card_id;

    /**
     * ISO 8601 formatted date-time indicating when the session started.
     */
    #[Api(optional: true)]
    public ?string $start_time;

    /**
     * The state of the SIM card after when the session happened.
     */
    #[Api(optional: true)]
    public ?string $state;

    /**
     * ISO 8601 formatted date-time indicating when the session ended.
     */
    #[Api(optional: true)]
    public ?string $stop_time;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param LogType|value-of<LogType> $log_type
     */
    public static function with(
        ?int $id = null,
        ?string $apn = null,
        ?string $cell_id = null,
        ?string $created_at = null,
        ?string $imei = null,
        ?string $imsi = null,
        ?string $ipv4 = null,
        ?string $ipv6 = null,
        ?string $last_seen = null,
        LogType|string|null $log_type = null,
        ?string $mobile_country_code = null,
        ?string $mobile_network_code = null,
        ?string $radio_access_technology = null,
        ?string $record_type = null,
        ?string $sim_card_id = null,
        ?string $start_time = null,
        ?string $state = null,
        ?string $stop_time = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $apn && $obj['apn'] = $apn;
        null !== $cell_id && $obj['cell_id'] = $cell_id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $imei && $obj['imei'] = $imei;
        null !== $imsi && $obj['imsi'] = $imsi;
        null !== $ipv4 && $obj['ipv4'] = $ipv4;
        null !== $ipv6 && $obj['ipv6'] = $ipv6;
        null !== $last_seen && $obj['last_seen'] = $last_seen;
        null !== $log_type && $obj['log_type'] = $log_type;
        null !== $mobile_country_code && $obj['mobile_country_code'] = $mobile_country_code;
        null !== $mobile_network_code && $obj['mobile_network_code'] = $mobile_network_code;
        null !== $radio_access_technology && $obj['radio_access_technology'] = $radio_access_technology;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $sim_card_id && $obj['sim_card_id'] = $sim_card_id;
        null !== $start_time && $obj['start_time'] = $start_time;
        null !== $state && $obj['state'] = $state;
        null !== $stop_time && $obj['stop_time'] = $stop_time;

        return $obj;
    }

    /**
     * Uniquely identifies the session.
     */
    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The Access Point Name (APN) identifies the packet data network that a mobile data user wants to communicate with.
     */
    public function withApn(string $apn): self
    {
        $obj = clone $this;
        $obj['apn'] = $apn;

        return $obj;
    }

    /**
     * The cell ID to which the SIM connected.
     */
    public function withCellID(string $cellID): self
    {
        $obj = clone $this;
        $obj['cell_id'] = $cellID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the record was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The International Mobile Equipment Identity (or IMEI) is a number, usually unique, that identifies the device currently being used connect to the network.
     */
    public function withImei(string $imei): self
    {
        $obj = clone $this;
        $obj['imei'] = $imei;

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
     * The SIM's address in the currently connected network. This IPv4 address is usually obtained dynamically, so it may vary according to the location or new connections.
     */
    public function withIpv4(string $ipv4): self
    {
        $obj = clone $this;
        $obj['ipv4'] = $ipv4;

        return $obj;
    }

    /**
     * The SIM's address in the currently connected network. This IPv6 address is usually obtained dynamically, so it may vary according to the location or new connections.
     */
    public function withIpv6(string $ipv6): self
    {
        $obj = clone $this;
        $obj['ipv6'] = $ipv6;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the last heartbeat to the device was successfully recorded.
     */
    public function withLastSeen(string $lastSeen): self
    {
        $obj = clone $this;
        $obj['last_seen'] = $lastSeen;

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
        $obj['log_type'] = $logType;

        return $obj;
    }

    /**
     * It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withMobileCountryCode(string $mobileCountryCode): self
    {
        $obj = clone $this;
        $obj['mobile_country_code'] = $mobileCountryCode;

        return $obj;
    }

    /**
     * It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withMobileNetworkCode(string $mobileNetworkCode): self
    {
        $obj = clone $this;
        $obj['mobile_network_code'] = $mobileNetworkCode;

        return $obj;
    }

    /**
     * The radio technology the SIM card used during the session.
     */
    public function withRadioAccessTechnology(
        string $radioAccessTechnology
    ): self {
        $obj = clone $this;
        $obj['radio_access_technology'] = $radioAccessTechnology;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The identification UUID of the related SIM card resource.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['sim_card_id'] = $simCardID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the session started.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj['start_time'] = $startTime;

        return $obj;
    }

    /**
     * The state of the SIM card after when the session happened.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the session ended.
     */
    public function withStopTime(string $stopTime): self
    {
        $obj = clone $this;
        $obj['stop_time'] = $stopTime;

        return $obj;
    }
}
