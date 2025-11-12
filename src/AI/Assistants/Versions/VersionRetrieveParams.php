<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves a specific version of an assistant by assistant_id and version_id.
 *
 * @see Telnyx\Services\AI\Assistants\VersionsService::retrieve()
 *
 * @phpstan-type VersionRetrieveParamsShape = array{
 *   assistant_id: string, include_mcp_servers?: bool
 * }
 */
final class VersionRetrieveParams implements BaseModel
{
    /** @use SdkModel<VersionRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $assistant_id;

    #[Api(optional: true)]
    public ?bool $include_mcp_servers;

    /**
     * `new VersionRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionRetrieveParams::with(assistant_id: ...)
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
        string $assistant_id,
        ?bool $include_mcp_servers = null
    ): self {
        $obj = new self;

        $obj->assistant_id = $assistant_id;

        null !== $include_mcp_servers && $obj->include_mcp_servers = $include_mcp_servers;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj->assistant_id = $assistantID;

        return $obj;
    }

    public function withIncludeMcpServers(bool $includeMcpServers): self
    {
        $obj = clone $this;
        $obj->include_mcp_servers = $includeMcpServers;

        return $obj;
    }
}
