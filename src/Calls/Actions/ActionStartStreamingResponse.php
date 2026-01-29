<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallControlCommandResultShape from \Telnyx\Calls\Actions\CallControlCommandResult
 *
 * @phpstan-type ActionStartStreamingResponseShape = array{
 *   data?: null|CallControlCommandResult|CallControlCommandResultShape
 * }
 */
final class ActionStartStreamingResponse implements BaseModel
{
    /** @use SdkModel<ActionStartStreamingResponseShape> */
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
     * @param CallControlCommandResult|CallControlCommandResultShape|null $data
     */
    public static function with(
        CallControlCommandResult|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallControlCommandResult|CallControlCommandResultShape $data
     */
    public function withData(CallControlCommandResult|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
