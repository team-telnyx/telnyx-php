<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceCommandResultShape from \Telnyx\Conferences\Actions\ConferenceCommandResult
 *
 * @phpstan-type ActionRecordStopResponseShape = array{
 *   data?: null|ConferenceCommandResult|ConferenceCommandResultShape
 * }
 */
final class ActionRecordStopResponse implements BaseModel
{
    /** @use SdkModel<ActionRecordStopResponseShape> */
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
     * @param ConferenceCommandResultShape $data
     */
    public static function with(
        ConferenceCommandResult|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceCommandResultShape $data
     */
    public function withData(ConferenceCommandResult|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
