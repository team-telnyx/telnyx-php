<?php

declare(strict_types=1);

namespace Telnyx\Wireless\WirelessGetRegionsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   code: string,
 *   name: string,
 *   inserted_at?: \DateTimeInterface|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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
    #[Api(optional: true)]
    public ?\DateTimeInterface $inserted_at;

    /**
     * Timestamp when the region was last updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

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
        ?\DateTimeInterface $inserted_at = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        $obj['code'] = $code;
        $obj['name'] = $name;

        null !== $inserted_at && $obj['inserted_at'] = $inserted_at;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * The unique code of the region.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    /**
     * The name of the region.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Timestamp when the region was inserted.
     */
    public function withInsertedAt(\DateTimeInterface $insertedAt): self
    {
        $obj = clone $this;
        $obj['inserted_at'] = $insertedAt;

        return $obj;
    }

    /**
     * Timestamp when the region was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
