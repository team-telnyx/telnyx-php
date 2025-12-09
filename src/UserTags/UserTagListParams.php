<?php

declare(strict_types=1);

namespace Telnyx\UserTags;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\UserTags\UserTagListParams\Filter;

/**
 * List all user tags.
 *
 * @see Telnyx\Services\UserTagsService::list()
 *
 * @phpstan-type UserTagListParamsShape = array{
 *   filter?: Filter|array{startsWith?: string|null}
 * }
 */
final class UserTagListParams implements BaseModel
{
    /** @use SdkModel<UserTagListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[starts_with].
     */
    #[Optional]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{startsWith?: string|null} $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[starts_with].
     *
     * @param Filter|array{startsWith?: string|null} $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
