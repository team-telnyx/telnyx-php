<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data\Payload\Result1\Result;

/**
 * @phpstan-type Result1Shape = array{
 *   insight_id?: string|null, result?: string|null|array<string,mixed>
 * }
 */
final class Result1 implements BaseModel
{
    /** @use SdkModel<Result1Shape> */
    use SdkModel;

    /**
     * ID that is unique to the insight result being generated for the call.
     */
    #[Api(optional: true)]
    public ?string $insight_id;

    /**
     * The result of the insight.
     *
     * @var string|array<string,mixed>|null $result
     */
    #[Api(union: Result::class, optional: true)]
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
        ?string $insight_id = null,
        string|array|null $result = null
    ): self {
        $obj = new self;

        null !== $insight_id && $obj->insight_id = $insight_id;
        null !== $result && $obj->result = $result;

        return $obj;
    }

    /**
     * ID that is unique to the insight result being generated for the call.
     */
    public function withInsightID(string $insightID): self
    {
        $obj = clone $this;
        $obj->insight_id = $insightID;

        return $obj;
    }

    /**
     * The result of the insight.
     *
     * @param string|array<string,mixed> $result
     */
    public function withResult(string|array $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }
}
