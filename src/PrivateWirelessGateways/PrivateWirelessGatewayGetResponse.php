<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PrivateWirelessGatewayGetResponseShape = array{
 *   data?: PrivateWirelessGateway|null
 * }
 */
final class PrivateWirelessGatewayGetResponse implements BaseModel
{
    /** @use SdkModel<PrivateWirelessGatewayGetResponseShape> */
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
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
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
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
