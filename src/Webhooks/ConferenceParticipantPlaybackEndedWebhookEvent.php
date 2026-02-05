<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceParticipantPlaybackEndedShape from \Telnyx\Webhooks\ConferenceParticipantPlaybackEnded
 *
 * @phpstan-type ConferenceParticipantPlaybackEndedWebhookEventShape = array{
 *   data?: null|ConferenceParticipantPlaybackEnded|ConferenceParticipantPlaybackEndedShape,
 * }
 */
final class ConferenceParticipantPlaybackEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ConferenceParticipantPlaybackEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ConferenceParticipantPlaybackEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceParticipantPlaybackEnded|ConferenceParticipantPlaybackEndedShape|null $data
     */
    public static function with(
        ConferenceParticipantPlaybackEnded|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceParticipantPlaybackEnded|ConferenceParticipantPlaybackEndedShape $data
     */
    public function withData(
        ConferenceParticipantPlaybackEnded|array $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
