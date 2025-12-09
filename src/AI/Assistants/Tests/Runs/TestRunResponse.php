<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\Runs;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse\DetailStatus;
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
 * @phpstan-type TestRunResponseShape = array{
 *   createdAt: \DateTimeInterface,
 *   runID: string,
 *   status: value-of<TestStatus>,
 *   testID: string,
 *   triggeredBy: string,
 *   completedAt?: \DateTimeInterface|null,
 *   conversationID?: string|null,
 *   conversationInsightsID?: string|null,
 *   detailStatus?: list<DetailStatus>|null,
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
     * @var list<DetailStatus>|null $detailStatus
     */
    #[Optional('detail_status', list: DetailStatus::class)]
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
     * @param list<DetailStatus|array{
     *   name: string, status: value-of<TestStatus>
     * }> $detailStatus
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
        $obj = new self;

        $obj['createdAt'] = $createdAt;
        $obj['runID'] = $runID;
        $obj['status'] = $status;
        $obj['testID'] = $testID;
        $obj['triggeredBy'] = $triggeredBy;

        null !== $completedAt && $obj['completedAt'] = $completedAt;
        null !== $conversationID && $obj['conversationID'] = $conversationID;
        null !== $conversationInsightsID && $obj['conversationInsightsID'] = $conversationInsightsID;
        null !== $detailStatus && $obj['detailStatus'] = $detailStatus;
        null !== $logs && $obj['logs'] = $logs;
        null !== $testSuiteRunID && $obj['testSuiteRunID'] = $testSuiteRunID;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Timestamp when the test run was created and queued.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Unique identifier for this specific test run execution.
     */
    public function withRunID(string $runID): self
    {
        $obj = clone $this;
        $obj['runID'] = $runID;

        return $obj;
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
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Identifier of the assistant test that was executed.
     */
    public function withTestID(string $testID): self
    {
        $obj = clone $this;
        $obj['testID'] = $testID;

        return $obj;
    }

    /**
     * How this test run was initiated (manual, scheduled, or API).
     */
    public function withTriggeredBy(string $triggeredBy): self
    {
        $obj = clone $this;
        $obj['triggeredBy'] = $triggeredBy;

        return $obj;
    }

    /**
     * Timestamp when the test run finished execution.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj['completedAt'] = $completedAt;

        return $obj;
    }

    /**
     * Identifier of the conversation created during test execution.
     */
    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj['conversationID'] = $conversationID;

        return $obj;
    }

    /**
     * Identifier for conversation analysis and insights data.
     */
    public function withConversationInsightsID(
        string $conversationInsightsID
    ): self {
        $obj = clone $this;
        $obj['conversationInsightsID'] = $conversationInsightsID;

        return $obj;
    }

    /**
     * Detailed evaluation results for each rubric criteria. Name is name of the criteria from the rubric and status is the result of the evaluation. This list will have a result for every criteria in the rubric section.
     *
     * @param list<DetailStatus|array{
     *   name: string, status: value-of<TestStatus>
     * }> $detailStatus
     */
    public function withDetailStatus(array $detailStatus): self
    {
        $obj = clone $this;
        $obj['detailStatus'] = $detailStatus;

        return $obj;
    }

    /**
     * Detailed execution logs and debug information.
     */
    public function withLogs(string $logs): self
    {
        $obj = clone $this;
        $obj['logs'] = $logs;

        return $obj;
    }

    /**
     * Identifier linking this run to a test suite execution batch.
     */
    public function withTestSuiteRunID(string $testSuiteRunID): self
    {
        $obj = clone $this;
        $obj['testSuiteRunID'] = $testSuiteRunID;

        return $obj;
    }

    /**
     * Timestamp of the last update to this test run.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
