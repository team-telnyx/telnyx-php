<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\Buckets\BucketListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{buckets: list<string>}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<string> $buckets */
    #[Api(list: 'string')]
    public array $buckets;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(buckets: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withBuckets(...)
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
     * @param list<string> $buckets
     */
    public static function with(array $buckets): self
    {
        $obj = new self;

        $obj->buckets = $buckets;

        return $obj;
    }

    /**
     * @param list<string> $buckets
     */
    public function withBuckets(array $buckets): self
    {
        $obj = clone $this;
        $obj->buckets = $buckets;

        return $obj;
    }
}
