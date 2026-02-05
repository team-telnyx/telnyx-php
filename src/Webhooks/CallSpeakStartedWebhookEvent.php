<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallSpeakStartedShape from \Telnyx\Webhooks\CallSpeakStarted
 *
 * @phpstan-type CallSpeakStartedWebhookEventShape = array{
 *   data?: null|CallSpeakStarted|CallSpeakStartedShape
 * }
 */
final class CallSpeakStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallSpeakStartedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallSpeakStarted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallSpeakStarted|CallSpeakStartedShape|null $data
     */
    public static function with(CallSpeakStarted|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallSpeakStarted|CallSpeakStartedShape $data
     */
    public function withData(CallSpeakStarted|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
