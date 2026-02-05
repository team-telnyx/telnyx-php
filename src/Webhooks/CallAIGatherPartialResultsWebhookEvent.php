<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallAIGatherPartialResultsShape from \Telnyx\Webhooks\CallAIGatherPartialResults
 *
 * @phpstan-type CallAIGatherPartialResultsWebhookEventShape = array{
 *   data?: null|CallAIGatherPartialResults|CallAIGatherPartialResultsShape
 * }
 */
final class CallAIGatherPartialResultsWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallAIGatherPartialResultsWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallAIGatherPartialResults $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallAIGatherPartialResults|CallAIGatherPartialResultsShape|null $data
     */
    public static function with(
        CallAIGatherPartialResults|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallAIGatherPartialResults|CallAIGatherPartialResultsShape $data
     */
    public function withData(CallAIGatherPartialResults|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
