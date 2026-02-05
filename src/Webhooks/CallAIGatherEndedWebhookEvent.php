<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallAIGatherEndedShape from \Telnyx\Webhooks\CallAIGatherEnded
 *
 * @phpstan-type CallAIGatherEndedWebhookEventShape = array{
 *   data?: null|CallAIGatherEnded|CallAIGatherEndedShape
 * }
 */
final class CallAIGatherEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallAIGatherEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallAIGatherEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallAIGatherEnded|CallAIGatherEndedShape|null $data
     */
    public static function with(CallAIGatherEnded|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallAIGatherEnded|CallAIGatherEndedShape $data
     */
    public function withData(CallAIGatherEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
