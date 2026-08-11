<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a paginated list of collections in your organization.
 *
 * @see Telnyx\Services\AI\CollectionsService::list()
 *
 * @phpstan-type CollectionListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class CollectionListParams implements BaseModel
{
    /** @use SdkModel<CollectionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number to return (1-based). Defaults to 1.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of results per page. Defaults to 20.
     */
    #[Optional]
    public ?int $pageSize;

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
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Page number to return (1-based). Defaults to 1.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of results per page. Defaults to 20.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
