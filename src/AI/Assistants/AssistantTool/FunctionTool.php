<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\OpenAI\Chat\FunctionDefinition;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FunctionDefinitionShape from \Telnyx\AI\OpenAI\Chat\FunctionDefinition
 *
 * @phpstan-type FunctionToolShape = array{
 *   function: FunctionDefinition|FunctionDefinitionShape,
 *   type: 'function',
 *   shared?: bool|null,
 * }
 */
final class FunctionTool implements BaseModel
{
    /** @use SdkModel<FunctionToolShape> */
    use SdkModel;

    /** @var 'function' $type */
    #[Required]
    public string $type = 'function';

    #[Required]
    public FunctionDefinition $function;

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    #[Optional]
    public ?bool $shared;

    /**
     * `new FunctionTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionTool::with(function: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FunctionTool)->withFunction(...)
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
    public static function with(
        FunctionDefinition|array $function,
        ?bool $shared = null
    ): self {
        $self = new self;

        $self['function'] = $function;

        null !== $shared && $self['shared'] = $shared;

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

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    public function withShared(bool $shared): self
    {
        $self = clone $this;
        $self['shared'] = $shared;

        return $self;
    }
}
