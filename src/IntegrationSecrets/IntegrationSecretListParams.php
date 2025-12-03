<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams\Filter;

/**
 * Retrieve a list of all integration secrets configured by the user.
 *
 * @see Telnyx\Services\IntegrationSecretsService::list()
 *
 * @phpstan-type IntegrationSecretListParamsShape = array{
 *   filter?: Filter, page_number_?: int, page_size_?: int
 * }
 */
final class IntegrationSecretListParams implements BaseModel
{
    /** @use SdkModel<IntegrationSecretListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[type].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    #[Api(optional: true)]
    public ?int $page_number_;

    #[Api(optional: true)]
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
        ?Filter $filter = null,
        ?int $page_number_ = null,
        ?int $page_size_ = null
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page_number_ && $obj->page_number_ = $page_number_;
        null !== $page_size_ && $obj->page_size_ = $page_size_;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[type].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->page_number_ = $pageNumber;

        return $obj;
    }

    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->page_size_ = $pageSize;

        return $obj;
    }
}
