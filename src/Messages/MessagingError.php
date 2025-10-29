<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessagingError\Source;

/**
 * @phpstan-type MessagingErrorShape = array{
 *   code: string, title: string, detail?: string, meta?: mixed, source?: Source
 * }
 */
final class MessagingError implements BaseModel
{
    /** @use SdkModel<MessagingErrorShape> */
    use SdkModel;

    #[Api]
    public string $code;

    #[Api]
    public string $title;

    #[Api(optional: true)]
    public ?string $detail;

    #[Api(optional: true)]
    public mixed $meta;

    #[Api(optional: true)]
    public ?Source $source;

    /**
     * `new MessagingError()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingError::with(code: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessagingError)->withCode(...)->withTitle(...)
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
        string $title,
        ?string $detail = null,
        mixed $meta = null,
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

    public function withMeta(mixed $meta): self
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
