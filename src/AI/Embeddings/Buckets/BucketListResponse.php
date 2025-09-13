<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\Buckets;

use Telnyx\AI\Embeddings\Buckets\BucketListResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type bucket_list_response = array{data: Data}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class BucketListResponse implements BaseModel
{
    /** @use SdkModel<bucket_list_response> */
    use SdkModel;

    #[Api]
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
     */
    public static function with(Data $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(Data $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
