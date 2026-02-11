<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\McpServers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Delete an MCP server from a mission.
 *
 * @see Telnyx\Services\AI\Missions\McpServersService::deleteMcpServer()
 *
 * @phpstan-type McpServerDeleteMcpServerParamsShape = array{missionID: string}
 */
final class McpServerDeleteMcpServerParams implements BaseModel
{
    /** @use SdkModel<McpServerDeleteMcpServerParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    /**
     * `new McpServerDeleteMcpServerParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * McpServerDeleteMcpServerParams::with(missionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new McpServerDeleteMcpServerParams)->withMissionID(...)
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
