<?php

declare(strict_types=1);

namespace Telnyx\Storage\Sqldbs\Actions\ActionQueryResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Storage\Sqldbs\Actions\ActionQueryResponse\Data\Meta;

/**
 * @phpstan-import-type MetaShape from \Telnyx\Storage\Sqldbs\Actions\ActionQueryResponse\Data\Meta
 *
 * @phpstan-type DataShape = array{
 *   count?: int|null,
 *   duration?: float|null,
 *   meta?: null|Meta|MetaShape,
 *   results?: list<array<string,mixed>>|null,
 *   success?: bool|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Number of rows returned.
     */
    #[Optional]
    public ?int $count;

    /**
     * Wall-clock duration of the request, in milliseconds.
     */
    #[Optional]
    public ?float $duration;

    #[Optional]
    public ?Meta $meta;

    /**
     * The result rows, each a map of column name to value. Empty for statements that return no rows.
     *
     * @var list<array<string,mixed>>|null $results
     */
    #[Optional(list: new MapOf('mixed'))]
    public ?array $results;

    #[Optional]
    public ?bool $success;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Meta|MetaShape|null $meta
     * @param list<array<string,mixed>>|null $results
     */
    public static function with(
        ?int $count = null,
        ?float $duration = null,
        Meta|array|null $meta = null,
        ?array $results = null,
        ?bool $success = null,
    ): self {
        $self = new self;

        null !== $count && $self['count'] = $count;
        null !== $duration && $self['duration'] = $duration;
        null !== $meta && $self['meta'] = $meta;
        null !== $results && $self['results'] = $results;
        null !== $success && $self['success'] = $success;

        return $self;
    }

    /**
     * Number of rows returned.
     */
    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * Wall-clock duration of the request, in milliseconds.
     */
    public function withDuration(float $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * The result rows, each a map of column name to value. Empty for statements that return no rows.
     *
     * @param list<array<string,mixed>> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
