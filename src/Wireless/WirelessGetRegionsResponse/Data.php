<?php

declare(strict_types=1);

namespace Telnyx\Wireless\WirelessGetRegionsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   code: string,
 *   name: string,
 *   insertedAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * The unique code of the region.
     */
    #[Api]
    public string $code;

    /**
     * The name of the region.
     */
    #[Api]
    public string $name;

    /**
     * Timestamp when the region was inserted.
     */
    #[Api('inserted_at', optional: true)]
    public ?\DateTimeInterface $insertedAt;

    /**
     * Timestamp when the region was last updated.
     */
    #[Api('updated_at', optional: true)]
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
        $obj = new self;

        $obj->code = $code;
        $obj->name = $name;

        null !== $insertedAt && $obj->insertedAt = $insertedAt;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The unique code of the region.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * The name of the region.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Timestamp when the region was inserted.
     */
    public function withInsertedAt(\DateTimeInterface $insertedAt): self
    {
        $obj = clone $this;
        $obj->insertedAt = $insertedAt;

        return $obj;
    }

    /**
     * Timestamp when the region was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
