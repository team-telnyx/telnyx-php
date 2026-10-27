<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse\Result;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ClarificationQuestionShape = array{question?: string|null}
 */
final class ClarificationQuestion implements BaseModel
{
    /** @use SdkModel<ClarificationQuestionShape> */
    use SdkModel;

    #[Optional]
    public ?string $question;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $question = null): self
    {
        $self = new self;

        null !== $question && $self['question'] = $question;

        return $self;
    }

    public function withQuestion(string $question): self
    {
        $self = clone $this;
        $self['question'] = $question;

        return $self;
    }
}
