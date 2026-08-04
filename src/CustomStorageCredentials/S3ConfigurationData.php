<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\S3ConfigurationData\Backend;

/**
 * @phpstan-type S3ConfigurationDataShape = array{
 *   awsAccessKeyID: string,
 *   awsSecretAccessKey: string,
 *   backend: Backend|value-of<Backend>,
 *   bucket: string,
 *   region: string,
 * }
 */
final class S3ConfigurationData implements BaseModel
{
    /** @use SdkModel<S3ConfigurationDataShape> */
    use SdkModel;

    /**
     * AWS credentials access key id.
     */
    #[Required('aws_access_key_id')]
    public string $awsAccessKeyID;

    /**
     * AWS secret access key.
     */
    #[Required('aws_secret_access_key')]
    public string $awsSecretAccessKey;

    /**
     * Storage backend type.
     *
     * @var value-of<Backend> $backend
     */
    #[Required(enum: Backend::class)]
    public string $backend;

    /**
     * Name of the bucket to be used to store recording files.
     */
    #[Required]
    public string $bucket;

    /**
     * Region where the bucket is located.
     */
    #[Required]
    public string $region;

    /**
     * `new S3ConfigurationData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * S3ConfigurationData::with(
     *   awsAccessKeyID: ...,
     *   awsSecretAccessKey: ...,
     *   backend: ...,
     *   bucket: ...,
     *   region: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new S3ConfigurationData)
     *   ->withAwsAccessKeyID(...)
     *   ->withAwsSecretAccessKey(...)
     *   ->withBackend(...)
     *   ->withBucket(...)
     *   ->withRegion(...)
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
        string $awsAccessKeyID,
        string $awsSecretAccessKey,
        Backend|string $backend,
        string $bucket,
        string $region,
    ): self {
        $self = new self;

        $self['awsAccessKeyID'] = $awsAccessKeyID;
        $self['awsSecretAccessKey'] = $awsSecretAccessKey;
        $self['backend'] = $backend;
        $self['bucket'] = $bucket;
        $self['region'] = $region;

        return $self;
    }

    /**
     * AWS credentials access key id.
     */
    public function withAwsAccessKeyID(string $awsAccessKeyID): self
    {
        $self = clone $this;
        $self['awsAccessKeyID'] = $awsAccessKeyID;

        return $self;
    }

    /**
     * AWS secret access key.
     */
    public function withAwsSecretAccessKey(string $awsSecretAccessKey): self
    {
        $self = clone $this;
        $self['awsSecretAccessKey'] = $awsSecretAccessKey;

        return $self;
    }

    /**
     * Storage backend type.
     *
     * @param Backend|value-of<Backend> $backend
     */
    public function withBackend(Backend|string $backend): self
    {
        $self = clone $this;
        $self['backend'] = $backend;

        return $self;
    }

    /**
     * Name of the bucket to be used to store recording files.
     */
    public function withBucket(string $bucket): self
    {
        $self = clone $this;
        $self['bucket'] = $bucket;

        return $self;
    }

    /**
     * Region where the bucket is located.
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }
}
