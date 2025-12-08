<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifiedNumbers\VerifiedNumberListParams\Page;

/**
 * Gets a paginated list of Verified Numbers.
 *
 * @see Telnyx\Services\VerifiedNumbersService::list()
 *
 * @phpstan-type VerifiedNumberListParamsShape = array{
 *   page?: Page|array{number?: int|null, size?: int|null}
 * }
 */
final class VerifiedNumberListParams implements BaseModel
{
    /** @use SdkModel<VerifiedNumberListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Use page[size] and page[number] in the query string. Originally: page[size], page[number].
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
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(Page|array|null $page = null): self
    {
        $obj = new self;

        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Use page[size] and page[number] in the query string. Originally: page[size], page[number].
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
