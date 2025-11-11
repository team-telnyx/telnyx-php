<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter by voice connection name pattern matching.
 *
 * @phpstan-type VoiceConnectionNameShape = array{
 *   contains?: string|null,
 *   ends_with?: string|null,
 *   eq?: string|null,
 *   starts_with?: string|null,
 * }
 */
final class VoiceConnectionName implements BaseModel
{
    /** @use SdkModel<VoiceConnectionNameShape> */
    use SdkModel;

    /**
     * Filter contains connection name. Requires at least three characters.
     */
    #[Api(optional: true)]
    public ?string $contains;

    /**
     * Filter ends with connection name. Requires at least three characters.
     */
    #[Api(optional: true)]
    public ?string $ends_with;

    /**
     * Filter by connection name.
     */
    #[Api(optional: true)]
    public ?string $eq;

    /**
     * Filter starts with connection name. Requires at least three characters.
     */
    #[Api(optional: true)]
    public ?string $starts_with;

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
        ?string $contains = null,
        ?string $ends_with = null,
        ?string $eq = null,
        ?string $starts_with = null,
    ): self {
        $obj = new self;

        null !== $contains && $obj->contains = $contains;
        null !== $ends_with && $obj->ends_with = $ends_with;
        null !== $eq && $obj->eq = $eq;
        null !== $starts_with && $obj->starts_with = $starts_with;

        return $obj;
    }

    /**
     * Filter contains connection name. Requires at least three characters.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains;

        return $obj;
    }

    /**
     * Filter ends with connection name. Requires at least three characters.
     */
    public function withEndsWith(string $endsWith): self
    {
        $obj = clone $this;
        $obj->ends_with = $endsWith;

        return $obj;
    }

    /**
     * Filter by connection name.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj->eq = $eq;

        return $obj;
    }

    /**
     * Filter starts with connection name. Requires at least three characters.
     */
    public function withStartsWith(string $startsWith): self
    {
        $obj = clone $this;
        $obj->starts_with = $startsWith;

        return $obj;
    }
}
