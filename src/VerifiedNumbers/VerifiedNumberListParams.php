<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifiedNumbers\VerifiedNumberListParams\Page;

/**
 * Gets a paginated list of Verified Numbers.
 *
 * @see Telnyx\VerifiedNumbers->list
 *
 * @phpstan-type verified_number_list_params = array{page?: Page}
 */
final class VerifiedNumberListParams implements BaseModel
{
    /** @use SdkModel<verified_number_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Use page[size] and page[number] in the query string. Originally: page[size], page[number].
     */
    #[Api(optional: true)]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Page $page = null): self
    {
        $obj = new self;

        null !== $page && $obj->page = $page;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Use page[size] and page[number] in the query string. Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }
}
