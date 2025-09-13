<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\FailedOperation;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\FailedOperation\Error\Meta;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\FailedOperation\Error\Source;

/**
 * @phpstan-type error_alias = array{
 *   code: string, title: string, detail?: string, meta?: Meta, source?: Source
 * }
 */
final class Error implements BaseModel
{
    /** @use SdkModel<error_alias> */
    use SdkModel;

    #[Api]
    public string $code;

    #[Api]
    public string $title;

    #[Api(optional: true)]
    public ?string $detail;

    #[Api(optional: true)]
    public ?Meta $meta;

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
     */
    public static function with(
        string $code,
        string $title,
        ?string $detail = null,
        ?Meta $meta = null,
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

    public function withMeta(Meta $meta): self
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
