<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceSpeakStartedShape from \Telnyx\Webhooks\ConferenceSpeakStarted
 *
 * @phpstan-type ConferenceSpeakStartedWebhookEventShape = array{
 *   data?: null|ConferenceSpeakStarted|ConferenceSpeakStartedShape
 * }
 */
final class ConferenceSpeakStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ConferenceSpeakStartedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ConferenceSpeakStarted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceSpeakStarted|ConferenceSpeakStartedShape|null $data
     */
    public static function with(ConferenceSpeakStarted|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceSpeakStarted|ConferenceSpeakStartedShape $data
     */
    public function withData(ConferenceSpeakStarted|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
