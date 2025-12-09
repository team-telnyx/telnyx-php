<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InferenceEmbeddingBucketIDsShape = array{
 *   bucketIDs: list<string>, maxNumResults?: int|null
 * }
 */
final class InferenceEmbeddingBucketIDs implements BaseModel
{
    /** @use SdkModel<InferenceEmbeddingBucketIDsShape> */
    use SdkModel;

    /**
     * List of [embedded storage buckets](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) to use for retrieval-augmented generation.
     *
     * @var list<string> $bucketIDs
     */
    #[Required('bucket_ids', list: 'string')]
    public array $bucketIDs;

    /**
     * The maximum number of results to retrieve as context for the language model.
     */
    #[Optional('max_num_results')]
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
        $self = new self;

        $self['bucketIDs'] = $bucketIDs;

        null !== $maxNumResults && $self['maxNumResults'] = $maxNumResults;

        return $self;
    }

    /**
     * List of [embedded storage buckets](https://developers.telnyx.com/api/inference/inference-embedding/post-embedding) to use for retrieval-augmented generation.
     *
     * @param list<string> $bucketIDs
     */
    public function withBucketIDs(array $bucketIDs): self
    {
        $self = clone $this;
        $self['bucketIDs'] = $bucketIDs;

        return $self;
    }

    /**
     * The maximum number of results to retrieve as context for the language model.
     */
    public function withMaxNumResults(int $maxNumResults): self
    {
        $self = clone $this;
        $self['maxNumResults'] = $maxNumResults;

        return $self;
    }
}
