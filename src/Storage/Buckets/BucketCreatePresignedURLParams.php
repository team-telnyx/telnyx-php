<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\BucketCreatePresignedURLParams\Body;

/**
 * Returns a timed and authenticated URL to download (GET) or upload (PUT) an object. This is the equivalent to AWS S3’s “presigned” URL. Please note that Telnyx performs authentication differently from AWS S3 and you MUST NOT use the presign method of AWS s3api CLI or SDK to generate the presigned URL.
 *
 * Refer to: https://developers.telnyx.com/docs/cloud-storage/presigned-urls
 *
 * @see Telnyx\Services\Storage\BucketsService::createPresignedURL()
 *
 * @phpstan-import-type BodyShape from \Telnyx\Storage\Buckets\BucketCreatePresignedURLParams\Body
 *
 * @phpstan-type BucketCreatePresignedURLParamsShape = array{
 *   bucketName: string, body?: null|Body|BodyShape
 * }
 */
final class BucketCreatePresignedURLParams implements BaseModel
{
    /** @use SdkModel<BucketCreatePresignedURLParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $bucketName;

    #[Optional]
    public ?Body $body;

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
     *
     * @param Body|BodyShape|null $body
     */
    public static function with(
        string $bucketName,
        Body|array|null $body = null
    ): self {
        $self = new self;

        $self['bucketName'] = $bucketName;

        null !== $body && $self['body'] = $body;

        return $self;
    }

    public function withBucketName(string $bucketName): self
    {
        $self = clone $this;
        $self['bucketName'] = $bucketName;

        return $self;
    }

    /**
     * @param Body|BodyShape $body
     */
    public function withBody(Body|array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
