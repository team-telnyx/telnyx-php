<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferencePlaybackStartedShape from \Telnyx\Webhooks\ConferencePlaybackStarted
 *
 * @phpstan-type ConferencePlaybackStartedWebhookEventShape = array{
 *   data?: null|ConferencePlaybackStarted|ConferencePlaybackStartedShape
 * }
 */
final class ConferencePlaybackStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ConferencePlaybackStartedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ConferencePlaybackStarted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferencePlaybackStarted|ConferencePlaybackStartedShape|null $data
     */
    public static function with(
        ConferencePlaybackStarted|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferencePlaybackStarted|ConferencePlaybackStartedShape $data
     */
    public function withData(ConferencePlaybackStarted|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
