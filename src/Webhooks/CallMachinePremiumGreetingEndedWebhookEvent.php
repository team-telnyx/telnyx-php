<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallMachinePremiumGreetingEndedShape from \Telnyx\Webhooks\CallMachinePremiumGreetingEnded
 *
 * @phpstan-type CallMachinePremiumGreetingEndedWebhookEventShape = array{
 *   data?: null|CallMachinePremiumGreetingEnded|CallMachinePremiumGreetingEndedShape,
 * }
 */
final class CallMachinePremiumGreetingEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallMachinePremiumGreetingEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallMachinePremiumGreetingEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallMachinePremiumGreetingEnded|CallMachinePremiumGreetingEndedShape|null $data
     */
    public static function with(
        CallMachinePremiumGreetingEnded|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallMachinePremiumGreetingEnded|CallMachinePremiumGreetingEndedShape $data
     */
    public function withData(CallMachinePremiumGreetingEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
