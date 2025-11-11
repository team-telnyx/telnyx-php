<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Storage\Buckets\Usage\PaginationMetaSimple;

/**
 * @phpstan-type MigrationSourceListResponseShape = array{
 *   data?: list<MigrationSourceParams>|null, meta?: PaginationMetaSimple|null
 * }
 */
final class MigrationSourceListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MigrationSourceListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<MigrationSourceParams>|null $data */
    #[Api(list: MigrationSourceParams::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * @param list<MigrationSourceParams> $data
     */
    public static function with(
        ?array $data = null,
        ?PaginationMetaSimple $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<MigrationSourceParams> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(PaginationMetaSimple $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
