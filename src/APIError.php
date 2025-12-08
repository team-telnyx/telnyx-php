<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\APIError\Source;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIErrorShape = array{
 *   code: string,
 *   title: string,
 *   detail?: string|null,
 *   meta?: array<string,mixed>|null,
 *   source?: Source|null,
 * }
 */
final class APIError implements BaseModel
{
    /** @use SdkModel<APIErrorShape> */
    use SdkModel;

    #[Required]
    public string $code;

    #[Required]
    public string $title;

    #[Optional]
    public ?string $detail;

    /** @var array<string,mixed>|null $meta */
    #[Optional(map: 'mixed')]
    public ?array $meta;

    #[Optional]
    public ?Source $source;

    /**
     * `new APIError()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIError::with(code: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIError)->withCode(...)->withTitle(...)
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
     * @param array<string,mixed> $meta
     * @param Source|array{parameter?: string|null, pointer?: string|null} $source
     */
    public static function with(
        string $code,
        string $title,
        ?string $detail = null,
        ?array $meta = null,
        Source|array|null $source = null,
    ): self {
        $obj = new self;

        $obj['code'] = $code;
        $obj['title'] = $title;

        null !== $detail && $obj['detail'] = $detail;
        null !== $meta && $obj['meta'] = $meta;
        null !== $source && $obj['source'] = $source;

        return $obj;
    }

    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj['title'] = $title;

        return $obj;
    }

    public function withDetail(string $detail): self
    {
        $obj = clone $this;
        $obj['detail'] = $detail;

        return $obj;
    }

    /**
     * @param array<string,mixed> $meta
     */
    public function withMeta(array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param Source|array{parameter?: string|null, pointer?: string|null} $source
     */
    public function withSource(Source|array $source): self
    {
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
    }
}
