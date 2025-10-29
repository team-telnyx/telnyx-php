<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\Buckets\BucketGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   createdAt: \DateTimeInterface,
 *   filename: string,
 *   status: string,
 *   errorReason?: string,
 *   lastEmbeddedAt?: \DateTimeInterface,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $filename;

    #[Api]
    public string $status;

    #[Api('error_reason', optional: true)]
    public ?string $errorReason;

    #[Api('last_embedded_at', optional: true)]
    public ?\DateTimeInterface $lastEmbeddedAt;

    #[Api('updated_at', optional: true)]
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
        $obj = new self;

        $obj->createdAt = $createdAt;
        $obj->filename = $filename;
        $obj->status = $status;

        null !== $errorReason && $obj->errorReason = $errorReason;
        null !== $lastEmbeddedAt && $obj->lastEmbeddedAt = $lastEmbeddedAt;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    public function withErrorReason(string $errorReason): self
    {
        $obj = clone $this;
        $obj->errorReason = $errorReason;

        return $obj;
    }

    public function withLastEmbeddedAt(\DateTimeInterface $lastEmbeddedAt): self
    {
        $obj = clone $this;
        $obj->lastEmbeddedAt = $lastEmbeddedAt;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
