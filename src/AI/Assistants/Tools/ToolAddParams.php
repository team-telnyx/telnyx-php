<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tools;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Add Assistant Tool.
 *
 * @see Telnyx\Services\AI\Assistants\ToolsService::add()
 *
 * @phpstan-type ToolAddParamsShape = array{assistantID: string}
 */
final class ToolAddParams implements BaseModel
{
    /** @use SdkModel<ToolAddParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $assistantID;

    /**
     * `new ToolAddParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolAddParams::with(assistantID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolAddParams)->withAssistantID(...)
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
    public static function with(string $assistantID): self
    {
        $self = new self;

        $self['assistantID'] = $assistantID;

        return $self;
    }

    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

        return $self;
    }
}
