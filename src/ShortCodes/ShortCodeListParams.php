<?php

declare(strict_types=1);

namespace Telnyx\ShortCodes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ShortCodes\ShortCodeListParams\Filter;
use Telnyx\ShortCodes\ShortCodeListParams\Page;

/**
 * List short codes.
 *
 * @see Telnyx\Services\ShortCodesService::list()
 *
 * @phpstan-type ShortCodeListParamsShape = array{
 *   filter?: Filter|array{messagingProfileID?: string|null},
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class ShortCodeListParams implements BaseModel
{
    /** @use SdkModel<ShortCodeListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{messagingProfileID?: string|null} $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id].
     *
     * @param Filter|array{messagingProfileID?: string|null} $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }
}
