<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\Buckets;

use Telnyx\AI\Embeddings\Buckets\BucketGetResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type bucket_get_response = array{data: list<Data>}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class BucketGetResponse implements BaseModel
{
    /** @use SdkModel<bucket_get_response> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Api(list: Data::class)]
    public array $data;

    /**
     * `new BucketGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BucketGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BucketGetResponse)->withData(...)
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
     * @param list<Data> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<Data> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
