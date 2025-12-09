<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpoint\Status;
use Telnyx\Metadata;

/**
 * @phpstan-type DynamicEmergencyEndpointListResponseShape = array{
 *   data?: list<DynamicEmergencyEndpoint>|null, meta?: Metadata|null
 * }
 */
final class DynamicEmergencyEndpointListResponse implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyEndpointListResponseShape> */
    use SdkModel;

    /** @var list<DynamicEmergencyEndpoint>|null $data */
    #[Optional(list: DynamicEmergencyEndpoint::class)]
    public ?array $data;

    #[Optional]
    public ?Metadata $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DynamicEmergencyEndpoint|array{
     *   callbackNumber: string,
     *   callerName: string,
     *   dynamicEmergencyAddressID: string,
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   sipFromID?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * }> $data
     * @param Metadata|array{
     *   pageNumber?: float|null,
     *   pageSize?: float|null,
     *   totalPages?: float|null,
     *   totalResults?: float|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Metadata|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<DynamicEmergencyEndpoint|array{
     *   callbackNumber: string,
     *   callerName: string,
     *   dynamicEmergencyAddressID: string,
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   sipFromID?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Metadata|array{
     *   pageNumber?: float|null,
     *   pageSize?: float|null,
     *   totalPages?: float|null,
     *   totalResults?: float|null,
     * } $meta
     */
    public function withMeta(Metadata|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
