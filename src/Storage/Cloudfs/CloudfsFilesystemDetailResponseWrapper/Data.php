<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs\CloudfsFilesystemDetailResponseWrapper;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemStatus;

/**
 * A CloudFS filesystem as returned by get, update, and delete. `meta_url` omits the credential and there is no `meta_token` field — the token is only returned by create and rotate-meta-token.
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   error?: string|null,
 *   metaURL?: string|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   region?: string|null,
 *   s3Bucket?: string|null,
 *   s3Endpoint?: string|null,
 *   status?: null|CloudfsFilesystemStatus|value-of<CloudfsFilesystemStatus>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Explanation of the most recent failed lifecycle action. Present only when the filesystem is in a `failed` state.
     */
    #[Optional]
    public ?string $error;

    /**
     * PostgreSQL connection URL for the filesystem's metadata database, without the credential. Combine it with your stored metadata token, or issue a new token with rotate-meta-token.
     */
    #[Optional('meta_url')]
    public ?string $metaURL;

    #[Optional]
    public ?string $name;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional]
    public ?string $region;

    /**
     * Name of the bucket that stores this filesystem's data. Created during provisioning.
     */
    #[Optional('s3_bucket')]
    public ?string $s3Bucket;

    /**
     * URL of the Telnyx Cloud Storage endpoint backing this filesystem.
     */
    #[Optional('s3_endpoint')]
    public ?string $s3Endpoint;

    /**
     * Lifecycle status of the filesystem. `ready` means it is fully provisioned and usable. `needs_format` means the storage bucket and metadata database were provisioned but the filesystem has not yet been formatted — run `juicefs format` with the filesystem's `meta_url` before mounting. `failed` means the last lifecycle action failed — see the filesystem's `error` message. `deleted` appears only in the delete response: deleted filesystems are excluded from list results and return a `404` on retrieval.
     *
     * @var value-of<CloudfsFilesystemStatus>|null $status
     */
    #[Optional(enum: CloudfsFilesystemStatus::class)]
    public ?string $status;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CloudfsFilesystemStatus|value-of<CloudfsFilesystemStatus>|null $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $error = null,
        ?string $metaURL = null,
        ?string $name = null,
        ?string $recordType = null,
        ?string $region = null,
        ?string $s3Bucket = null,
        ?string $s3Endpoint = null,
        CloudfsFilesystemStatus|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $error && $self['error'] = $error;
        null !== $metaURL && $self['metaURL'] = $metaURL;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $region && $self['region'] = $region;
        null !== $s3Bucket && $self['s3Bucket'] = $s3Bucket;
        null !== $s3Endpoint && $self['s3Endpoint'] = $s3Endpoint;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Explanation of the most recent failed lifecycle action. Present only when the filesystem is in a `failed` state.
     */
    public function withError(string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    /**
     * PostgreSQL connection URL for the filesystem's metadata database, without the credential. Combine it with your stored metadata token, or issue a new token with rotate-meta-token.
     */
    public function withMetaURL(string $metaURL): self
    {
        $self = clone $this;
        $self['metaURL'] = $metaURL;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * Name of the bucket that stores this filesystem's data. Created during provisioning.
     */
    public function withS3Bucket(string $s3Bucket): self
    {
        $self = clone $this;
        $self['s3Bucket'] = $s3Bucket;

        return $self;
    }

    /**
     * URL of the Telnyx Cloud Storage endpoint backing this filesystem.
     */
    public function withS3Endpoint(string $s3Endpoint): self
    {
        $self = clone $this;
        $self['s3Endpoint'] = $s3Endpoint;

        return $self;
    }

    /**
     * Lifecycle status of the filesystem. `ready` means it is fully provisioned and usable. `needs_format` means the storage bucket and metadata database were provisioned but the filesystem has not yet been formatted — run `juicefs format` with the filesystem's `meta_url` before mounting. `failed` means the last lifecycle action failed — see the filesystem's `error` message. `deleted` appears only in the delete response: deleted filesystems are excluded from list results and return a `404` on retrieval.
     *
     * @param CloudfsFilesystemStatus|value-of<CloudfsFilesystemStatus> $status
     */
    public function withStatus(CloudfsFilesystemStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
