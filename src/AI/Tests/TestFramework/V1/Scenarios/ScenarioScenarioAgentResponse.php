<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type ScenarioScenarioAgentResponseShape = array{
 *   progressID: string, sessionID?: int|null
 * }
 */
final class ScenarioScenarioAgentResponse implements BaseModel
{
    /** @use SdkModel<ScenarioScenarioAgentResponseShape> */
    use SdkModel;

    #[Required('progress_id')]
    public string $progressID;

    #[Optional('session_id', nullable: true)]
    public ?int $sessionID;

    /**
     * `new ScenarioScenarioAgentResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScenarioScenarioAgentResponse::with(progressID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScenarioScenarioAgentResponse)->withProgressID(...)
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
    public static function with(
        string $progressID,
        int|Omitted|null $sessionID = Omitted::VALUE
    ): self {
        $self = new self;

        $self['progressID'] = $progressID;

        Omitted::VALUE !== $sessionID && $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withProgressID(string $progressID): self
    {
        $self = clone $this;
        $self['progressID'] = $progressID;

        return $self;
    }

    public function withSessionID(?int $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }
}
