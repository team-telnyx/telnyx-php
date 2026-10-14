<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationStartFailedWebhookEvent\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Webhooks\CallConversationStartFailedWebhookEvent\Data
 *
 * @phpstan-type CallConversationStartFailedWebhookEventShape = array{
 *   data?: null|Data|DataShape
 * }
 */
final class CallConversationStartFailedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallConversationStartFailedWebhookEventShape> */
    use SdkModel;

    /**
     * The AI assistant requested for the call could not be started, so no conversation was created. No `call.conversation.created` or `call.conversation.ended` is sent for this attempt.
     */
    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|DataShape|null $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * The AI assistant requested for the call could not be started, so no conversation was created. No `call.conversation.created` or `call.conversation.ended` is sent for this attempt.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
