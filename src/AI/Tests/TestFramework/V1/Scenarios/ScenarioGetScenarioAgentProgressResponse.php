<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse\Result;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-import-type ResultShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse\Result
 *
 * @phpstan-type ScenarioGetScenarioAgentProgressResponseShape = array{
 *   error?: string|null,
 *   mode?: string|null,
 *   progressID?: string|null,
 *   result?: null|Result|ResultShape,
 *   sessionID?: int|null,
 *   status?: string|null,
 * }
 */
final class ScenarioGetScenarioAgentProgressResponse implements BaseModel
{
    /** @use SdkModel<ScenarioGetScenarioAgentProgressResponseShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $error;

    #[Optional]
    public ?string $mode;

    #[Optional('progress_id')]
    public ?string $progressID;

    #[Optional(nullable: true)]
    public ?Result $result;

    #[Optional('session_id', nullable: true)]
    public ?int $sessionID;

    #[Optional]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Omitted|Result|ResultShape|null $result
     */
    public static function with(
        string|Omitted|null $error = Omitted::VALUE,
        Omitted|Result|array|null $result = Omitted::VALUE,
        int|Omitted|null $sessionID = Omitted::VALUE,
        ?string $mode = null,
        ?string $progressID = null,
        ?string $status = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $error && $self['error'] = $error;
        null !== $mode && $self['mode'] = $mode;
        null !== $progressID && $self['progressID'] = $progressID;
        Omitted::VALUE !== $result && $self['result'] = $result;
        Omitted::VALUE !== $sessionID && $self['sessionID'] = $sessionID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withError(?string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    public function withMode(string $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }

    public function withProgressID(string $progressID): self
    {
        $self = clone $this;
        $self['progressID'] = $progressID;

        return $self;
    }

    /**
     * @param Result|ResultShape|null $result
     */
    public function withResult(Result|array|null $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }

    public function withSessionID(?int $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
