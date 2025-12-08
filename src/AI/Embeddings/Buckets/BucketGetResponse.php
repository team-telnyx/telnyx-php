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
     *   created_at: \DateTimeInterface,
     *   filename: string,
     *   status: string,
     *   error_reason?: string|null,
     *   last_embedded_at?: \DateTimeInterface|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   created_at: \DateTimeInterface,
     *   filename: string,
     *   status: string,
     *   error_reason?: string|null,
     *   last_embedded_at?: \DateTimeInterface|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
