<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BucketIDsShape = array{
 *   bucketIDs: list<string>, maxNumResults?: int|null
 * }
 */
final class BucketIDs implements BaseModel
{
    /** @use SdkModel<BucketIDsShape> */
    use SdkModel;

    /** @var list<string> $bucketIDs */
    #[Required('bucket_ids', list: 'string')]
    public array $bucketIDs;

    /**
     * The maximum number of results to retrieve as context for the language model.
     */
    #[Optional('max_num_results')]
    public ?int $maxNumResults;

    /**
     * `new BucketIDs()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BucketIDs::with(bucketIDs: ...)
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
