<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallMachineGreetingEndedShape from \Telnyx\Webhooks\CallMachineGreetingEnded
 *
 * @phpstan-type CallMachineGreetingEndedWebhookEventShape = array{
 *   data?: null|CallMachineGreetingEnded|CallMachineGreetingEndedShape
 * }
 */
final class CallMachineGreetingEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallMachineGreetingEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallMachineGreetingEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallMachineGreetingEnded|CallMachineGreetingEndedShape|null $data
     */
    public static function with(
        CallMachineGreetingEnded|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallMachineGreetingEnded|CallMachineGreetingEndedShape $data
     */
    public function withData(CallMachineGreetingEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
