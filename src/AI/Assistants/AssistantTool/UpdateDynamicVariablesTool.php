<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Tools\UpdateDynamicVariablesToolParams;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The update_dynamic_variables tool lets the assistant write values into the conversation's dynamic-variables context during the call. Updated variables are available to later `{{variable}}` interpolation (prompts, speak nodes, message templates) and to flow edge conditions. Declare each variable the assistant is allowed to set under `updatable_variables`.
 *
 * @phpstan-import-type UpdateDynamicVariablesToolParamsShape from \Telnyx\AI\Tools\UpdateDynamicVariablesToolParams
 *
 * @phpstan-type UpdateDynamicVariablesToolShape = array{
 *   type: 'update_dynamic_variables',
 *   updateDynamicVariables: UpdateDynamicVariablesToolParams|UpdateDynamicVariablesToolParamsShape,
 *   shared?: bool|null,
 * }
 */
final class UpdateDynamicVariablesTool implements BaseModel
{
    /** @use SdkModel<UpdateDynamicVariablesToolShape> */
    use SdkModel;

    /** @var 'update_dynamic_variables' $type */
    #[Required]
    public string $type = 'update_dynamic_variables';

    /**
     * Configuration for an update_dynamic_variables tool.
     */
    #[Required('update_dynamic_variables')]
    public UpdateDynamicVariablesToolParams $updateDynamicVariables;

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    #[Optional]
    public ?bool $shared;

    /**
     * `new UpdateDynamicVariablesTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UpdateDynamicVariablesTool::with(updateDynamicVariables: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UpdateDynamicVariablesTool)->withUpdateDynamicVariables(...)
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
     * @param UpdateDynamicVariablesToolParams|UpdateDynamicVariablesToolParamsShape $updateDynamicVariables
     */
    public static function with(
        UpdateDynamicVariablesToolParams|array $updateDynamicVariables,
        ?bool $shared = null,
    ): self {
        $self = new self;

        $self['updateDynamicVariables'] = $updateDynamicVariables;

        null !== $shared && $self['shared'] = $shared;

        return $self;
    }

    /**
     * @param 'update_dynamic_variables' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Configuration for an update_dynamic_variables tool.
     *
     * @param UpdateDynamicVariablesToolParams|UpdateDynamicVariablesToolParamsShape $updateDynamicVariables
     */
    public function withUpdateDynamicVariables(
        UpdateDynamicVariablesToolParams|array $updateDynamicVariables
    ): self {
        $self = clone $this;
        $self['updateDynamicVariables'] = $updateDynamicVariables;

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
