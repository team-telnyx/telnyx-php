<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Tools\UpdateDynamicVariablesToolParams;
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
        UpdateDynamicVariablesToolParams|array $updateDynamicVariables
    ): self {
        $self = new self;

        $self['updateDynamicVariables'] = $updateDynamicVariables;

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
}
