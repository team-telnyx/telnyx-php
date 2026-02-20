<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * End a conference and terminate all active participants.
 *
 * @see Telnyx\Services\Conferences\ActionsService::endConference()
 *
 * @phpstan-type ActionEndConferenceParamsShape = array{commandID?: string|null}
 */
final class ActionEndConferenceParams implements BaseModel
{
    /** @use SdkModel<ActionEndConferenceParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same conference.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $commandID = null): self
    {
        $self = new self;

        null !== $commandID && $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same conference.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }
}
