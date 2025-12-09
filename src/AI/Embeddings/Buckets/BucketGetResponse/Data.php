<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\Buckets\BucketGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   createdAt: \DateTimeInterface,
 *   filename: string,
 *   status: string,
 *   errorReason?: string|null,
 *   lastEmbeddedAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $filename;

    #[Required]
    public string $status;

    #[Optional('error_reason')]
    public ?string $errorReason;

    #[Optional('last_embedded_at')]
    public ?\DateTimeInterface $lastEmbeddedAt;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(createdAt: ..., filename: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withCreatedAt(...)->withFilename(...)->withStatus(...)
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
    public static function with(
        \DateTimeInterface $createdAt,
        string $filename,
        string $status,
        ?string $errorReason = null,
        ?\DateTimeInterface $lastEmbeddedAt = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['filename'] = $filename;
        $self['status'] = $status;

        null !== $errorReason && $self['errorReason'] = $errorReason;
        null !== $lastEmbeddedAt && $self['lastEmbeddedAt'] = $lastEmbeddedAt;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withErrorReason(string $errorReason): self
    {
        $self = clone $this;
        $self['errorReason'] = $errorReason;

        return $self;
    }

    public function withLastEmbeddedAt(\DateTimeInterface $lastEmbeddedAt): self
    {
        $self = clone $this;
        $self['lastEmbeddedAt'] = $lastEmbeddedAt;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
