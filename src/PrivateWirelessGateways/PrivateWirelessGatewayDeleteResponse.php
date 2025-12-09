<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PrivateWirelessGatewayDeleteResponseShape = array{
 *   data?: PrivateWirelessGateway|null
 * }
 */
final class PrivateWirelessGatewayDeleteResponse implements BaseModel
{
    /** @use SdkModel<PrivateWirelessGatewayDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PrivateWirelessGateway $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PrivateWirelessGateway|array{
     *   id?: string|null,
     *   assignedResources?: list<PwgAssignedResourcesSummary>|null,
     *   createdAt?: string|null,
     *   ipRange?: string|null,
     *   name?: string|null,
     *   networkID?: string|null,
     *   recordType?: string|null,
     *   regionCode?: string|null,
     *   status?: PrivateWirelessGatewayStatus|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(PrivateWirelessGateway|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PrivateWirelessGateway|array{
     *   id?: string|null,
     *   assignedResources?: list<PwgAssignedResourcesSummary>|null,
     *   createdAt?: string|null,
     *   ipRange?: string|null,
     *   name?: string|null,
     *   networkID?: string|null,
     *   recordType?: string|null,
     *   regionCode?: string|null,
     *   status?: PrivateWirelessGatewayStatus|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(PrivateWirelessGateway|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
