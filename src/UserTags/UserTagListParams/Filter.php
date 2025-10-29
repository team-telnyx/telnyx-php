<?php

declare(strict_types=1);

namespace Telnyx\UserTags\UserTagListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[starts_with].
 *
 * @phpstan-type FilterShape = array{startsWith?: string}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter tags by prefix.
     */
    #[Api('starts_with', optional: true)]
    public ?string $startsWith;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $startsWith = null): self
    {
        $obj = new self;

        null !== $startsWith && $obj->startsWith = $startsWith;

        return $obj;
    }

    /**
     * Filter tags by prefix.
     */
    public function withStartsWith(string $startsWith): self
    {
        $obj = clone $this;
        $obj->startsWith = $startsWith;

        return $obj;
    }
}
