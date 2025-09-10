<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tools;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ToolTestParams); // set properties as needed
 * $client->ai.assistants.tools->test(...$params->toArray());
 * ```
 * Test a webhook tool for an assistant.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.assistants.tools->test(...$params->toArray());`
 *
 * @see Telnyx\AI\Assistants\Tools->test
 *
 * @phpstan-type tool_test_params = array{
 *   assistantID: string,
 *   arguments?: array<string, mixed>,
 *   dynamicVariables?: array<string, mixed>,
 * }
 */
final class ToolTestParams implements BaseModel
{
    /** @use SdkModel<tool_test_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $assistantID;

    /**
     * Key-value arguments to use for the webhook test.
     *
     * @var array<string, mixed>|null $arguments
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $arguments;

    /**
     * Key-value dynamic variables to use for the webhook test.
     *
     * @var array<string, mixed>|null $dynamicVariables
     */
    #[Api('dynamic_variables', map: 'mixed', optional: true)]
    public ?array $dynamicVariables;

    /**
     * `new ToolTestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolTestParams::with(assistantID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolTestParams)->withAssistantID(...)
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
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $dynamicVariables
     */
    public static function with(
        string $assistantID,
        ?array $arguments = null,
        ?array $dynamicVariables = null
    ): self {
        $obj = new self;

        $obj->assistantID = $assistantID;

        null !== $arguments && $obj->arguments = $arguments;
        null !== $dynamicVariables && $obj->dynamicVariables = $dynamicVariables;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj->assistantID = $assistantID;

        return $obj;
    }

    /**
     * Key-value arguments to use for the webhook test.
     *
     * @param array<string, mixed> $arguments
     */
    public function withArguments(array $arguments): self
    {
        $obj = clone $this;
        $obj->arguments = $arguments;

        return $obj;
    }

    /**
     * Key-value dynamic variables to use for the webhook test.
     *
     * @param array<string, mixed> $dynamicVariables
     */
    public function withDynamicVariables(array $dynamicVariables): self
    {
        $obj = clone $this;
        $obj->dynamicVariables = $dynamicVariables;

        return $obj;
    }
}
