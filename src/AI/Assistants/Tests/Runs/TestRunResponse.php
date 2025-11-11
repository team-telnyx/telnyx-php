<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\Runs;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse\DetailStatus;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * Response model containing test run execution details and results.
 *
 * Provides comprehensive information about a test execution including
 * status, timing, logs, and detailed evaluation results.
 *
 * @phpstan-type TestRunResponseShape = array{
 *   created_at: \DateTimeInterface,
 *   run_id: string,
 *   status: value-of<TestStatus>,
 *   test_id: string,
 *   triggered_by: string,
 *   completed_at?: \DateTimeInterface|null,
 *   conversation_id?: string|null,
 *   conversation_insights_id?: string|null,
 *   detail_status?: list<DetailStatus>|null,
 *   logs?: string|null,
 *   test_suite_run_id?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class TestRunResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TestRunResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Timestamp when the test run was created and queued.
     */
    #[Api]
    public \DateTimeInterface $created_at;

    /**
     * Unique identifier for this specific test run execution.
     */
    #[Api]
    public string $run_id;

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
    #[Api(enum: TestStatus::class)]
    public string $status;

    /**
     * Identifier of the assistant test that was executed.
     */
    #[Api]
    public string $test_id;

    /**
     * How this test run was initiated (manual, scheduled, or API).
     */
    #[Api]
    public string $triggered_by;

    /**
     * Timestamp when the test run finished execution.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $completed_at;

    /**
     * Identifier of the conversation created during test execution.
     */
    #[Api(optional: true)]
    public ?string $conversation_id;

    /**
     * Identifier for conversation analysis and insights data.
     */
    #[Api(optional: true)]
    public ?string $conversation_insights_id;

    /**
     * Detailed evaluation results for each rubric criteria. Name is name of the criteria from the rubric and status is the result of the evaluation. This list will have a result for every criteria in the rubric section.
     *
     * @var list<DetailStatus>|null $detail_status
     */
    #[Api(list: DetailStatus::class, optional: true)]
    public ?array $detail_status;

    /**
     * Detailed execution logs and debug information.
     */
    #[Api(optional: true)]
    public ?string $logs;

    /**
     * Identifier linking this run to a test suite execution batch.
     */
    #[Api(optional: true)]
    public ?string $test_suite_run_id;

    /**
     * Timestamp of the last update to this test run.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    /**
     * `new TestRunResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestRunResponse::with(
     *   created_at: ..., run_id: ..., status: ..., test_id: ..., triggered_by: ...
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
     * @param list<DetailStatus> $detail_status
     */
    public static function with(
        \DateTimeInterface $created_at,
        string $run_id,
        TestStatus|string $status,
        string $test_id,
        string $triggered_by,
        ?\DateTimeInterface $completed_at = null,
        ?string $conversation_id = null,
        ?string $conversation_insights_id = null,
        ?array $detail_status = null,
        ?string $logs = null,
        ?string $test_suite_run_id = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        $obj->created_at = $created_at;
        $obj->run_id = $run_id;
        $obj['status'] = $status;
        $obj->test_id = $test_id;
        $obj->triggered_by = $triggered_by;

        null !== $completed_at && $obj->completed_at = $completed_at;
        null !== $conversation_id && $obj->conversation_id = $conversation_id;
        null !== $conversation_insights_id && $obj->conversation_insights_id = $conversation_insights_id;
        null !== $detail_status && $obj->detail_status = $detail_status;
        null !== $logs && $obj->logs = $logs;
        null !== $test_suite_run_id && $obj->test_suite_run_id = $test_suite_run_id;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Timestamp when the test run was created and queued.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Unique identifier for this specific test run execution.
     */
    public function withRunID(string $runID): self
    {
        $obj = clone $this;
        $obj->run_id = $runID;

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
        $obj->test_id = $testID;

        return $obj;
    }

    /**
     * How this test run was initiated (manual, scheduled, or API).
     */
    public function withTriggeredBy(string $triggeredBy): self
    {
        $obj = clone $this;
        $obj->triggered_by = $triggeredBy;

        return $obj;
    }

    /**
     * Timestamp when the test run finished execution.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completed_at = $completedAt;

        return $obj;
    }

    /**
     * Identifier of the conversation created during test execution.
     */
    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj->conversation_id = $conversationID;

        return $obj;
    }

    /**
     * Identifier for conversation analysis and insights data.
     */
    public function withConversationInsightsID(
        string $conversationInsightsID
    ): self {
        $obj = clone $this;
        $obj->conversation_insights_id = $conversationInsightsID;

        return $obj;
    }

    /**
     * Detailed evaluation results for each rubric criteria. Name is name of the criteria from the rubric and status is the result of the evaluation. This list will have a result for every criteria in the rubric section.
     *
     * @param list<DetailStatus> $detailStatus
     */
    public function withDetailStatus(array $detailStatus): self
    {
        $obj = clone $this;
        $obj->detail_status = $detailStatus;

        return $obj;
    }

    /**
     * Detailed execution logs and debug information.
     */
    public function withLogs(string $logs): self
    {
        $obj = clone $this;
        $obj->logs = $logs;

        return $obj;
    }

    /**
     * Identifier linking this run to a test suite execution batch.
     */
    public function withTestSuiteRunID(string $testSuiteRunID): self
    {
        $obj = clone $this;
        $obj->test_suite_run_id = $testSuiteRunID;

        return $obj;
    }

    /**
     * Timestamp of the last update to this test run.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
