<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\CollectionGetDocumentsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   collectionSlug?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   retrievalType?: string|null,
 *   searchedSources?: list<string>|null,
 *   topK?: int|null,
 *   totalPages?: int|null,
 *   totalResults?: int|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Optional('collection_slug')]
    public ?string $collectionSlug;

    #[Optional('page_number')]
    public ?int $pageNumber;

    #[Optional('page_size')]
    public ?int $pageSize;

    #[Optional('retrieval_type')]
    public ?string $retrievalType;

    /** @var list<string>|null $searchedSources */
    #[Optional('searched_sources', list: 'string')]
    public ?array $searchedSources;

    #[Optional('top_k')]
    public ?int $topK;

    #[Optional('total_pages')]
    public ?int $totalPages;

    #[Optional('total_results')]
    public ?int $totalResults;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $searchedSources
     */
    public static function with(
        ?string $collectionSlug = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $retrievalType = null,
        ?array $searchedSources = null,
        ?int $topK = null,
        ?int $totalPages = null,
        ?int $totalResults = null,
    ): self {
        $self = new self;

        null !== $collectionSlug && $self['collectionSlug'] = $collectionSlug;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $retrievalType && $self['retrievalType'] = $retrievalType;
        null !== $searchedSources && $self['searchedSources'] = $searchedSources;
        null !== $topK && $self['topK'] = $topK;
        null !== $totalPages && $self['totalPages'] = $totalPages;
        null !== $totalResults && $self['totalResults'] = $totalResults;

        return $self;
    }

    public function withCollectionSlug(string $collectionSlug): self
    {
        $self = clone $this;
        $self['collectionSlug'] = $collectionSlug;

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

    public function withRetrievalType(string $retrievalType): self
    {
        $self = clone $this;
        $self['retrievalType'] = $retrievalType;

        return $self;
    }

    /**
     * @param list<string> $searchedSources
     */
    public function withSearchedSources(array $searchedSources): self
    {
        $self = clone $this;
        $self['searchedSources'] = $searchedSources;

        return $self;
    }

    public function withTopK(int $topK): self
    {
        $self = clone $this;
        $self['topK'] = $topK;

        return $self;
    }

    public function withTotalPages(int $totalPages): self
    {
        $self = clone $this;
        $self['totalPages'] = $totalPages;

        return $self;
    }

    public function withTotalResults(int $totalResults): self
    {
        $self = clone $this;
        $self['totalResults'] = $totalResults;

        return $self;
    }
}
