<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceSpeakEndedShape from \Telnyx\Webhooks\ConferenceSpeakEnded
 *
 * @phpstan-type ConferenceSpeakEndedWebhookEventShape = array{
 *   data?: null|ConferenceSpeakEnded|ConferenceSpeakEndedShape
 * }
 */
final class ConferenceSpeakEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ConferenceSpeakEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ConferenceSpeakEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceSpeakEnded|ConferenceSpeakEndedShape|null $data
     */
    public static function with(ConferenceSpeakEnded|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceSpeakEnded|ConferenceSpeakEndedShape $data
     */
    public function withData(ConferenceSpeakEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
