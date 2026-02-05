<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceRecordingSavedShape from \Telnyx\Webhooks\ConferenceRecordingSaved
 *
 * @phpstan-type ConferenceRecordingSavedWebhookEventShape = array{
 *   data?: null|ConferenceRecordingSaved|ConferenceRecordingSavedShape
 * }
 */
final class ConferenceRecordingSavedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ConferenceRecordingSavedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?ConferenceRecordingSaved $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceRecordingSaved|ConferenceRecordingSavedShape|null $data
     */
    public static function with(
        ConferenceRecordingSaved|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceRecordingSaved|ConferenceRecordingSavedShape $data
     */
    public function withData(ConferenceRecordingSaved|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
