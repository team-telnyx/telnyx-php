<?php

declare(strict_types=1);

namespace Telnyx\Connections\ConnectionListActiveCallsResponse;

use Telnyx\Connections\ConnectionListActiveCallsResponse\Meta\Cursors;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type meta_alias = array{
 *   cursors?: Cursors|null,
 *   next?: string|null,
 *   previous?: string|null,
 *   totalItems?: int|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<meta_alias> */
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

    #[Api('total_items', optional: true)]
    public ?int $totalItems;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?Cursors $cursors = null,
        ?string $next = null,
        ?string $previous = null,
        ?int $totalItems = null,
    ): self {
        $obj = new self;

        null !== $cursors && $obj->cursors = $cursors;
        null !== $next && $obj->next = $next;
        null !== $previous && $obj->previous = $previous;
        null !== $totalItems && $obj->totalItems = $totalItems;

        return $obj;
    }

    public function withCursors(Cursors $cursors): self
    {
        $obj = clone $this;
        $obj->cursors = $cursors;

        return $obj;
    }

    /**
     * Path to next page.
     */
    public function withNext(string $next): self
    {
        $obj = clone $this;
        $obj->next = $next;

        return $obj;
    }

    /**
     * Path to previous page.
     */
    public function withPrevious(string $previous): self
    {
        $obj = clone $this;
        $obj->previous = $previous;

        return $obj;
    }

    public function withTotalItems(int $totalItems): self
    {
        $obj = clone $this;
        $obj->totalItems = $totalItems;

        return $obj;
    }
}
