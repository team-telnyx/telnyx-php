<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers\WireguardPeerUpdateResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   id?: string,
 *   createdAt?: string,
 *   recordType?: string,
 *   updatedAt?: string,
 *   publicKey?: string,
 *   lastSeen?: string,
 *   privateKey?: string,
 *   wireguardInterfaceID?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

    /**
     * The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    #[Api('public_key', optional: true)]
    public ?string $publicKey;

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
        ?string $id = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?string $updatedAt = null,
        ?string $publicKey = null,
        ?string $lastSeen = null,
        ?string $privateKey = null,
        ?string $wireguardInterfaceID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $publicKey && $obj->publicKey = $publicKey;
        null !== $lastSeen && $obj->lastSeen = $lastSeen;
        null !== $privateKey && $obj->privateKey = $privateKey;
        null !== $wireguardInterfaceID && $obj->wireguardInterfaceID = $wireguardInterfaceID;

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
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    public function withPublicKey(string $publicKey): self
    {
        $obj = clone $this;
        $obj->publicKey = $publicKey;

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
     * The id of the wireguard interface associated with the peer.
     */
    public function withWireguardInterfaceID(string $wireguardInterfaceID): self
    {
        $obj = clone $this;
        $obj->wireguardInterfaceID = $wireguardInterfaceID;

        return $obj;
    }
}
