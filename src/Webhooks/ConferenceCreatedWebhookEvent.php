<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceCreatedShape from \Telnyx\Webhooks\ConferenceCreated
 *
 * @phpstan-type ConferenceCreatedWebhookEventShape = array{
 *   data?: null|ConferenceCreated|ConferenceCreatedShape
 * }
 */
final class ConferenceCreatedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ConferenceCreatedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ConferenceCreated $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceCreated|ConferenceCreatedShape|null $data
     */
    public static function with(ConferenceCreated|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceCreated|ConferenceCreatedShape $data
     */
    public function withData(ConferenceCreated|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
