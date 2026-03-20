<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneListParams\FilterProvider;
use Telnyx\VoiceClones\VoiceCloneListParams\Sort;

/**
 * Returns a paginated list of voice clones belonging to the authenticated account.
 *
 * @see Telnyx\Services\VoiceClonesService::list()
 *
 * @phpstan-type VoiceCloneListParamsShape = array{
 *   filterName?: string|null,
 *   filterProvider?: null|FilterProvider|value-of<FilterProvider>,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class VoiceCloneListParams implements BaseModel
{
    /** @use SdkModel<VoiceCloneListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Case-insensitive substring filter on the name field.
     */
    #[Optional]
    public ?string $filterName;

    /**
     * Filter by voice synthesis provider. Case-insensitive.
     *
     * @var value-of<FilterProvider>|null $filterProvider
     */
    #[Optional(enum: FilterProvider::class)]
    public ?string $filterProvider;

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
     * @param FilterProvider|value-of<FilterProvider>|null $filterProvider
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?string $filterName = null,
        FilterProvider|string|null $filterProvider = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filterName && $self['filterName'] = $filterName;
        null !== $filterProvider && $self['filterProvider'] = $filterProvider;
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
     * Filter by voice synthesis provider. Case-insensitive.
     *
     * @param FilterProvider|value-of<FilterProvider> $filterProvider
     */
    public function withFilterProvider(
        FilterProvider|string $filterProvider
    ): self {
        $self = clone $this;
        $self['filterProvider'] = $filterProvider;

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
