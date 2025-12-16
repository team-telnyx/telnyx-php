<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallControlCommandResultShape from \Telnyx\Calls\Actions\CallControlCommandResult
 *
 * @phpstan-type ActionStopAIAssistantResponseShape = array{
 *   data?: null|CallControlCommandResult|CallControlCommandResultShape
 * }
 */
final class ActionStopAIAssistantResponse implements BaseModel
{
    /** @use SdkModel<ActionStopAIAssistantResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CallControlCommandResult $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallControlCommandResultShape $data
     */
    public static function with(
        CallControlCommandResult|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallControlCommandResultShape $data
     */
    public function withData(CallControlCommandResult|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
