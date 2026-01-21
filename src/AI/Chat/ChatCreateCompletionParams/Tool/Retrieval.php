<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Tool;

use Telnyx\AI\Chat\BucketIDs;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BucketIDsShape from \Telnyx\AI\Chat\BucketIDs
 *
 * @phpstan-type RetrievalShape = array{
 *   retrieval: BucketIDs|BucketIDsShape, type: 'retrieval'
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
    public BucketIDs $retrieval;

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
     * @param BucketIDs|BucketIDsShape $retrieval
     */
    public static function with(BucketIDs|array $retrieval): self
    {
        $self = new self;

        $self['retrieval'] = $retrieval;

        return $self;
    }

    /**
     * @param BucketIDs|BucketIDsShape $retrieval
     */
    public function withRetrieval(BucketIDs|array $retrieval): self
    {
        $self = clone $this;
        $self['retrieval'] = $retrieval;

        return $self;
    }
}
