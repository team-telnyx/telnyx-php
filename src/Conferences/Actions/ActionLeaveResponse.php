<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionLeaveResponseShape = array{
 *   data?: ConferenceCommandResult|null
 * }
 */
final class ActionLeaveResponse implements BaseModel
{
    /** @use SdkModel<ActionLeaveResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ConferenceCommandResult $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceCommandResult|array{result: string} $data
     */
    public static function with(
        ConferenceCommandResult|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param ConferenceCommandResult|array{result: string} $data
     */
    public function withData(ConferenceCommandResult|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
