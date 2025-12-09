<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\Buckets;

use Telnyx\AI\Embeddings\Buckets\BucketGetResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BucketGetResponseShape = array{data: list<Data>}
 */
final class BucketGetResponse implements BaseModel
{
    /** @use SdkModel<BucketGetResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
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
     * @param list<Data|array{
     *   createdAt: \DateTimeInterface,
     *   filename: string,
     *   status: string,
     *   errorReason?: string|null,
     *   lastEmbeddedAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   createdAt: \DateTimeInterface,
     *   filename: string,
     *   status: string,
     *   errorReason?: string|null,
     *   lastEmbeddedAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
