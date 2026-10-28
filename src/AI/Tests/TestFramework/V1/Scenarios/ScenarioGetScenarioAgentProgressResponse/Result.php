<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse;

use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse\Result\ClarificationQuestion;
use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse\Result\ConversationHistory;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;

/**
 * @phpstan-import-type ClarificationQuestionShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse\Result\ClarificationQuestion
 * @phpstan-import-type ConversationHistoryShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGetScenarioAgentProgressResponse\Result\ConversationHistory
 *
 * @phpstan-type ResultShape = array{
 *   cancelled?: bool|null,
 *   clarificationQuestions?: list<ClarificationQuestion|ClarificationQuestionShape>|null,
 *   conversationHistory?: list<ConversationHistory|ConversationHistoryShape>|null,
 *   message?: string|null,
 *   needsClarification?: bool|null,
 *   sessionID?: int|null,
 *   success?: bool|null,
 *   updatedScenarios?: list<array<string,mixed>>|null,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    #[Optional]
    public ?bool $cancelled;

    /** @var list<ClarificationQuestion>|null $clarificationQuestions */
    #[Optional('clarification_questions', list: ClarificationQuestion::class)]
    public ?array $clarificationQuestions;

    /** @var list<ConversationHistory>|null $conversationHistory */
    #[Optional('conversation_history', list: ConversationHistory::class)]
    public ?array $conversationHistory;

    #[Optional]
    public ?string $message;

    #[Optional('needs_clarification')]
    public ?bool $needsClarification;

    #[Optional('session_id')]
    public ?int $sessionID;

    #[Optional]
    public ?bool $success;

    /** @var list<array<string,mixed>>|null $updatedScenarios */
    #[Optional('updated_scenarios', list: new MapOf('mixed'))]
    public ?array $updatedScenarios;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ClarificationQuestion|ClarificationQuestionShape>|null $clarificationQuestions
     * @param list<ConversationHistory|ConversationHistoryShape>|null $conversationHistory
     * @param list<array<string,mixed>>|null $updatedScenarios
     */
    public static function with(
        ?bool $cancelled = null,
        ?array $clarificationQuestions = null,
        ?array $conversationHistory = null,
        ?string $message = null,
        ?bool $needsClarification = null,
        ?int $sessionID = null,
        ?bool $success = null,
        ?array $updatedScenarios = null,
    ): self {
        $self = new self;

        null !== $cancelled && $self['cancelled'] = $cancelled;
        null !== $clarificationQuestions && $self['clarificationQuestions'] = $clarificationQuestions;
        null !== $conversationHistory && $self['conversationHistory'] = $conversationHistory;
        null !== $message && $self['message'] = $message;
        null !== $needsClarification && $self['needsClarification'] = $needsClarification;
        null !== $sessionID && $self['sessionID'] = $sessionID;
        null !== $success && $self['success'] = $success;
        null !== $updatedScenarios && $self['updatedScenarios'] = $updatedScenarios;

        return $self;
    }

    public function withCancelled(bool $cancelled): self
    {
        $self = clone $this;
        $self['cancelled'] = $cancelled;

        return $self;
    }

    /**
     * @param list<ClarificationQuestion|ClarificationQuestionShape> $clarificationQuestions
     */
    public function withClarificationQuestions(
        array $clarificationQuestions
    ): self {
        $self = clone $this;
        $self['clarificationQuestions'] = $clarificationQuestions;

        return $self;
    }

    /**
     * @param list<ConversationHistory|ConversationHistoryShape> $conversationHistory
     */
    public function withConversationHistory(array $conversationHistory): self
    {
        $self = clone $this;
        $self['conversationHistory'] = $conversationHistory;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withNeedsClarification(bool $needsClarification): self
    {
        $self = clone $this;
        $self['needsClarification'] = $needsClarification;

        return $self;
    }

    public function withSessionID(int $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }

    /**
     * @param list<array<string,mixed>> $updatedScenarios
     */
    public function withUpdatedScenarios(array $updatedScenarios): self
    {
        $self = clone $this;
        $self['updatedScenarios'] = $updatedScenarios;

        return $self;
    }
}
