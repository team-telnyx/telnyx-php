<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Metrics;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the status of a background metric-generation job started with the generate-test-metrics endpoint.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\MetricsService::retrieveGenerateMetricsProgress()
 *
 * @phpstan-type MetricRetrieveGenerateMetricsProgressParamsShape = array{
 *   progressID: string
 * }
 */
final class MetricRetrieveGenerateMetricsProgressParams implements BaseModel
{
    /** @use SdkModel<MetricRetrieveGenerateMetricsProgressParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Progress ID returned by the generate-test-metrics endpoint.
     */
    #[Required]
    public string $progressID;

    /**
     * `new MetricRetrieveGenerateMetricsProgressParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MetricRetrieveGenerateMetricsProgressParams::with(progressID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MetricRetrieveGenerateMetricsProgressParams)->withProgressID(...)
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
     */
    public static function with(string $progressID): self
    {
        $self = new self;

        $self['progressID'] = $progressID;

        return $self;
    }

    /**
     * Progress ID returned by the generate-test-metrics endpoint.
     */
    public function withProgressID(string $progressID): self
    {
        $self = clone $this;
        $self['progressID'] = $progressID;

        return $self;
    }
}
