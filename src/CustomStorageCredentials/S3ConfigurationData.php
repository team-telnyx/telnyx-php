<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type S3ConfigurationDataShape = array{
 *   aws_access_key_id?: string|null,
 *   aws_secret_access_key?: string|null,
 *   bucket?: string|null,
 *   region?: string|null,
 * }
 */
final class S3ConfigurationData implements BaseModel
{
    /** @use SdkModel<S3ConfigurationDataShape> */
    use SdkModel;

    /**
     * AWS credentials access key id.
     */
    #[Api(optional: true)]
    public ?string $aws_access_key_id;

    /**
     * AWS secret access key.
     */
    #[Api(optional: true)]
    public ?string $aws_secret_access_key;

    /**
     * Name of the bucket to be used to store recording files.
     */
    #[Api(optional: true)]
    public ?string $bucket;

    /**
     * Region where the bucket is located.
     */
    #[Api(optional: true)]
    public ?string $region;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $aws_access_key_id = null,
        ?string $aws_secret_access_key = null,
        ?string $bucket = null,
        ?string $region = null,
    ): self {
        $obj = new self;

        null !== $aws_access_key_id && $obj->aws_access_key_id = $aws_access_key_id;
        null !== $aws_secret_access_key && $obj->aws_secret_access_key = $aws_secret_access_key;
        null !== $bucket && $obj->bucket = $bucket;
        null !== $region && $obj->region = $region;

        return $obj;
    }

    /**
     * AWS credentials access key id.
     */
    public function withAwsAccessKeyID(string $awsAccessKeyID): self
    {
        $obj = clone $this;
        $obj->aws_access_key_id = $awsAccessKeyID;

        return $obj;
    }

    /**
     * AWS secret access key.
     */
    public function withAwsSecretAccessKey(string $awsSecretAccessKey): self
    {
        $obj = clone $this;
        $obj->aws_secret_access_key = $awsSecretAccessKey;

        return $obj;
    }

    /**
     * Name of the bucket to be used to store recording files.
     */
    public function withBucket(string $bucket): self
    {
        $obj = clone $this;
        $obj->bucket = $bucket;

        return $obj;
    }

    /**
     * Region where the bucket is located.
     */
    public function withRegion(string $region): self
    {
        $obj = clone $this;
        $obj->region = $region;

        return $obj;
    }
}
