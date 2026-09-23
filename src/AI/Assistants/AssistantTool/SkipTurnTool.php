<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\SkipTurnTool\SkipTurn;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SkipTurnShape from \Telnyx\AI\Assistants\AssistantTool\SkipTurnTool\SkipTurn
 *
 * @phpstan-type SkipTurnToolShape = array{
 *   skipTurn: SkipTurn|SkipTurnShape, type: 'skip_turn', shared?: bool|null
 * }
 */
final class SkipTurnTool implements BaseModel
{
    /** @use SdkModel<SkipTurnToolShape> */
    use SdkModel;

    /** @var 'skip_turn' $type */
    #[Required]
    public string $type = 'skip_turn';

    #[Required('skip_turn')]
    public SkipTurn $skipTurn;

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    #[Optional]
    public ?bool $shared;

    /**
     * `new SkipTurnTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SkipTurnTool::with(skipTurn: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SkipTurnTool)->withSkipTurn(...)
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
     * @param SkipTurn|SkipTurnShape $skipTurn
     */
    public static function with(
        SkipTurn|array $skipTurn,
        ?bool $shared = null
    ): self {
        $self = new self;

        $self['skipTurn'] = $skipTurn;

        null !== $shared && $self['shared'] = $shared;

        return $self;
    }

    /**
     * @param SkipTurn|SkipTurnShape $skipTurn
     */
    public function withSkipTurn(SkipTurn|array $skipTurn): self
    {
        $self = clone $this;
        $self['skipTurn'] = $skipTurn;

        return $self;
    }

    /**
     * @param 'skip_turn' $type
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
}
