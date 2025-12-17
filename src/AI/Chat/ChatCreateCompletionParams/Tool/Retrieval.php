<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Tool;

use Telnyx\AI\Assistants\InferenceEmbeddingBucketIDs;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InferenceEmbeddingBucketIDsShape from \Telnyx\AI\Assistants\InferenceEmbeddingBucketIDs
 *
 * @phpstan-type RetrievalShape = array{
 *   retrieval: InferenceEmbeddingBucketIDs|InferenceEmbeddingBucketIDsShape,
 *   type: 'retrieval',
 * }
 */
final class Retrieval implements BaseModel
{
    /** @use SdkModel<RetrievalShape> */
    use SdkModel;

    /** @var 'retrieval' $type */
    #[Required]
    public string $type = 'retrieval';

    #[Required]
    public InferenceEmbeddingBucketIDs $retrieval;

    /**
     * `new Retrieval()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Retrieval::with(retrieval: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Retrieval)->withRetrieval(...)
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
     * @param InferenceEmbeddingBucketIDs|InferenceEmbeddingBucketIDsShape $retrieval
     */
    public static function with(
        InferenceEmbeddingBucketIDs|array $retrieval
    ): self {
        $self = new self;

        $self['retrieval'] = $retrieval;

        return $self;
    }

    /**
     * @param InferenceEmbeddingBucketIDs|InferenceEmbeddingBucketIDsShape $retrieval
     */
    public function withRetrieval(
        InferenceEmbeddingBucketIDs|array $retrieval
    ): self {
        $self = clone $this;
        $self['retrieval'] = $retrieval;

        return $self;
    }
}
