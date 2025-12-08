<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\PaginationMetaSimple;
use Telnyx\Storage\MigrationSources\MigrationSourceParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceParams\ProviderAuth;

/**
 * @phpstan-type MigrationSourceListResponseShape = array{
 *   data?: list<MigrationSourceParams>|null, meta?: PaginationMetaSimple|null
 * }
 */
final class MigrationSourceListResponse implements BaseModel
{
    /** @use SdkModel<MigrationSourceListResponseShape> */
    use SdkModel;

    /** @var list<MigrationSourceParams>|null $data */
    #[Optional(list: MigrationSourceParams::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMetaSimple $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MigrationSourceParams|array{
     *   bucket_name: string,
     *   provider: value-of<Provider>,
     *   provider_auth: ProviderAuth,
     *   id?: string|null,
     *   source_region?: string|null,
     * }> $data
     * @param PaginationMetaSimple|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMetaSimple|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<MigrationSourceParams|array{
     *   bucket_name: string,
     *   provider: value-of<Provider>,
     *   provider_auth: ProviderAuth,
     *   id?: string|null,
     *   source_region?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMetaSimple|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMetaSimple|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
