<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallMachinePremiumDetectionEndedShape from \Telnyx\Webhooks\CallMachinePremiumDetectionEnded
 *
 * @phpstan-type CallMachinePremiumDetectionEndedWebhookEventShape = array{
 *   data?: null|CallMachinePremiumDetectionEnded|CallMachinePremiumDetectionEndedShape,
 * }
 */
final class CallMachinePremiumDetectionEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallMachinePremiumDetectionEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallMachinePremiumDetectionEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallMachinePremiumDetectionEnded|CallMachinePremiumDetectionEndedShape|null $data
     */
    public static function with(
        CallMachinePremiumDetectionEnded|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallMachinePremiumDetectionEnded|CallMachinePremiumDetectionEndedShape $data
     */
    public function withData(CallMachinePremiumDetectionEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
