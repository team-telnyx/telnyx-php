<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\Buckets;

use Telnyx\AI\Embeddings\Buckets\BucketListResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AI\Embeddings\Buckets\BucketListResponse\Data
 *
 * @phpstan-type BucketListResponseShape = array{data: Data|DataShape}
 */
final class BucketListResponse implements BaseModel
{
    /** @use SdkModel<BucketListResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new BucketListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BucketListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BucketListResponse)->withData(...)
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
     * @param DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
