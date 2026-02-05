<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallReferStartedShape from \Telnyx\Webhooks\CallReferStarted
 *
 * @phpstan-type CallReferStartedWebhookEventShape = array{
 *   data?: null|CallReferStarted|CallReferStartedShape
 * }
 */
final class CallReferStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallReferStartedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallReferStarted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallReferStarted|CallReferStartedShape|null $data
     */
    public static function with(CallReferStarted|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallReferStarted|CallReferStartedShape $data
     */
    public function withData(CallReferStarted|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
