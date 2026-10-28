<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Metrics\MetricGetGenerateMetricsProgressResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetricShape = array{
 *   agent?: int|null,
 *   description?: string|null,
 *   evalType?: string|null,
 *   name?: string|null,
 *   scenarios?: list<int>|null,
 * }
 */
final class Metric implements BaseModel
{
    /** @use SdkModel<MetricShape> */
    use SdkModel;

    #[Optional]
    public ?int $agent;

    #[Optional]
    public ?string $description;

    #[Optional('eval_type')]
    public ?string $evalType;

    #[Optional]
    public ?string $name;

    /** @var list<int>|null $scenarios */
    #[Optional(list: 'int')]
    public ?array $scenarios;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $scenarios
     */
    public static function with(
        ?int $agent = null,
        ?string $description = null,
        ?string $evalType = null,
        ?string $name = null,
        ?array $scenarios = null,
    ): self {
        $self = new self;

        null !== $agent && $self['agent'] = $agent;
        null !== $description && $self['description'] = $description;
        null !== $evalType && $self['evalType'] = $evalType;
        null !== $name && $self['name'] = $name;
        null !== $scenarios && $self['scenarios'] = $scenarios;

        return $self;
    }

    public function withAgent(int $agent): self
    {
        $self = clone $this;
        $self['agent'] = $agent;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withEvalType(string $evalType): self
    {
        $self = clone $this;
        $self['evalType'] = $evalType;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<int> $scenarios
     */
    public function withScenarios(array $scenarios): self
    {
        $self = clone $this;
        $self['scenarios'] = $scenarios;

        return $self;
    }
}
