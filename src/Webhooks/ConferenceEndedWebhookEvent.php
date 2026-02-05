<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceEndedShape from \Telnyx\Webhooks\ConferenceEnded
 *
 * @phpstan-type ConferenceEndedWebhookEventShape = array{
 *   data?: null|ConferenceEnded|ConferenceEndedShape
 * }
 */
final class ConferenceEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ConferenceEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ConferenceEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceEnded|ConferenceEndedShape|null $data
     */
    public static function with(ConferenceEnded|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceEnded|ConferenceEndedShape $data
     */
    public function withData(ConferenceEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
