<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\Buckets\BucketGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   created_at: \DateTimeInterface,
 *   filename: string,
 *   status: string,
 *   error_reason?: string|null,
 *   last_embedded_at?: \DateTimeInterface|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public \DateTimeInterface $created_at;

    #[Required]
    public string $filename;

    #[Required]
    public string $status;

    #[Optional]
    public ?string $error_reason;

    #[Optional]
    public ?\DateTimeInterface $last_embedded_at;

    #[Optional]
    public ?\DateTimeInterface $updated_at;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(created_at: ..., filename: ..., status: ...)
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
        \DateTimeInterface $created_at,
        string $filename,
        string $status,
        ?string $error_reason = null,
        ?\DateTimeInterface $last_embedded_at = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        $obj['created_at'] = $created_at;
        $obj['filename'] = $filename;
        $obj['status'] = $status;

        null !== $error_reason && $obj['error_reason'] = $error_reason;
        null !== $last_embedded_at && $obj['last_embedded_at'] = $last_embedded_at;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj['filename'] = $filename;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withErrorReason(string $errorReason): self
    {
        $obj = clone $this;
        $obj['error_reason'] = $errorReason;

        return $obj;
    }

    public function withLastEmbeddedAt(\DateTimeInterface $lastEmbeddedAt): self
    {
        $obj = clone $this;
        $obj['last_embedded_at'] = $lastEmbeddedAt;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
