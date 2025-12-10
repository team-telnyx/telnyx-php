<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data\Payload\Result1\Result;

/**
 * @phpstan-type Result1Shape = array{
 *   insightID?: string|null, result?: string|null|array<string,mixed>
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
     * @var string|array<string,mixed>|null $result
     */
    #[Optional(union: Result::class)]
    public string|array|null $result;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param string|array<string,mixed> $result
     */
    public static function with(
        ?string $insightID = null,
        string|array|null $result = null
    ): self {
        $self = new self;

        null !== $insightID && $self['insightID'] = $insightID;
        null !== $result && $self['result'] = $result;

        return $self;
    }

    /**
     * ID that is unique to the insight result being generated for the call.
     */
    public function withInsightID(string $insightID): self
    {
        $self = clone $this;
        $self['insightID'] = $insightID;

        return $self;
    }

    /**
     * The result of the insight.
     *
     * @param string|array<string,mixed> $result
     */
    public function withResult(string|array $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }
}
