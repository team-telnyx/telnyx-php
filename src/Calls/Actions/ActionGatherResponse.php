<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionGatherResponseShape = array{
 *   data?: CallControlCommandResult|null
 * }
 */
final class ActionGatherResponse implements BaseModel
{
    /** @use SdkModel<ActionGatherResponseShape> */
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
     * @param CallControlCommandResult|array{result?: string|null} $data
     */
    public static function with(
        CallControlCommandResult|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallControlCommandResult|array{result?: string|null} $data
     */
    public function withData(CallControlCommandResult|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
