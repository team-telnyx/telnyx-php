<?php

declare(strict_types=1);

namespace Telnyx\Networks\DefaultGateway\DefaultGatewayGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;

/**
 * @phpstan-type data_alias = array{
 *   networkID?: string|null,
 *   recordType?: string|null,
 *   status?: value-of<InterfaceStatus>|null,
 *   wireguardPeerID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Network ID.
     */
    #[Api('network_id', optional: true)]
    public ?string $networkID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The current status of the interface deployment.
     *
     * @var value-of<InterfaceStatus>|null $status
     */
    #[Api(enum: InterfaceStatus::class, optional: true)]
    public ?string $status;

    /**
     * Wireguard peer ID.
     */
    #[Api('wireguard_peer_id', optional: true)]
    public ?string $wireguardPeerID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public static function with(
        ?string $networkID = null,
        ?string $recordType = null,
        InterfaceStatus|string|null $status = null,
        ?string $wireguardPeerID = null,
    ): self {
        $obj = new self;

        null !== $networkID && $obj->networkID = $networkID;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $status && $obj->status = $status instanceof InterfaceStatus ? $status->value : $status;
        null !== $wireguardPeerID && $obj->wireguardPeerID = $wireguardPeerID;

        return $obj;
    }

    /**
     * Network ID.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj->networkID = $networkID;

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
     * The current status of the interface deployment.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public function withStatus(InterfaceStatus|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof InterfaceStatus ? $status->value : $status;

        return $obj;
    }

    /**
     * Wireguard peer ID.
     */
    public function withWireguardPeerID(string $wireguardPeerID): self
    {
        $obj = clone $this;
        $obj->wireguardPeerID = $wireguardPeerID;

        return $obj;
    }
}
