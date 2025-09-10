<?php

declare(strict_types=1);

namespace Telnyx\Connections\ConnectionListActiveCallsResponse\Meta;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type cursors_alias = array{after?: string|null, before?: string|null}
 */
final class Cursors implements BaseModel
{
    /** @use SdkModel<cursors_alias> */
    use SdkModel;

    /**
     * Opaque identifier of next page.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Opaque identifier of previous page.
     */
    #[Api(optional: true)]
    public ?string $before;

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
        ?string $after = null,
        ?string $before = null
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $before && $obj->before = $before;

        return $obj;
    }

    /**
     * Opaque identifier of next page.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Opaque identifier of previous page.
     */
    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }
}
