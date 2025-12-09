<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\S3ConfigurationData\Backend;

/**
 * @phpstan-type S3ConfigurationDataShape = array{
 *   backend: value-of<Backend>,
 *   awsAccessKeyID?: string|null,
 *   awsSecretAccessKey?: string|null,
 *   bucket?: string|null,
 *   region?: string|null,
 * }
 */
final class S3ConfigurationData implements BaseModel
{
    /** @use SdkModel<S3ConfigurationDataShape> */
    use SdkModel;

    /**
     * Storage backend type.
     *
     * @var value-of<Backend> $backend
     */
    #[Required(enum: Backend::class)]
    public string $backend;

    /**
     * AWS credentials access key id.
     */
    #[Optional('aws_access_key_id')]
    public ?string $awsAccessKeyID;

    /**
     * AWS secret access key.
     */
    #[Optional('aws_secret_access_key')]
    public ?string $awsSecretAccessKey;

    /**
     * Name of the bucket to be used to store recording files.
     */
    #[Optional]
    public ?string $bucket;

    /**
     * Region where the bucket is located.
     */
    #[Optional]
    public ?string $region;

    /**
     * `new S3ConfigurationData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * S3ConfigurationData::with(backend: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new S3ConfigurationData)->withBackend(...)
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
     * @param Backend|value-of<Backend> $backend
     */
    public static function with(
        Backend|string $backend,
        ?string $awsAccessKeyID = null,
        ?string $awsSecretAccessKey = null,
        ?string $bucket = null,
        ?string $region = null,
    ): self {
        $obj = new self;

        $obj['backend'] = $backend;

        null !== $awsAccessKeyID && $obj['awsAccessKeyID'] = $awsAccessKeyID;
        null !== $awsSecretAccessKey && $obj['awsSecretAccessKey'] = $awsSecretAccessKey;
        null !== $bucket && $obj['bucket'] = $bucket;
        null !== $region && $obj['region'] = $region;

        return $obj;
    }

    /**
     * Storage backend type.
     *
     * @param Backend|value-of<Backend> $backend
     */
    public function withBackend(Backend|string $backend): self
    {
        $obj = clone $this;
        $obj['backend'] = $backend;

        return $obj;
    }

    /**
     * AWS credentials access key id.
     */
    public function withAwsAccessKeyID(string $awsAccessKeyID): self
    {
        $obj = clone $this;
        $obj['awsAccessKeyID'] = $awsAccessKeyID;

        return $obj;
    }

    /**
     * AWS secret access key.
     */
    public function withAwsSecretAccessKey(string $awsSecretAccessKey): self
    {
        $obj = clone $this;
        $obj['awsSecretAccessKey'] = $awsSecretAccessKey;

        return $obj;
    }

    /**
     * Name of the bucket to be used to store recording files.
     */
    public function withBucket(string $bucket): self
    {
        $obj = clone $this;
        $obj['bucket'] = $bucket;

        return $obj;
    }

    /**
     * Region where the bucket is located.
     */
    public function withRegion(string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }
}
