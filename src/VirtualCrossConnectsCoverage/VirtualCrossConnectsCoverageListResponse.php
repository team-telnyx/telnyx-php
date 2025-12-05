<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse\Data;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse\Data\CloudProvider;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse\Data\Location;

/**
 * @phpstan-type VirtualCrossConnectsCoverageListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class VirtualCrossConnectsCoverageListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VirtualCrossConnectsCoverageListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     *   available_bandwidth?: list<float>|null,
     *   cloud_provider?: value-of<CloudProvider>|null,
     *   cloud_provider_region?: string|null,
     *   location?: Location|null,
     *   record_type?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   available_bandwidth?: list<float>|null,
     *   cloud_provider?: value-of<CloudProvider>|null,
     *   cloud_provider_region?: string|null,
     *   location?: Location|null,
     *   record_type?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
