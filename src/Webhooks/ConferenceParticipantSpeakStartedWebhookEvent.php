<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceParticipantSpeakStartedShape from \Telnyx\Webhooks\ConferenceParticipantSpeakStarted
 *
 * @phpstan-type ConferenceParticipantSpeakStartedWebhookEventShape = array{
 *   data?: null|ConferenceParticipantSpeakStarted|ConferenceParticipantSpeakStartedShape,
 * }
 */
final class ConferenceParticipantSpeakStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ConferenceParticipantSpeakStartedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ConferenceParticipantSpeakStarted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceParticipantSpeakStarted|ConferenceParticipantSpeakStartedShape|null $data
     */
    public static function with(
        ConferenceParticipantSpeakStarted|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceParticipantSpeakStarted|ConferenceParticipantSpeakStartedShape $data
     */
    public function withData(
        ConferenceParticipantSpeakStarted|array $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
