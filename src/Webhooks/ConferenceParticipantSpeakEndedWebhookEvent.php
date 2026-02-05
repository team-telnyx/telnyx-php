<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceParticipantSpeakEndedShape from \Telnyx\Webhooks\ConferenceParticipantSpeakEnded
 *
 * @phpstan-type ConferenceParticipantSpeakEndedWebhookEventShape = array{
 *   data?: null|ConferenceParticipantSpeakEnded|ConferenceParticipantSpeakEndedShape,
 * }
 */
final class ConferenceParticipantSpeakEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ConferenceParticipantSpeakEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ConferenceParticipantSpeakEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceParticipantSpeakEnded|ConferenceParticipantSpeakEndedShape|null $data
     */
    public static function with(
        ConferenceParticipantSpeakEnded|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceParticipantSpeakEnded|ConferenceParticipantSpeakEndedShape $data
     */
    public function withData(ConferenceParticipantSpeakEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
