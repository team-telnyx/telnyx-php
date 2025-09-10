<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type inference_embedding_bucket_ids = array{
 *   bucketIDs: list<string>, maxNumResults?: int|null
 * }
 */
final class InferenceEmbeddingBucketIDs implements BaseModel
{
    /** @use SdkModel<inference_embedding_bucket_ids> */
    use SdkModel;

    /**
     * List of [embedded storage buckets](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) to use for retrieval-augmented generation.
     *
     * @var list<string> $bucketIDs
     */
    #[Api('bucket_ids', list: 'string')]
    public array $bucketIDs;

    /**
     * The maximum number of results to retrieve as context for the language model.
     */
    #[Api('max_num_results', optional: true)]
    public ?int $maxNumResults;

    /**
     * `new InferenceEmbeddingBucketIDs()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InferenceEmbeddingBucketIDs::with(bucketIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InferenceEmbeddingBucketIDs)->withBucketIDs(...)
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
     * @param list<string> $bucketIDs
     */
    public static function with(
        array $bucketIDs,
        ?int $maxNumResults = null
    ): self {
        $obj = new self;

        $obj->bucketIDs = $bucketIDs;

        null !== $maxNumResults && $obj->maxNumResults = $maxNumResults;

        return $obj;
    }

    /**
     * List of [embedded storage buckets](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) to use for retrieval-augmented generation.
     *
     * @param list<string> $bucketIDs
     */
    public function withBucketIDs(array $bucketIDs): self
    {
        $obj = clone $this;
        $obj->bucketIDs = $bucketIDs;

        return $obj;
    }

    /**
     * The maximum number of results to retrieve as context for the language model.
     */
    public function withMaxNumResults(int $maxNumResults): self
    {
        $obj = clone $this;
        $obj->maxNumResults = $maxNumResults;

        return $obj;
    }
}
