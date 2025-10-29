<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type S3ConfigurationDataShape = array{
 *   awsAccessKeyID?: string,
 *   awsSecretAccessKey?: string,
 *   bucket?: string,
 *   region?: string,
 * }
 */
final class S3ConfigurationData implements BaseModel
{
    /** @use SdkModel<S3ConfigurationDataShape> */
    use SdkModel;

    /**
     * AWS credentials access key id.
     */
    #[Api('aws_access_key_id', optional: true)]
    public ?string $awsAccessKeyID;

    /**
     * AWS secret access key.
     */
    #[Api('aws_secret_access_key', optional: true)]
    public ?string $awsSecretAccessKey;

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
        ?string $awsAccessKeyID = null,
        ?string $awsSecretAccessKey = null,
        ?string $bucket = null,
        ?string $region = null,
    ): self {
        $obj = new self;

        null !== $awsAccessKeyID && $obj->awsAccessKeyID = $awsAccessKeyID;
        null !== $awsSecretAccessKey && $obj->awsSecretAccessKey = $awsSecretAccessKey;
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
        $obj->awsAccessKeyID = $awsAccessKeyID;

        return $obj;
    }

    /**
     * AWS secret access key.
     */
    public function withAwsSecretAccessKey(string $awsSecretAccessKey): self
    {
        $obj = clone $this;
        $obj->awsSecretAccessKey = $awsSecretAccessKey;

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
