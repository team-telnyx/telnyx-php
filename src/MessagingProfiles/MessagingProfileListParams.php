<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\MessagingProfileListParams\Filter;

/**
 * List messaging profiles.
 *
 * @see Telnyx\Services\MessagingProfilesService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\MessagingProfiles\MessagingProfileListParams\Filter
 *
 * @phpstan-type MessagingProfileListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   filterNameContains?: string|null,
 *   filterNameEq?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class MessagingProfileListParams implements BaseModel
{
    /** @use SdkModel<MessagingProfileListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[name].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Filter profiles by name containing the given string.
     */
    #[Optional]
    public ?string $filterNameContains;

    /**
     * Filter profiles by exact name match.
     */
    #[Optional]
    public ?string $filterNameEq;

    #[Optional]
    public ?int $pageNumber;

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
     *
     * @param Filter|FilterShape|null $filter
     */
    public static function with(
        Filter|array|null $filter = null,
        ?string $filterNameContains = null,
        ?string $filterNameEq = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $filterNameContains && $self['filterNameContains'] = $filterNameContains;
        null !== $filterNameEq && $self['filterNameEq'] = $filterNameEq;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[name].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Filter profiles by name containing the given string.
     */
    public function withFilterNameContains(string $filterNameContains): self
    {
        $self = clone $this;
        $self['filterNameContains'] = $filterNameContains;

        return $self;
    }

    /**
     * Filter profiles by exact name match.
     */
    public function withFilterNameEq(string $filterNameEq): self
    {
        $self = clone $this;
        $self['filterNameEq'] = $filterNameEq;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
