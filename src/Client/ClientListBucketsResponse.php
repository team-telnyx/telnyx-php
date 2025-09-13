<?php

declare(strict_types=1);

namespace Telnyx\Client;

use Telnyx\Client\ClientListBucketsResponse\Bucket;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type client_list_buckets_response = array{buckets?: list<Bucket>}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ClientListBucketsResponse implements BaseModel
{
    /** @use SdkModel<client_list_buckets_response> */
    use SdkModel;

    /** @var list<Bucket>|null $buckets */
    #[Api('Buckets', list: Bucket::class, optional: true)]
    public ?array $buckets;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Bucket> $buckets
     */
    public static function with(?array $buckets = null): self
    {
        $obj = new self;

        null !== $buckets && $obj->buckets = $buckets;

        return $obj;
    }

    /**
     * @param list<Bucket> $buckets
     */
    public function withBuckets(array $buckets): self
    {
        $obj = clone $this;
        $obj->buckets = $buckets;

        return $obj;
    }
}
