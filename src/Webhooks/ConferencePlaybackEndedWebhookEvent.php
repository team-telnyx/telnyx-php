<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferencePlaybackEndedShape from \Telnyx\Webhooks\ConferencePlaybackEnded
 *
 * @phpstan-type ConferencePlaybackEndedWebhookEventShape = array{
 *   data?: null|ConferencePlaybackEnded|ConferencePlaybackEndedShape
 * }
 */
final class ConferencePlaybackEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ConferencePlaybackEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ConferencePlaybackEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferencePlaybackEnded|ConferencePlaybackEndedShape|null $data
     */
    public static function with(
        ConferencePlaybackEnded|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferencePlaybackEnded|ConferencePlaybackEndedShape $data
     */
    public function withData(ConferencePlaybackEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
