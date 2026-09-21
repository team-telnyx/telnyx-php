<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\FuncGetLogsResponse;

use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncRuntimeLogsResponse\Data;
use Telnyx\Compute\Funcs\LogsMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncRuntimeLogsResponse\Data
 * @phpstan-import-type LogsMetaShape from \Telnyx\Compute\Funcs\LogsMeta
 *
 * @phpstan-type FuncRuntimeLogsResponseShape = array{
 *   data?: list<Data|DataShape>|null, meta?: null|LogsMeta|LogsMetaShape
 * }
 */
final class FuncRuntimeLogsResponse implements BaseModel
{
    /** @use SdkModel<FuncRuntimeLogsResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?LogsMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|DataShape>|null $data
     * @param LogsMeta|LogsMetaShape|null $meta
     */
    public static function with(
        ?array $data = null,
        LogsMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param LogsMeta|LogsMetaShape $meta
     */
    public function withMeta(LogsMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
