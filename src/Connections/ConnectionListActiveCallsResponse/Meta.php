<?php

declare(strict_types=1);

namespace Telnyx\Connections\ConnectionListActiveCallsResponse;

use Telnyx\Connections\ConnectionListActiveCallsResponse\Meta\Cursors;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   cursors?: Cursors|null,
 *   next?: string|null,
 *   previous?: string|null,
 *   total_items?: int|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Cursors $cursors;

    /**
     * Path to next page.
     */
    #[Api(optional: true)]
    public ?string $next;

    /**
     * Path to previous page.
     */
    #[Api(optional: true)]
    public ?string $previous;

    #[Api(optional: true)]
    public ?int $total_items;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Cursors|array{after?: string|null, before?: string|null} $cursors
     */
    public static function with(
        Cursors|array|null $cursors = null,
        ?string $next = null,
        ?string $previous = null,
        ?int $total_items = null,
    ): self {
        $obj = new self;

        null !== $cursors && $obj['cursors'] = $cursors;
        null !== $next && $obj['next'] = $next;
        null !== $previous && $obj['previous'] = $previous;
        null !== $total_items && $obj['total_items'] = $total_items;

        return $obj;
    }

    /**
     * @param Cursors|array{after?: string|null, before?: string|null} $cursors
     */
    public function withCursors(Cursors|array $cursors): self
    {
        $obj = clone $this;
        $obj['cursors'] = $cursors;

        return $obj;
    }

    /**
     * Path to next page.
     */
    public function withNext(string $next): self
    {
        $obj = clone $this;
        $obj['next'] = $next;

        return $obj;
    }

    /**
     * Path to previous page.
     */
    public function withPrevious(string $previous): self
    {
        $obj = clone $this;
        $obj['previous'] = $previous;

        return $obj;
    }

    public function withTotalItems(int $totalItems): self
    {
        $obj = clone $this;
        $obj['total_items'] = $totalItems;

        return $obj;
    }
}
