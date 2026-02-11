<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Tools;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Delete a tool from a mission.
 *
 * @see Telnyx\Services\AI\Missions\ToolsService::deleteTool()
 *
 * @phpstan-type ToolDeleteToolParamsShape = array{missionID: string}
 */
final class ToolDeleteToolParams implements BaseModel
{
    /** @use SdkModel<ToolDeleteToolParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    /**
     * `new ToolDeleteToolParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolDeleteToolParams::with(missionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolDeleteToolParams)->withMissionID(...)
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
