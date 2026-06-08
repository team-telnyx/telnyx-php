<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List Tools.
 *
 * @see Telnyx\Services\AI\ToolsService::list()
 *
 * @phpstan-type ToolListParamsShape = array{
 *   filterName?: string|null,
 *   filterType?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class ToolListParams implements BaseModel
{
    /** @use SdkModel<ToolListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter results by filter name.
     */
    #[Optional]
    public ?string $filterName;

    /**
     * Filter results by filter type.
     */
    #[Optional]
    public ?string $filterType;

    /**
     * Page number to retrieve (1-based).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of items to return per page.
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
        ?string $filterName = null,
        ?string $filterType = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterName && $self['filterName'] = $filterName;
        null !== $filterType && $self['filterType'] = $filterType;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter results by filter name.
     */
    public function withFilterName(string $filterName): self
    {
        $self = clone $this;
        $self['filterName'] = $filterName;

        return $self;
    }

    /**
     * Filter results by filter type.
     */
    public function withFilterType(string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * Page number to retrieve (1-based).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of items to return per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
