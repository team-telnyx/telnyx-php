<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRetrieveExportScenariosParams\ExportType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Exports the selected evaluator scenarios as a CSV or XLSX file download.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\ScenariosService::retrieveExportScenarios()
 *
 * @phpstan-type ScenarioRetrieveExportScenariosParamsShape = array{
 *   exportType: ExportType|value-of<ExportType>,
 *   scenarioIDs: string,
 *   agentID?: int|null,
 * }
 */
final class ScenarioRetrieveExportScenariosParams implements BaseModel
{
    /** @use SdkModel<ScenarioRetrieveExportScenariosParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * File format of the export.
     *
     * @var value-of<ExportType> $exportType
     */
    #[Required(enum: ExportType::class)]
    public string $exportType;

    /**
     * Comma-separated scenario IDs to export.
     */
    #[Required]
    public string $scenarioIDs;

    /**
     * Export scenarios belonging to the specified test agent.
     */
    #[Optional]
    public ?int $agentID;

    /**
     * `new ScenarioRetrieveExportScenariosParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScenarioRetrieveExportScenariosParams::with(exportType: ..., scenarioIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScenarioRetrieveExportScenariosParams)
     *   ->withExportType(...)
     *   ->withScenarioIDs(...)
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
     * @param ExportType|value-of<ExportType> $exportType
     */
    public static function with(
        ExportType|string $exportType,
        string $scenarioIDs,
        ?int $agentID = null
    ): self {
        $self = new self;

        $self['exportType'] = $exportType;
        $self['scenarioIDs'] = $scenarioIDs;

        null !== $agentID && $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * File format of the export.
     *
     * @param ExportType|value-of<ExportType> $exportType
     */
    public function withExportType(ExportType|string $exportType): self
    {
        $self = clone $this;
        $self['exportType'] = $exportType;

        return $self;
    }

    /**
     * Comma-separated scenario IDs to export.
     */
    public function withScenarioIDs(string $scenarioIDs): self
    {
        $self = clone $this;
        $self['scenarioIDs'] = $scenarioIDs;

        return $self;
    }

    /**
     * Export scenarios belonging to the specified test agent.
     */
    public function withAgentID(int $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }
}
