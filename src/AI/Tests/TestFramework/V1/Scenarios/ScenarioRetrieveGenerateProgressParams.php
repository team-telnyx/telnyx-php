<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the status of a background scenario-generation job started with the generate-evaluator-scenarios endpoint.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\ScenariosService::retrieveGenerateProgress()
 *
 * @phpstan-type ScenarioRetrieveGenerateProgressParamsShape = array{
 *   progressID: string
 * }
 */
final class ScenarioRetrieveGenerateProgressParams implements BaseModel
{
    /** @use SdkModel<ScenarioRetrieveGenerateProgressParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Progress ID returned by the generate-evaluator-scenarios endpoint.
     */
    #[Required]
    public string $progressID;

    /**
     * `new ScenarioRetrieveGenerateProgressParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScenarioRetrieveGenerateProgressParams::with(progressID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScenarioRetrieveGenerateProgressParams)->withProgressID(...)
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
     * Progress ID returned by the generate-evaluator-scenarios endpoint.
     */
    public function withProgressID(string $progressID): self
    {
        $self = clone $this;
        $self['progressID'] = $progressID;

        return $self;
    }
}
