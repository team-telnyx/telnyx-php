<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallSpeakEndedShape from \Telnyx\Webhooks\CallSpeakEnded
 *
 * @phpstan-type CallSpeakEndedWebhookEventShape = array{
 *   data?: null|CallSpeakEnded|CallSpeakEndedShape
 * }
 */
final class CallSpeakEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallSpeakEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallSpeakEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallSpeakEnded|CallSpeakEndedShape|null $data
     */
    public static function with(CallSpeakEnded|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallSpeakEnded|CallSpeakEndedShape $data
     */
    public function withData(CallSpeakEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
