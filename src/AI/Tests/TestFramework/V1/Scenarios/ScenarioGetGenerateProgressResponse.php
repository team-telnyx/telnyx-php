<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;

/**
 * @phpstan-type ScenarioGetGenerateProgressResponseShape = array{
 *   completedScenarios?: int|null,
 *   failedScenarios?: int|null,
 *   scenariosList?: list<array<string,mixed>>|null,
 *   totalScenarios?: int|null,
 * }
 */
final class ScenarioGetGenerateProgressResponse implements BaseModel
{
    /** @use SdkModel<ScenarioGetGenerateProgressResponseShape> */
    use SdkModel;

    #[Optional('completed_scenarios')]
    public ?int $completedScenarios;

    #[Optional('failed_scenarios')]
    public ?int $failedScenarios;

    /** @var list<array<string,mixed>>|null $scenariosList */
    #[Optional('scenarios_list', list: new MapOf('mixed'))]
    public ?array $scenariosList;

    #[Optional('total_scenarios')]
    public ?int $totalScenarios;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<array<string,mixed>>|null $scenariosList
     */
    public static function with(
        ?int $completedScenarios = null,
        ?int $failedScenarios = null,
        ?array $scenariosList = null,
        ?int $totalScenarios = null,
    ): self {
        $self = new self;

        null !== $completedScenarios && $self['completedScenarios'] = $completedScenarios;
        null !== $failedScenarios && $self['failedScenarios'] = $failedScenarios;
        null !== $scenariosList && $self['scenariosList'] = $scenariosList;
        null !== $totalScenarios && $self['totalScenarios'] = $totalScenarios;

        return $self;
    }

    public function withCompletedScenarios(int $completedScenarios): self
    {
        $self = clone $this;
        $self['completedScenarios'] = $completedScenarios;

        return $self;
    }

    public function withFailedScenarios(int $failedScenarios): self
    {
        $self = clone $this;
        $self['failedScenarios'] = $failedScenarios;

        return $self;
    }

    /**
     * @param list<array<string,mixed>> $scenariosList
     */
    public function withScenariosList(array $scenariosList): self
    {
        $self = clone $this;
        $self['scenariosList'] = $scenariosList;

        return $self;
    }

    public function withTotalScenarios(int $totalScenarios): self
    {
        $self = clone $this;
        $self['totalScenarios'] = $totalScenarios;

        return $self;
    }
}
