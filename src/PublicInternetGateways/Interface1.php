<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;

/**
 * @phpstan-type Interface1Shape = array{
 *   name?: string|null,
 *   network_id?: string|null,
 *   status?: value-of<InterfaceStatus>|null,
 * }
 */
final class Interface1 implements BaseModel
{
    /** @use SdkModel<Interface1Shape> */
    use SdkModel;

    /**
     * A user specified name for the interface.
     */
    #[Optional]
    public ?string $name;

    /**
     * The id of the network associated with the interface.
     */
    #[Optional]
    public ?string $network_id;

    /**
     * The current status of the interface deployment.
     *
     * @var value-of<InterfaceStatus>|null $status
     */
    #[Optional(enum: InterfaceStatus::class)]
    public ?string $status;

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
        ?string $name = null,
        ?string $network_id = null,
        InterfaceStatus|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $name && $obj['name'] = $name;
        null !== $network_id && $obj['network_id'] = $network_id;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj['network_id'] = $networkID;

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
        $obj['status'] = $status;

        return $obj;
    }
}
