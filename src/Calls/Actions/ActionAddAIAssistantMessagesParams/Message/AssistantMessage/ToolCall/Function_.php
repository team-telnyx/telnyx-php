<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\AssistantMessage\ToolCall;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The function that the model called.
 *
 * @phpstan-type FunctionShape = array{name: string}
 */
final class Function_ implements BaseModel
{
    /** @use SdkModel<FunctionShape> */
    use SdkModel;

    /**
     * The name of the function to call.
     */
    #[Required]
    public string $name;

    /**
     * `new Function_()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Function_::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Function_)->withName(...)
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
    public static function with(string $name): self
    {
        $self = new self;

        $self['name'] = $name;

        return $self;
    }

    /**
     * The name of the function to call.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
