<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers\WireguardPeerListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: string|null,
 *   publicKey?: string|null,
 *   lastSeen?: string|null,
 *   privateKey?: string|null,
 *   wireguardInterfaceID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    #[Optional('public_key')]
    public ?string $publicKey;

    /**
     * ISO 8601 formatted date-time indicating when peer sent traffic last time.
     */
    #[Optional('last_seen')]
    public ?string $lastSeen;

    /**
     * Your WireGuard `Interface.PrivateKey`.<br /><br />This attribute is only ever utlised if, on POST, you do NOT provide your own `public_key`. In which case, a new Public and Private key pair will be generated for you. When your `private_key` is returned, you must save this immediately as we do not save it within Telnyx. If you lose your Private Key, it can not be recovered.
     */
    #[Optional('private_key')]
    public ?string $privateKey;

    /**
     * The id of the wireguard interface associated with the peer.
     */
    #[Optional('wireguard_interface_id')]
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $publicKey && $self['publicKey'] = $publicKey;
        null !== $lastSeen && $self['lastSeen'] = $lastSeen;
        null !== $privateKey && $self['privateKey'] = $privateKey;
        null !== $wireguardInterfaceID && $self['wireguardInterfaceID'] = $wireguardInterfaceID;

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
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

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
     * The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    public function withPublicKey(string $publicKey): self
    {
        $self = clone $this;
        $self['publicKey'] = $publicKey;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when peer sent traffic last time.
     */
    public function withLastSeen(string $lastSeen): self
    {
        $self = clone $this;
        $self['lastSeen'] = $lastSeen;

        return $self;
    }

    /**
     * Your WireGuard `Interface.PrivateKey`.<br /><br />This attribute is only ever utlised if, on POST, you do NOT provide your own `public_key`. In which case, a new Public and Private key pair will be generated for you. When your `private_key` is returned, you must save this immediately as we do not save it within Telnyx. If you lose your Private Key, it can not be recovered.
     */
    public function withPrivateKey(string $privateKey): self
    {
        $self = clone $this;
        $self['privateKey'] = $privateKey;

        return $self;
    }

    /**
     * The id of the wireguard interface associated with the peer.
     */
    public function withWireguardInterfaceID(string $wireguardInterfaceID): self
    {
        $self = clone $this;
        $self['wireguardInterfaceID'] = $wireguardInterfaceID;

        return $self;
    }
}
