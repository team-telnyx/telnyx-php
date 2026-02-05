<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallConversationInsightsGeneratedShape from \Telnyx\Webhooks\CallConversationInsightsGenerated
 *
 * @phpstan-type CallConversationInsightsGeneratedWebhookEventShape = array{
 *   data?: null|CallConversationInsightsGenerated|CallConversationInsightsGeneratedShape,
 * }
 */
final class CallConversationInsightsGeneratedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallConversationInsightsGeneratedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallConversationInsightsGenerated $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallConversationInsightsGenerated|CallConversationInsightsGeneratedShape|null $data
     */
    public static function with(
        CallConversationInsightsGenerated|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallConversationInsightsGenerated|CallConversationInsightsGeneratedShape $data
     */
    public function withData(
        CallConversationInsightsGenerated|array $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
