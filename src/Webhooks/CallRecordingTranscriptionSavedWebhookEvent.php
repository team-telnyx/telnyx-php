<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallRecordingTranscriptionSavedShape from \Telnyx\Webhooks\CallRecordingTranscriptionSaved
 *
 * @phpstan-type CallRecordingTranscriptionSavedWebhookEventShape = array{
 *   data?: null|CallRecordingTranscriptionSaved|CallRecordingTranscriptionSavedShape,
 * }
 */
final class CallRecordingTranscriptionSavedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallRecordingTranscriptionSavedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallRecordingTranscriptionSaved $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallRecordingTranscriptionSaved|CallRecordingTranscriptionSavedShape|null $data
     */
    public static function with(
        CallRecordingTranscriptionSaved|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallRecordingTranscriptionSaved|CallRecordingTranscriptionSavedShape $data
     */
    public function withData(CallRecordingTranscriptionSaved|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
