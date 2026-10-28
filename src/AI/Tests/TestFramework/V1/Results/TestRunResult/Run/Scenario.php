<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\Run;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ScenarioShape = array{
 *   id?: int|null,
 *   expectedOutcomePrompt?: string|null,
 *   name?: string|null,
 *   personalityName?: string|null,
 * }
 */
final class Scenario implements BaseModel
{
    /** @use SdkModel<ScenarioShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional('expected_outcome_prompt')]
    public ?string $expectedOutcomePrompt;

    #[Optional]
    public ?string $name;

    #[Optional('personality_name')]
    public ?string $personalityName;

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
        ?int $id = null,
        ?string $expectedOutcomePrompt = null,
        ?string $name = null,
        ?string $personalityName = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $expectedOutcomePrompt && $self['expectedOutcomePrompt'] = $expectedOutcomePrompt;
        null !== $name && $self['name'] = $name;
        null !== $personalityName && $self['personalityName'] = $personalityName;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withExpectedOutcomePrompt(
        string $expectedOutcomePrompt
    ): self {
        $self = clone $this;
        $self['expectedOutcomePrompt'] = $expectedOutcomePrompt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPersonalityName(string $personalityName): self
    {
        $self = clone $this;
        $self['personalityName'] = $personalityName;

        return $self;
    }
}
