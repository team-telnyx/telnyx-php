<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Tool;

use Telnyx\AI\Assistants\InferenceEmbeddingBucketIDs;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RetrievalShape = array{
 *   retrieval: InferenceEmbeddingBucketIDs, type: 'retrieval'
 * }
 */
final class Retrieval implements BaseModel
{
    /** @use SdkModel<RetrievalShape> */
    use SdkModel;

    /** @var 'retrieval' $type */
    #[Api]
    public string $type = 'retrieval';

    #[Api]
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
     */
    public static function with(InferenceEmbeddingBucketIDs $retrieval): self
    {
        $obj = new self;

        $obj->retrieval = $retrieval;

        return $obj;
    }

    public function withRetrieval(InferenceEmbeddingBucketIDs $retrieval): self
    {
        $obj = clone $this;
        $obj->retrieval = $retrieval;

        return $obj;
    }
}
