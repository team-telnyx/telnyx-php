<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallSiprecStartedShape from \Telnyx\Webhooks\CallSiprecStarted
 *
 * @phpstan-type CallSiprecStartedWebhookEventShape = array{
 *   data?: null|CallSiprecStarted|CallSiprecStartedShape
 * }
 */
final class CallSiprecStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallSiprecStartedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallSiprecStarted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallSiprecStarted|CallSiprecStartedShape|null $data
     */
    public static function with(CallSiprecStarted|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallSiprecStarted|CallSiprecStartedShape $data
     */
    public function withData(CallSiprecStarted|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
