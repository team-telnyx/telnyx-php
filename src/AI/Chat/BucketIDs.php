<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BucketIDsShape = array{
 *   bucket_ids: list<string>, max_num_results?: int|null
 * }
 */
final class BucketIDs implements BaseModel
{
    /** @use SdkModel<BucketIDsShape> */
    use SdkModel;

    /** @var list<string> $bucket_ids */
    #[Api(list: 'string')]
    public array $bucket_ids;

    /**
     * The maximum number of results to retrieve as context for the language model.
     */
    #[Api(optional: true)]
    public ?int $max_num_results;

    /**
     * `new BucketIDs()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BucketIDs::with(bucket_ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BucketIDs)->withBucketIDs(...)
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

        $obj['bucket_ids'] = $bucket_ids;

        null !== $max_num_results && $obj['max_num_results'] = $max_num_results;

        return $obj;
    }

    /**
     * @param list<string> $bucketIDs
     */
    public function withBucketIDs(array $bucketIDs): self
    {
        $obj = clone $this;
        $obj['bucket_ids'] = $bucketIDs;

        return $obj;
    }

    /**
     * The maximum number of results to retrieve as context for the language model.
     */
    public function withMaxNumResults(int $maxNumResults): self
    {
        $obj = clone $this;
        $obj['max_num_results'] = $maxNumResults;

        return $obj;
    }
}
