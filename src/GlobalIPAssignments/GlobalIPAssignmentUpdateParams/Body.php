<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type unnamed_type_with_intersection_parent38 = array{
 *   globalIPID?: string, wireguardPeerID?: string
 * }
 */
final class Body implements BaseModel
{
    /** @use SdkModel<unnamed_type_with_intersection_parent38> */
    use SdkModel;

    #[Api('global_ip_id', optional: true)]
    public ?string $globalIPID;

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
     */
    public static function with(
        ?string $globalIPID = null,
        ?string $wireguardPeerID = null
    ): self {
        $obj = new self;

        null !== $globalIPID && $obj->globalIPID = $globalIPID;
        null !== $wireguardPeerID && $obj->wireguardPeerID = $wireguardPeerID;

        return $obj;
    }

    public function withGlobalIPID(string $globalIPID): self
    {
        $obj = clone $this;
        $obj->globalIPID = $globalIPID;

        return $obj;
    }

    public function withWireguardPeerID(string $wireguardPeerID): self
    {
        $obj = clone $this;
        $obj->wireguardPeerID = $wireguardPeerID;

        return $obj;
    }
}
