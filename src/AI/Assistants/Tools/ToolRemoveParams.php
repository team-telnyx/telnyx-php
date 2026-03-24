<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tools;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Remove Assistant Tool.
 *
 * @see Telnyx\Services\AI\Assistants\ToolsService::remove()
 *
 * @phpstan-type ToolRemoveParamsShape = array{assistantID: string}
 */
final class ToolRemoveParams implements BaseModel
{
    /** @use SdkModel<ToolRemoveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $assistantID;

    /**
     * `new ToolRemoveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolRemoveParams::with(assistantID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolRemoveParams)->withAssistantID(...)
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
