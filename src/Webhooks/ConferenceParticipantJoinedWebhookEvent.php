<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceParticipantJoinedShape from \Telnyx\Webhooks\ConferenceParticipantJoined
 *
 * @phpstan-type ConferenceParticipantJoinedWebhookEventShape = array{
 *   data?: null|ConferenceParticipantJoined|ConferenceParticipantJoinedShape
 * }
 */
final class ConferenceParticipantJoinedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ConferenceParticipantJoinedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ConferenceParticipantJoined $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceParticipantJoined|ConferenceParticipantJoinedShape|null $data
     */
    public static function with(
        ConferenceParticipantJoined|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceParticipantJoined|ConferenceParticipantJoinedShape $data
     */
    public function withData(ConferenceParticipantJoined|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
