<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse\Data;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse\Data\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse\Data\Region;

/**
 * @phpstan-type VirtualCrossConnectListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class VirtualCrossConnectListResponse implements BaseModel
{
    /** @use SdkModel<VirtualCrossConnectListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     *   name?: string|null,
     *   networkID?: string|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   regionCode?: string|null,
     *   bgpAsn: float,
     *   cloudProvider: value-of<CloudProvider>,
     *   cloudProviderRegion: string,
     *   primaryCloudAccountID: string,
     *   bandwidthMbps?: float|null,
     *   primaryBgpKey?: string|null,
     *   primaryCloudIP?: string|null,
     *   primaryEnabled?: bool|null,
     *   primaryRoutingAnnouncement?: bool|null,
     *   primaryTelnyxIP?: string|null,
     *   region?: Region|null,
     *   secondaryBgpKey?: string|null,
     *   secondaryCloudAccountID?: string|null,
     *   secondaryCloudIP?: string|null,
     *   secondaryEnabled?: bool|null,
     *   secondaryRoutingAnnouncement?: bool|null,
     *   secondaryTelnyxIP?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     *   name?: string|null,
     *   networkID?: string|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   regionCode?: string|null,
     *   bgpAsn: float,
     *   cloudProvider: value-of<CloudProvider>,
     *   cloudProviderRegion: string,
     *   primaryCloudAccountID: string,
     *   bandwidthMbps?: float|null,
     *   primaryBgpKey?: string|null,
     *   primaryCloudIP?: string|null,
     *   primaryEnabled?: bool|null,
     *   primaryRoutingAnnouncement?: bool|null,
     *   primaryTelnyxIP?: string|null,
     *   region?: Region|null,
     *   secondaryBgpKey?: string|null,
     *   secondaryCloudAccountID?: string|null,
     *   secondaryCloudIP?: string|null,
     *   secondaryEnabled?: bool|null,
     *   secondaryRoutingAnnouncement?: bool|null,
     *   secondaryTelnyxIP?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
