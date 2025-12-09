<?php

declare(strict_types=1);

namespace Telnyx\Wireless\WirelessGetRegionsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   code: string,
 *   name: string,
 *   insertedAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The unique code of the region.
     */
    #[Required]
    public string $code;

    /**
     * The name of the region.
     */
    #[Required]
    public string $name;

    /**
     * Timestamp when the region was inserted.
     */
    #[Optional('inserted_at')]
    public ?\DateTimeInterface $insertedAt;

    /**
     * Timestamp when the region was last updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(code: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withCode(...)->withName(...)
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
        string $code,
        string $name,
        ?\DateTimeInterface $insertedAt = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['code'] = $code;
        $self['name'] = $name;

        null !== $insertedAt && $self['insertedAt'] = $insertedAt;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The unique code of the region.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * The name of the region.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Timestamp when the region was inserted.
     */
    public function withInsertedAt(\DateTimeInterface $insertedAt): self
    {
        $self = clone $this;
        $self['insertedAt'] = $insertedAt;

        return $self;
    }

    /**
     * Timestamp when the region was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
