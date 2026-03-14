<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceDesigns\VoiceDesignListParams\Sort;

/**
 * Returns a paginated list of voice designs belonging to the authenticated account.
 *
 * @see Telnyx\Services\VoiceDesignsService::list()
 *
 * @phpstan-type VoiceDesignListParamsShape = array{
 *   filterName?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class VoiceDesignListParams implements BaseModel
{
    /** @use SdkModel<VoiceDesignListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Case-insensitive substring filter on the name field.
     */
    #[Optional]
    public ?string $filterName;

    /**
     * Page number for pagination (1-based).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of results per page.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Sort order. Prefix with `-` for descending. Defaults to `-created_at`.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?string $filterName = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filterName && $self['filterName'] = $filterName;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Case-insensitive substring filter on the name field.
     */
    public function withFilterName(string $filterName): self
    {
        $self = clone $this;
        $self['filterName'] = $filterName;

        return $self;
    }

    /**
     * Page number for pagination (1-based).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Sort order. Prefix with `-` for descending. Defaults to `-created_at`.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
