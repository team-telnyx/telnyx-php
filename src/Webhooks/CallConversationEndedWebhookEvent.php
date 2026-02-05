<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallConversationEndedShape from \Telnyx\Webhooks\CallConversationEnded
 *
 * @phpstan-type CallConversationEndedWebhookEventShape = array{
 *   data?: null|CallConversationEnded|CallConversationEndedShape
 * }
 */
final class CallConversationEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallConversationEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallConversationEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallConversationEnded|CallConversationEndedShape|null $data
     */
    public static function with(CallConversationEnded|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallConversationEnded|CallConversationEndedShape $data
     */
    public function withData(CallConversationEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
