<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools;

use Telnyx\AI\Tools\UpdateDynamicVariablesToolParams\UpdatableVariable;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration for an update_dynamic_variables tool.
 *
 * @phpstan-import-type UpdatableVariableShape from \Telnyx\AI\Tools\UpdateDynamicVariablesToolParams\UpdatableVariable
 *
 * @phpstan-type UpdateDynamicVariablesToolParamsShape = array{
 *   description: string,
 *   name: string,
 *   updatableVariables: list<UpdatableVariable|UpdatableVariableShape>,
 * }
 */
final class UpdateDynamicVariablesToolParams implements BaseModel
{
    /** @use SdkModel<UpdateDynamicVariablesToolParamsShape> */
    use SdkModel;

    /**
     * Description of the tool passed to the assistant, guiding when to call it and which variables to update.
     */
    #[Required]
    public string $description;

    /**
     * The function name surfaced to the LLM. Must match the OpenAI function-name pattern `^[a-zA-Z0-9_-]+$` and be unique across the assistant's function, webhook, and client_side tools.
     */
    #[Required]
    public string $name;

    /**
     * The dynamic variables the assistant is allowed to write. At least one is required.
     *
     * @var list<UpdatableVariable> $updatableVariables
     */
    #[Required('updatable_variables', list: UpdatableVariable::class)]
    public array $updatableVariables;

    /**
     * `new UpdateDynamicVariablesToolParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UpdateDynamicVariablesToolParams::with(
     *   description: ..., name: ..., updatableVariables: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UpdateDynamicVariablesToolParams)
     *   ->withDescription(...)
     *   ->withName(...)
     *   ->withUpdatableVariables(...)
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
     * @param list<UpdatableVariable|UpdatableVariableShape> $updatableVariables
     */
    public static function with(
        string $description,
        string $name,
        array $updatableVariables
    ): self {
        $self = new self;

        $self['description'] = $description;
        $self['name'] = $name;
        $self['updatableVariables'] = $updatableVariables;

        return $self;
    }

    /**
     * Description of the tool passed to the assistant, guiding when to call it and which variables to update.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The function name surfaced to the LLM. Must match the OpenAI function-name pattern `^[a-zA-Z0-9_-]+$` and be unique across the assistant's function, webhook, and client_side tools.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The dynamic variables the assistant is allowed to write. At least one is required.
     *
     * @param list<UpdatableVariable|UpdatableVariableShape> $updatableVariables
     */
    public function withUpdatableVariables(array $updatableVariables): self
    {
        $self = clone $this;
        $self['updatableVariables'] = $updatableVariables;

        return $self;
    }
}
