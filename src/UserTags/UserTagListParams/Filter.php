<?php

declare(strict_types=1);

namespace Telnyx\UserTags\UserTagListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[starts_with].
 *
 * @phpstan-type FilterShape = array{starts_with?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter tags by prefix.
     */
    #[Optional]
    public ?string $starts_with;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $starts_with = null): self
    {
        $obj = new self;

        null !== $starts_with && $obj['starts_with'] = $starts_with;

        return $obj;
    }

    /**
     * Filter tags by prefix.
     */
    public function withStartsWith(string $startsWith): self
    {
        $obj = clone $this;
        $obj['starts_with'] = $startsWith;

        return $obj;
    }
}
