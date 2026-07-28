<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\EmailMessageBatchResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailMessages\EmailMessageBatchResponse\Error\Code;

/**
 * @phpstan-type ErrorShape = array{
 *   code: Code|value-of<Code>, index: int, message: string
 * }
 */
final class Error implements BaseModel
{
    /** @use SdkModel<ErrorShape> */
    use SdkModel;

    /**
     * Batch item errors use `message` (not `detail`) for the human-readable text.
     *
     * @var value-of<Code> $code
     */
    #[Required(enum: Code::class)]
    public string $code;

    /**
     * Zero-based index of the failed message in the request array.
     */
    #[Required]
    public int $index;

    #[Required]
    public string $message;

    /**
     * `new Error()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Error::with(code: ..., index: ..., message: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Error)->withCode(...)->withIndex(...)->withMessage(...)
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
     * @param Code|value-of<Code> $code
     */
    public static function with(
        Code|string $code,
        int $index,
        string $message
    ): self {
        $self = new self;

        $self['code'] = $code;
        $self['index'] = $index;
        $self['message'] = $message;

        return $self;
    }

    /**
     * Batch item errors use `message` (not `detail`) for the human-readable text.
     *
     * @param Code|value-of<Code> $code
     */
    public function withCode(Code|string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * Zero-based index of the failed message in the request array.
     */
    public function withIndex(int $index): self
    {
        $self = clone $this;
        $self['index'] = $index;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }
}
