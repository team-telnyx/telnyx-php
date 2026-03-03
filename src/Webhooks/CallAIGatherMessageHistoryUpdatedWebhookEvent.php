<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallAIGatherMessageHistoryUpdatedShape from \Telnyx\Webhooks\CallAIGatherMessageHistoryUpdated
 *
 * @phpstan-type CallAIGatherMessageHistoryUpdatedWebhookEventShape = array{
 *   data?: null|CallAIGatherMessageHistoryUpdated|CallAIGatherMessageHistoryUpdatedShape,
 * }
 */
final class CallAIGatherMessageHistoryUpdatedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallAIGatherMessageHistoryUpdatedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallAIGatherMessageHistoryUpdated $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallAIGatherMessageHistoryUpdated|CallAIGatherMessageHistoryUpdatedShape|null $data
     */
    public static function with(
        CallAIGatherMessageHistoryUpdated|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallAIGatherMessageHistoryUpdated|CallAIGatherMessageHistoryUpdatedShape $data
     */
    public function withData(
        CallAIGatherMessageHistoryUpdated|array $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
