<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\Runs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response model containing test run execution details and results.
 *
 * Provides comprehensive information about a test execution including
 * status, timing, logs, and detailed evaluation results.
 *
 * @phpstan-import-type TestRunDetailResultShape from \Telnyx\AI\Assistants\Tests\Runs\TestRunDetailResult
 *
 * @phpstan-type TestRunResponseShape = array{
 *   createdAt: \DateTimeInterface,
 *   runID: string,
 *   status: TestStatus|value-of<TestStatus>,
 *   testID: string,
 *   triggeredBy: string,
 *   completedAt?: \DateTimeInterface|null,
 *   conversationID?: string|null,
 *   conversationInsightsID?: string|null,
 *   detailStatus?: list<TestRunDetailResult|TestRunDetailResultShape>|null,
 *   logs?: string|null,
 *   testSuiteRunID?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class TestRunResponse implements BaseModel
{
    /** @use SdkModel<TestRunResponseShape> */
    use SdkModel;

    /**
     * Timestamp when the test run was created and queued.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Unique identifier for this specific test run execution.
     */
    #[Required('run_id')]
    public string $runID;

    /**
     * Represents the lifecycle of a test:
     *   - 'pending': Test is waiting to be executed.
     *   - 'starting': Test execution is initializing.
     *   - 'running': Test is currently executing.
     *   - 'passed': Test completed successfully.
     *   - 'failed': Test executed but did not pass.
     *   - 'error': An error occurred during test execution.
     *
     * @var value-of<TestStatus> $status
     */
    #[Required(enum: TestStatus::class)]
    public string $status;

    /**
     * Identifier of the assistant test that was executed.
     */
    #[Required('test_id')]
    public string $testID;

    /**
     * How this test run was initiated (manual, scheduled, or API).
     */
    #[Required('triggered_by')]
    public string $triggeredBy;

    /**
     * Timestamp when the test run finished execution.
     */
    #[Optional('completed_at')]
    public ?\DateTimeInterface $completedAt;

    /**
     * Identifier of the conversation created during test execution.
     */
    #[Optional('conversation_id')]
    public ?string $conversationID;

    /**
     * Identifier for conversation analysis and insights data.
     */
    #[Optional('conversation_insights_id')]
    public ?string $conversationInsightsID;

    /**
     * Detailed evaluation results for each rubric criteria. Name is name of the criteria from the rubric and status is the result of the evaluation. This list will have a result for every criteria in the rubric section.
     *
     * @var list<TestRunDetailResult>|null $detailStatus
     */
    #[Optional('detail_status', list: TestRunDetailResult::class)]
    public ?array $detailStatus;

    /**
     * Detailed execution logs and debug information.
     */
    #[Optional]
    public ?string $logs;

    /**
     * Identifier linking this run to a test suite execution batch.
     */
    #[Optional('test_suite_run_id')]
    public ?string $testSuiteRunID;

    /**
     * Timestamp of the last update to this test run.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new TestRunResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestRunResponse::with(
     *   createdAt: ..., runID: ..., status: ..., testID: ..., triggeredBy: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestRunResponse)
     *   ->withCreatedAt(...)
     *   ->withRunID(...)
     *   ->withStatus(...)
     *   ->withTestID(...)
     *   ->withTriggeredBy(...)
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
     * @param TestStatus|value-of<TestStatus> $status
     * @param list<TestRunDetailResult|TestRunDetailResultShape>|null $detailStatus
     */
    public static function with(
        \DateTimeInterface $createdAt,
        string $runID,
        TestStatus|string $status,
        string $testID,
        string $triggeredBy,
        ?\DateTimeInterface $completedAt = null,
        ?string $conversationID = null,
        ?string $conversationInsightsID = null,
        ?array $detailStatus = null,
        ?string $logs = null,
        ?string $testSuiteRunID = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['runID'] = $runID;
        $self['status'] = $status;
        $self['testID'] = $testID;
        $self['triggeredBy'] = $triggeredBy;

        null !== $completedAt && $self['completedAt'] = $completedAt;
        null !== $conversationID && $self['conversationID'] = $conversationID;
        null !== $conversationInsightsID && $self['conversationInsightsID'] = $conversationInsightsID;
        null !== $detailStatus && $self['detailStatus'] = $detailStatus;
        null !== $logs && $self['logs'] = $logs;
        null !== $testSuiteRunID && $self['testSuiteRunID'] = $testSuiteRunID;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Timestamp when the test run was created and queued.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Unique identifier for this specific test run execution.
     */
    public function withRunID(string $runID): self
    {
        $self = clone $this;
        $self['runID'] = $runID;

        return $self;
    }

    /**
     * Represents the lifecycle of a test:
     *   - 'pending': Test is waiting to be executed.
     *   - 'starting': Test execution is initializing.
     *   - 'running': Test is currently executing.
     *   - 'passed': Test completed successfully.
     *   - 'failed': Test executed but did not pass.
     *   - 'error': An error occurred during test execution.
     *
     * @param TestStatus|value-of<TestStatus> $status
     */
    public function withStatus(TestStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Identifier of the assistant test that was executed.
     */
    public function withTestID(string $testID): self
    {
        $self = clone $this;
        $self['testID'] = $testID;

        return $self;
    }

    /**
     * How this test run was initiated (manual, scheduled, or API).
     */
    public function withTriggeredBy(string $triggeredBy): self
    {
        $self = clone $this;
        $self['triggeredBy'] = $triggeredBy;

        return $self;
    }

    /**
     * Timestamp when the test run finished execution.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * Identifier of the conversation created during test execution.
     */
    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    /**
     * Identifier for conversation analysis and insights data.
     */
    public function withConversationInsightsID(
        string $conversationInsightsID
    ): self {
        $self = clone $this;
        $self['conversationInsightsID'] = $conversationInsightsID;

        return $self;
    }

    /**
     * Detailed evaluation results for each rubric criteria. Name is name of the criteria from the rubric and status is the result of the evaluation. This list will have a result for every criteria in the rubric section.
     *
     * @param list<TestRunDetailResult|TestRunDetailResultShape> $detailStatus
     */
    public function withDetailStatus(array $detailStatus): self
    {
        $self = clone $this;
        $self['detailStatus'] = $detailStatus;

        return $self;
    }

    /**
     * Detailed execution logs and debug information.
     */
    public function withLogs(string $logs): self
    {
        $self = clone $this;
        $self['logs'] = $logs;

        return $self;
    }

    /**
     * Identifier linking this run to a test suite execution batch.
     */
    public function withTestSuiteRunID(string $testSuiteRunID): self
    {
        $self = clone $this;
        $self['testSuiteRunID'] = $testSuiteRunID;

        return $self;
    }

    /**
     * Timestamp of the last update to this test run.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
