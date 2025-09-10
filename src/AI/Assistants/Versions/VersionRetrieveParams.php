<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new VersionRetrieveParams); // set properties as needed
 * $client->ai.assistants.versions->retrieve(...$params->toArray());
 * ```
 * Retrieves a specific version of an assistant by assistant_id and version_id.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.assistants.versions->retrieve(...$params->toArray());`
 *
 * @see Telnyx\AI\Assistants\Versions->retrieve
 *
 * @phpstan-type version_retrieve_params = array{
 *   assistantID: string, includeMcpServers?: bool
 * }
 */
final class VersionRetrieveParams implements BaseModel
{
    /** @use SdkModel<version_retrieve_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $assistantID;

    #[Api(optional: true)]
    public ?bool $includeMcpServers;

    /**
     * `new VersionRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionRetrieveParams::with(assistantID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionRetrieveParams)->withAssistantID(...)
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
    public static function with(
        string $assistantID,
        ?bool $includeMcpServers = null
    ): self {
        $obj = new self;

        $obj->assistantID = $assistantID;

        null !== $includeMcpServers && $obj->includeMcpServers = $includeMcpServers;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj->assistantID = $assistantID;

        return $obj;
    }

    public function withIncludeMcpServers(bool $includeMcpServers): self
    {
        $obj = clone $this;
        $obj->includeMcpServers = $includeMcpServers;

        return $obj;
    }
}
