<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\McpServers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get a specific MCP server by ID.
 *
 * @see Telnyx\Services\AI\Missions\McpServersService::getMcpServer()
 *
 * @phpstan-type McpServerGetMcpServerParamsShape = array{missionID: string}
 */
final class McpServerGetMcpServerParams implements BaseModel
{
    /** @use SdkModel<McpServerGetMcpServerParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    /**
     * `new McpServerGetMcpServerParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * McpServerGetMcpServerParams::with(missionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new McpServerGetMcpServerParams)->withMissionID(...)
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
    public static function with(string $missionID): self
    {
        $self = new self;

        $self['missionID'] = $missionID;

        return $self;
    }

    public function withMissionID(string $missionID): self
    {
        $self = clone $this;
        $self['missionID'] = $missionID;

        return $self;
    }
}
