<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\SkipTurnTool;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SkipTurnShape = array{description?: string|null}
 */
final class SkipTurn implements BaseModel
{
    /** @use SdkModel<SkipTurnShape> */
    use SdkModel;

    /**
     * The description of the function that will be passed to the assistant.
     */
    #[Optional]
    public ?string $description;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $description = null): self
    {
        $self = new self;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * The description of the function that will be passed to the assistant.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
