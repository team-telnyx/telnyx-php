<?php

declare(strict_types=1);

namespace Telnyx\CustomStorageCredentials;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomStorageCredentials\S3GenericConfigurationData\Backend;

/**
 * @phpstan-type S3GenericConfigurationDataShape = array{
 *   awsAccessKeyID: string,
 *   awsSecretAccessKey: string,
 *   backend: Backend|value-of<Backend>,
 *   bucket: string,
 *   endpoint: string,
 *   region: string,
 * }
 */
final class S3GenericConfigurationData implements BaseModel
{
    /** @use SdkModel<S3GenericConfigurationDataShape> */
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
     * URL of an S3-compatible storage endpoint, used to direct uploads and presigned download URLs to a non-AWS store (for example MinIO, Cloudflare R2, Wasabi, Backblaze B2, or Supabase). A bare host (https://s3.example.com) or a path-prefixed URL (https://xyz.supabase.co/storage/v1/s3) is accepted, and must use the http or https scheme.
     */
    #[Required]
    public string $endpoint;

    /**
     * Region where the bucket is located.
     */
    #[Required]
    public string $region;

    /**
     * `new S3GenericConfigurationData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * S3GenericConfigurationData::with(
     *   awsAccessKeyID: ...,
     *   awsSecretAccessKey: ...,
     *   backend: ...,
     *   bucket: ...,
     *   endpoint: ...,
     *   region: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new S3GenericConfigurationData)
     *   ->withAwsAccessKeyID(...)
     *   ->withAwsSecretAccessKey(...)
     *   ->withBackend(...)
     *   ->withBucket(...)
     *   ->withEndpoint(...)
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
        string $endpoint,
        string $region,
    ): self {
        $self = new self;

        $self['awsAccessKeyID'] = $awsAccessKeyID;
        $self['awsSecretAccessKey'] = $awsSecretAccessKey;
        $self['backend'] = $backend;
        $self['bucket'] = $bucket;
        $self['endpoint'] = $endpoint;
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
     * URL of an S3-compatible storage endpoint, used to direct uploads and presigned download URLs to a non-AWS store (for example MinIO, Cloudflare R2, Wasabi, Backblaze B2, or Supabase). A bare host (https://s3.example.com) or a path-prefixed URL (https://xyz.supabase.co/storage/v1/s3) is accepted, and must use the http or https scheme.
     */
    public function withEndpoint(string $endpoint): self
    {
        $self = clone $this;
        $self['endpoint'] = $endpoint;

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
