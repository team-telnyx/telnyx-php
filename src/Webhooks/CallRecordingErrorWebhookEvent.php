<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallRecordingErrorShape from \Telnyx\Webhooks\CallRecordingError
 *
 * @phpstan-type CallRecordingErrorWebhookEventShape = array{
 *   data?: null|CallRecordingError|CallRecordingErrorShape
 * }
 */
final class CallRecordingErrorWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallRecordingErrorWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallRecordingError $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallRecordingError|CallRecordingErrorShape|null $data
     */
    public static function with(CallRecordingError|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallRecordingError|CallRecordingErrorShape $data
     */
    public function withData(CallRecordingError|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
