<?php

declare(strict_types=1);

namespace Telnyx\Actions\Register\RegisterNewResponse;

use Telnyx\Actions\Register\RegisterNewResponse\Error\Source;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ErrorShape = array{
 *   code: string,
 *   title: string,
 *   detail?: string|null,
 *   meta?: array<string,mixed>|null,
 *   source?: Source|null,
 * }
 */
final class Error implements BaseModel
{
    /** @use SdkModel<ErrorShape> */
    use SdkModel;

    #[Api]
    public string $code;

    #[Api]
    public string $title;

    #[Api(optional: true)]
    public ?string $detail;

    /** @var array<string,mixed>|null $meta */
    #[Api(map: 'mixed', optional: true)]
    public ?array $meta;

    #[Api(optional: true)]
    public ?Source $source;

    /**
     * `new Error()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Error::with(code: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Error)->withCode(...)->withTitle(...)
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
     */
    public static function with(
        string $code,
        string $title,
        ?string $detail = null,
        ?array $meta = null,
        ?Source $source = null,
    ): self {
        $obj = new self;

        $obj->code = $code;
        $obj->title = $title;

        null !== $detail && $obj->detail = $detail;
        null !== $meta && $obj->meta = $meta;
        null !== $source && $obj->source = $source;

        return $obj;
    }

    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }

    public function withDetail(string $detail): self
    {
        $obj = clone $this;
        $obj->detail = $detail;

        return $obj;
    }

    /**
     * @param array<string,mixed> $meta
     */
    public function withMeta(array $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }

    public function withSource(Source $source): self
    {
        $obj = clone $this;
        $obj->source = $source;

        return $obj;
    }
}
