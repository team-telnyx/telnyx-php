<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InferenceEmbeddingBucketIDsShape = array{
 *   bucket_ids: list<string>, max_num_results?: int|null
 * }
 */
final class InferenceEmbeddingBucketIDs implements BaseModel
{
    /** @use SdkModel<InferenceEmbeddingBucketIDsShape> */
    use SdkModel;

    /**
     * List of [embedded storage buckets](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) to use for retrieval-augmented generation.
     *
     * @var list<string> $bucket_ids
     */
    #[Api(list: 'string')]
    public array $bucket_ids;

    /**
     * The maximum number of results to retrieve as context for the language model.
     */
    #[Api(optional: true)]
    public ?int $max_num_results;

    /**
     * `new InferenceEmbeddingBucketIDs()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InferenceEmbeddingBucketIDs::with(bucket_ids: ...)
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
     * @param list<string> $bucket_ids
     */
    public static function with(
        array $bucket_ids,
        ?int $max_num_results = null
    ): self {
        $obj = new self;

        $obj->bucket_ids = $bucket_ids;

        null !== $max_num_results && $obj->max_num_results = $max_num_results;

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
        $obj->bucket_ids = $bucketIDs;

        return $obj;
    }

    /**
     * The maximum number of results to retrieve as context for the language model.
     */
    public function withMaxNumResults(int $maxNumResults): self
    {
        $obj = clone $this;
        $obj->max_num_results = $maxNumResults;

        return $obj;
    }
}
