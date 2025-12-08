<?php

declare(strict_types=1);

namespace Telnyx\OAuthGrants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a paginated list of OAuth grants for the authenticated user.
 *
 * @see Telnyx\Services\OAuthGrantsService::list()
 *
 * @phpstan-type OAuthGrantListParamsShape = array{
 *   page_number_?: int, page_size_?: int
 * }
 */
final class OAuthGrantListParams implements BaseModel
{
    /** @use SdkModel<OAuthGrantListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number.
     */
    #[Optional]
    public ?int $page_number_;

    /**
     * Number of results per page.
     */
    #[Optional]
    public ?int $page_size_;

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
        ?int $page_number_ = null,
        ?int $page_size_ = null
    ): self {
        $obj = new self;

        null !== $page_number_ && $obj['page_number_'] = $page_number_;
        null !== $page_size_ && $obj['page_size_'] = $page_size_;

        return $obj;
    }

    /**
     * Page number.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj['page_number_'] = $pageNumber;

        return $obj;
    }

    /**
     * Number of results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['page_size_'] = $pageSize;

        return $obj;
    }
}
