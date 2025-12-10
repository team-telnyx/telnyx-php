<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Tool;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type Function1Shape = array{
 *   function: \Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\Function1\Function1,
 *   type?: 'function',
 * }
 */
final class Function1 implements BaseModel
{
    /** @use SdkModel<Function1Shape> */
    use SdkModel;

    /** @var 'function' $type */
    #[Required]
    public string $type = 'function';

    #[Required]
    public Function1\Function1 $function;

    /**
     * `new Function1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Function1::with(function: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Function1)->withFunction(...)
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
     * @param Function1\Function1|array{
     *   name: string, description?: string|null, parameters?: array<string,mixed>|null
     * } $function
     */
    public static function with(
        Function1\Function1|array $function,
    ): self {
        $self = new self;

        $self['function'] = $function;

        return $self;
    }

    /**
     * @param Function1\Function1|array{
     *   name: string, description?: string|null, parameters?: array<string,mixed>|null
     * } $function
     */
    public function withFunction(
        Function1\Function1|array $function,
    ): self {
        $self = clone $this;
        $self['function'] = $function;

        return $self;
    }
}
