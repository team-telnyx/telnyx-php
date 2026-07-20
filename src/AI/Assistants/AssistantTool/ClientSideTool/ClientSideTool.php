<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\ClientSideTool;

use Telnyx\AI\Assistants\AssistantTool\ClientSideTool\ClientSideTool\Parameters;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ParametersShape from \Telnyx\AI\Assistants\AssistantTool\ClientSideTool\ClientSideTool\Parameters
 *
 * @phpstan-type ClientSideToolShape = array{
 *   description: string, name: string, parameters: Parameters|ParametersShape
 * }
 */
final class ClientSideTool implements BaseModel
{
    /** @use SdkModel<ClientSideToolShape> */
    use SdkModel;

    /**
     * The description of the tool.
     */
    #[Required]
    public string $description;

    /**
     * The name of the tool.
     */
    #[Required]
    public string $name;

    /**
     * The parameters the tool accepts, described as a JSON Schema object. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     */
    #[Required]
    public Parameters $parameters;

    /**
     * `new ClientSideTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClientSideTool::with(description: ..., name: ..., parameters: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClientSideTool)->withDescription(...)->withName(...)->withParameters(...)
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
     * @param Parameters|ParametersShape $parameters
     */
    public static function with(
        string $description,
        string $name,
        Parameters|array $parameters
    ): self {
        $self = new self;

        $self['description'] = $description;
        $self['name'] = $name;
        $self['parameters'] = $parameters;

        return $self;
    }

    /**
     * The description of the tool.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The name of the tool.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The parameters the tool accepts, described as a JSON Schema object. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     *
     * @param Parameters|ParametersShape $parameters
     */
    public function withParameters(Parameters|array $parameters): self
    {
        $self = clone $this;
        $self['parameters'] = $parameters;

        return $self;
    }
}
