<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a timed and authenticated URL to download (GET) or upload (PUT) an object. This is the equivalent to AWS S3’s “presigned” URL. Please note that Telnyx performs authentication differently from AWS S3 and you MUST NOT use the presign method of AWS s3api CLI or SDK to generate the presigned URL.
 *
 * Refer to: https://developers.telnyx.com/docs/cloud-storage/presigned-urls
 *
 * @see Telnyx\Services\Storage\BucketsService::createPresignedURL()
 *
 * @phpstan-type BucketCreatePresignedURLParamsShape = array{
 *   bucketName: string, ttl?: int|null
 * }
 */
final class BucketCreatePresignedURLParams implements BaseModel
{
    /** @use SdkModel<BucketCreatePresignedURLParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $bucketName;

    /**
     * The time to live of the token in seconds.
     */
    #[Optional]
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
        $self = new self;

        $self['bucketName'] = $bucketName;

        null !== $ttl && $self['ttl'] = $ttl;

        return $self;
    }

    public function withBucketName(string $bucketName): self
    {
        $self = clone $this;
        $self['bucketName'] = $bucketName;

        return $self;
    }

    /**
     * The time to live of the token in seconds.
     */
    public function withTtl(int $ttl): self
    {
        $self = clone $this;
        $self['ttl'] = $ttl;

        return $self;
    }
}
