<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallForkStartedShape from \Telnyx\Webhooks\CallForkStarted
 *
 * @phpstan-type CallForkStartedWebhookEventShape = array{
 *   data?: null|CallForkStarted|CallForkStartedShape
 * }
 */
final class CallForkStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallForkStartedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallForkStarted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallForkStarted|CallForkStartedShape|null $data
     */
    public static function with(CallForkStarted|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallForkStarted|CallForkStartedShape $data
     */
    public function withData(CallForkStarted|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
