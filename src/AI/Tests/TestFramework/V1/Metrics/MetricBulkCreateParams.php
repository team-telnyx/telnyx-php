<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Metrics;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates several metrics in one request. Accepts an array of metric objects and returns the created metrics.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\MetricsService::bulkCreate()
 *
 * @phpstan-import-type CreateAITestMetricRequestShape from \Telnyx\AI\Tests\TestFramework\V1\Metrics\CreateAITestMetricRequest
 *
 * @phpstan-type MetricBulkCreateParamsShape = array{
 *   body: list<CreateAITestMetricRequest|CreateAITestMetricRequestShape>
 * }
 */
final class MetricBulkCreateParams implements BaseModel
{
    /** @use SdkModel<MetricBulkCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<CreateAITestMetricRequest> $body */
    #[Required(list: CreateAITestMetricRequest::class)]
    public array $body;

    /**
     * `new MetricBulkCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MetricBulkCreateParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MetricBulkCreateParams)->withBody(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CreateAITestMetricRequest|CreateAITestMetricRequestShape> $body
     */
    public static function with(array $body): self
    {
        $self = new self;

        $self['body'] = $body;

        return $self;
    }

    /**
     * @param list<CreateAITestMetricRequest|CreateAITestMetricRequestShape> $body
     */
    public function withBody(array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
