<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data\Payload\Result1\Result;

/**
 * @phpstan-type Result1Shape = array{
 *   insightID?: string|null, result?: mixed|string|null
 * }
 */
final class Result1 implements BaseModel
{
    /** @use SdkModel<Result1Shape> */
    use SdkModel;

    /**
     * ID that is unique to the insight result being generated for the call.
     */
    #[Optional('insight_id')]
    public ?string $insightID;

    /**
     * The result of the insight.
     *
     * @var mixed|string|null $result
     */
    #[Optional(union: Result::class)]
    public mixed $result;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param mixed|string $result
     */
    public static function with(
        ?string $insightID = null,
        mixed $result = null
    ): self {
        $obj = new self;

        null !== $insightID && $obj['insightID'] = $insightID;
        null !== $result && $obj['result'] = $result;

        return $obj;
    }

    /**
     * ID that is unique to the insight result being generated for the call.
     */
    public function withInsightID(string $insightID): self
    {
        $obj = clone $this;
        $obj['insightID'] = $insightID;

        return $obj;
    }

    /**
     * The result of the insight.
     *
     * @param mixed|string $result
     */
    public function withResult(mixed $result): self
    {
        $obj = clone $this;
        $obj['result'] = $result;

        return $obj;
    }
}
