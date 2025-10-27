<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a timed and authenticated URL to get an object. This is the equivalent to AWS S3’s “presigned” URL. Please note that Telnyx performs authentication differently from AWS S3 and you MUST NOT use the presign method of AWS s3api CLI or sdk to generate the presigned URL.
 *
 * Refer to: https://developers.telnyx.com/docs/cloud-storage/presigned-urls
 *
 * @see Telnyx\Storage\Buckets->createPresignedURL
 *
 * @phpstan-type bucket_create_presigned_url_params = array{
 *   bucketName: string, ttl?: int
 * }
 */
final class BucketCreatePresignedURLParams implements BaseModel
{
    /** @use SdkModel<bucket_create_presigned_url_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $bucketName;

    /**
     * The time to live of the token in seconds.
     */
    #[Api(optional: true)]
    public ?int $ttl;

    /**
     * `new BucketCreatePresignedURLParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BucketCreatePresignedURLParams::with(bucketName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BucketCreatePresignedURLParams)->withBucketName(...)
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
    public static function with(string $bucketName, ?int $ttl = null): self
    {
        $obj = new self;

        $obj->bucketName = $bucketName;

        null !== $ttl && $obj->ttl = $ttl;

        return $obj;
    }

    public function withBucketName(string $bucketName): self
    {
        $obj = clone $this;
        $obj->bucketName = $bucketName;

        return $obj;
    }

    /**
     * The time to live of the token in seconds.
     */
    public function withTtl(int $ttl): self
    {
        $obj = clone $this;
        $obj->ttl = $ttl;

        return $obj;
    }
}
