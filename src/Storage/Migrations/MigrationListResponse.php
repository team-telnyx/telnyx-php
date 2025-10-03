<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Storage\Buckets\Usage\PaginationMetaSimple;

/**
 * @phpstan-type migration_list_response = array{
 *   data?: list<MigrationParams>, meta?: PaginationMetaSimple
 * }
 */
final class MigrationListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<migration_list_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<MigrationParams>|null $data */
    #[Api(list: MigrationParams::class, optional: true)]
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
     * @param list<MigrationParams> $data
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
     * @param list<MigrationParams> $data
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
