<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Tools;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get a specific tool by ID.
 *
 * @see Telnyx\Services\AI\Missions\ToolsService::getTool()
 *
 * @phpstan-type ToolGetToolParamsShape = array{missionID: string}
 */
final class ToolGetToolParams implements BaseModel
{
    /** @use SdkModel<ToolGetToolParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    /**
     * `new ToolGetToolParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolGetToolParams::with(missionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolGetToolParams)->withMissionID(...)
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
