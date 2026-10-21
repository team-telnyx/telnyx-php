<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Tools\VisionToolParams;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * (BETA) Lets the assistant look at recent image frames the client sent into the conversation (for example webcam or screen-share frames). Frames are sent with `conversation.item.create` and `item.buffer: true`; they never trigger a response on their own. The assistant decides when to look and which frames it needs. Requires a model that supports image input.
 *
 * @phpstan-import-type VisionToolParamsShape from \Telnyx\AI\Tools\VisionToolParams
 *
 * @phpstan-type VisionToolShape = array{
 *   type: 'vision',
 *   shared?: bool|null,
 *   vision?: null|VisionToolParams|VisionToolParamsShape,
 * }
 */
final class VisionTool implements BaseModel
{
    /** @use SdkModel<VisionToolShape> */
    use SdkModel;

    /** @var 'vision' $type */
    #[Required]
    public string $type = 'vision';

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    #[Optional]
    public ?bool $shared;

    #[Optional]
    public ?VisionToolParams $vision;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param VisionToolParams|VisionToolParamsShape|null $vision
     */
    public static function with(
        ?bool $shared = null,
        VisionToolParams|array|null $vision = null
    ): self {
        $self = new self;

        null !== $shared && $self['shared'] = $shared;
        null !== $vision && $self['vision'] = $vision;

        return $self;
    }

    /**
     * @param 'vision' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    public function withShared(bool $shared): self
    {
        $self = clone $this;
        $self['shared'] = $shared;

        return $self;
    }

    /**
     * @param VisionToolParams|VisionToolParamsShape $vision
     */
    public function withVision(VisionToolParams|array $vision): self
    {
        $self = clone $this;
        $self['vision'] = $vision;

        return $self;
    }
}
