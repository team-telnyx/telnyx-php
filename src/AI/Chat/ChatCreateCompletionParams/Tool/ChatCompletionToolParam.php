<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Tool;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam\FunctionDefinition;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FunctionDefinitionShape from \Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam\FunctionDefinition
 *
 * @phpstan-type ChatCompletionToolParamShape = array{
 *   function: FunctionDefinition|FunctionDefinitionShape, type: 'function'
 * }
 */
final class ChatCompletionToolParam implements BaseModel
{
    /** @use SdkModel<ChatCompletionToolParamShape> */
    use SdkModel;

    /** @var 'function' $type */
    #[Required]
    public string $type = 'function';

    #[Required]
    public FunctionDefinition $function;

    /**
     * `new ChatCompletionToolParam()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChatCompletionToolParam::with(function: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChatCompletionToolParam)->withFunction(...)
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
     * @param FunctionDefinition|FunctionDefinitionShape $function
     */
    public static function with(FunctionDefinition|array $function): self
    {
        $self = new self;

        $self['function'] = $function;

        return $self;
    }

    /**
     * @param FunctionDefinition|FunctionDefinitionShape $function
     */
    public function withFunction(FunctionDefinition|array $function): self
    {
        $self = clone $this;
        $self['function'] = $function;

        return $self;
    }

    /**
     * @param 'function' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
