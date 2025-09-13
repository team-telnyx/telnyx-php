<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers\WireguardPeerNewResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type unnamed_type_with_intersection_parent33 = array{
 *   lastSeen?: string,
 *   privateKey?: string,
 *   recordType?: string,
 *   wireguardInterfaceID?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<unnamed_type_with_intersection_parent33> */
    use SdkModel;

    /**
     * ISO 8601 formatted date-time indicating when peer sent traffic last time.
     */
    #[Api('last_seen', optional: true)]
    public ?string $lastSeen;

    /**
     * Your WireGuard `Interface.PrivateKey`.<br /><br />This attribute is only ever utlised if, on POST, you do NOT provide your own `public_key`. In which case, a new Public and Private key pair will be generated for you. When your `private_key` is returned, you must save this immediately as we do not save it within Telnyx. If you lose your Private Key, it can not be recovered.
     */
    #[Api('private_key', optional: true)]
    public ?string $privateKey;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The id of the wireguard interface associated with the peer.
     */
    #[Api('wireguard_interface_id', optional: true)]
    public ?string $wireguardInterfaceID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $lastSeen = null,
        ?string $privateKey = null,
        ?string $recordType = null,
        ?string $wireguardInterfaceID = null,
    ): self {
        $obj = new self;

        null !== $lastSeen && $obj->lastSeen = $lastSeen;
        null !== $privateKey && $obj->privateKey = $privateKey;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $wireguardInterfaceID && $obj->wireguardInterfaceID = $wireguardInterfaceID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when peer sent traffic last time.
     */
    public function withLastSeen(string $lastSeen): self
    {
        $obj = clone $this;
        $obj->lastSeen = $lastSeen;

        return $obj;
    }

    /**
     * Your WireGuard `Interface.PrivateKey`.<br /><br />This attribute is only ever utlised if, on POST, you do NOT provide your own `public_key`. In which case, a new Public and Private key pair will be generated for you. When your `private_key` is returned, you must save this immediately as we do not save it within Telnyx. If you lose your Private Key, it can not be recovered.
     */
    public function withPrivateKey(string $privateKey): self
    {
        $obj = clone $this;
        $obj->privateKey = $privateKey;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The id of the wireguard interface associated with the peer.
     */
    public function withWireguardInterfaceID(string $wireguardInterfaceID): self
    {
        $obj = clone $this;
        $obj->wireguardInterfaceID = $wireguardInterfaceID;

        return $obj;
    }
}
