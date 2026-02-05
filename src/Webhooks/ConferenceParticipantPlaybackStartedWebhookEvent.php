<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceParticipantPlaybackStartedShape from \Telnyx\Webhooks\ConferenceParticipantPlaybackStarted
 *
 * @phpstan-type ConferenceParticipantPlaybackStartedWebhookEventShape = array{
 *   data?: null|ConferenceParticipantPlaybackStarted|ConferenceParticipantPlaybackStartedShape,
 * }
 */
final class ConferenceParticipantPlaybackStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ConferenceParticipantPlaybackStartedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ConferenceParticipantPlaybackStarted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceParticipantPlaybackStarted|ConferenceParticipantPlaybackStartedShape|null $data
     */
    public static function with(
        ConferenceParticipantPlaybackStarted|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceParticipantPlaybackStarted|ConferenceParticipantPlaybackStartedShape $data
     */
    public function withData(
        ConferenceParticipantPlaybackStarted|array $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
