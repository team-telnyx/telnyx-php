<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TranscriptionShape from \Telnyx\Webhooks\Transcription
 *
 * @phpstan-type TranscriptionWebhookEventShape = array{
 *   data?: null|Transcription|TranscriptionShape
 * }
 */
final class TranscriptionWebhookEvent implements BaseModel
{
    /** @use SdkModel<TranscriptionWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?Transcription $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Transcription|TranscriptionShape|null $data
     */
    public static function with(Transcription|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Transcription|TranscriptionShape $data
     */
    public function withData(Transcription|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
