<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\RetrievalTool\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InferenceEmbeddingBucketIDsShape from \Telnyx\AI\Assistants\InferenceEmbeddingBucketIDs
 *
 * @phpstan-type RetrievalToolShape = array{
 *   retrieval: InferenceEmbeddingBucketIDs|InferenceEmbeddingBucketIDsShape,
 *   type: Type|value-of<Type>,
 * }
 */
final class RetrievalTool implements BaseModel
{
    /** @use SdkModel<RetrievalToolShape> */
    use SdkModel;

    #[Required]
    public InferenceEmbeddingBucketIDs $retrieval;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new RetrievalTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RetrievalTool::with(retrieval: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RetrievalTool)->withRetrieval(...)->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InferenceEmbeddingBucketIDsShape $retrieval
     * @param Type|value-of<Type> $type
     */
    public static function with(
        InferenceEmbeddingBucketIDs|array $retrieval,
        Type|string $type
    ): self {
        $self = new self;

        $self['retrieval'] = $retrieval;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param InferenceEmbeddingBucketIDsShape $retrieval
     */
    public function withRetrieval(
        InferenceEmbeddingBucketIDs|array $retrieval
    ): self {
        $self = clone $this;
        $self['retrieval'] = $retrieval;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
