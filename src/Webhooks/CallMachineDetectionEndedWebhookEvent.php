<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallMachineDetectionEndedShape from \Telnyx\Webhooks\CallMachineDetectionEnded
 *
 * @phpstan-type CallMachineDetectionEndedWebhookEventShape = array{
 *   data?: null|CallMachineDetectionEnded|CallMachineDetectionEndedShape
 * }
 */
final class CallMachineDetectionEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallMachineDetectionEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallMachineDetectionEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallMachineDetectionEnded|CallMachineDetectionEndedShape|null $data
     */
    public static function with(
        CallMachineDetectionEnded|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallMachineDetectionEnded|CallMachineDetectionEndedShape $data
     */
    public function withData(CallMachineDetectionEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
