<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\SkipTurnTool\SkipTurn;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SkipTurnShape from \Telnyx\AI\Assistants\AssistantTool\SkipTurnTool\SkipTurn
 *
 * @phpstan-type SkipTurnToolShape = array{
 *   skipTurn: SkipTurn|SkipTurnShape, type: 'skip_turn'
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
    public static function with(SkipTurn|array $skipTurn): self
    {
        $self = new self;

        $self['skipTurn'] = $skipTurn;

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
}
