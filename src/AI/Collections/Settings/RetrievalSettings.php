<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Settings;

use Telnyx\AI\Collections\Settings\RetrievalSettings\RetrievalType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * How documents are retrieved when searching the collection.
 *
 * @phpstan-type RetrievalSettingsShape = array{
 *   retrievalType?: null|RetrievalType|value-of<RetrievalType>, topK?: int|null
 * }
 */
final class RetrievalSettings implements BaseModel
{
    /** @use SdkModel<RetrievalSettingsShape> */
    use SdkModel;

    /**
     * Retrieval strategy. `vector` runs semantic similarity search; `hybrid` combines vector similarity with keyword matching; `keyword` runs lexical (BM25) matching. `keyword` is not accepted yet: setting it returns 422 `unsupported_retrieval_type`. A collection set to `hybrid` is accepted here but cannot be searched until hybrid execution ships.
     *
     * @var value-of<RetrievalType>|null $retrievalType
     */
    #[Optional('retrieval_type', enum: RetrievalType::class)]
    public ?string $retrievalType;

    /**
     * Number of top results to retrieve (1–50).
     */
    #[Optional('top_k')]
    public ?int $topK;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RetrievalType|value-of<RetrievalType>|null $retrievalType
     */
    public static function with(
        RetrievalType|string|null $retrievalType = null,
        ?int $topK = null
    ): self {
        $self = new self;

        null !== $retrievalType && $self['retrievalType'] = $retrievalType;
        null !== $topK && $self['topK'] = $topK;

        return $self;
    }

    /**
     * Retrieval strategy. `vector` runs semantic similarity search; `hybrid` combines vector similarity with keyword matching; `keyword` runs lexical (BM25) matching. `keyword` is not accepted yet: setting it returns 422 `unsupported_retrieval_type`. A collection set to `hybrid` is accepted here but cannot be searched until hybrid execution ships.
     *
     * @param RetrievalType|value-of<RetrievalType> $retrievalType
     */
    public function withRetrievalType(RetrievalType|string $retrievalType): self
    {
        $self = clone $this;
        $self['retrievalType'] = $retrievalType;

        return $self;
    }

    /**
     * Number of top results to retrieve (1–50).
     */
    public function withTopK(int $topK): self
    {
        $self = clone $this;
        $self['topK'] = $topK;

        return $self;
    }
}
