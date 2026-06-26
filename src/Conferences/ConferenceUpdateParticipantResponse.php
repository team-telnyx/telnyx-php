<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceParticipantShape from \Telnyx\Conferences\ConferenceParticipant
 *
 * @phpstan-type ConferenceUpdateParticipantResponseShape = array{
 *   data?: null|ConferenceParticipant|ConferenceParticipantShape
 * }
 */
final class ConferenceUpdateParticipantResponse implements BaseModel
{
    /** @use SdkModel<ConferenceUpdateParticipantResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ConferenceParticipant $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceParticipant|ConferenceParticipantShape|null $data
     */
    public static function with(ConferenceParticipant|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceParticipant|ConferenceParticipantShape $data
     */
    public function withData(ConferenceParticipant|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
