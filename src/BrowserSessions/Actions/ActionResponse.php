<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions;

use Telnyx\BrowserSessions\Actions\ActionResponse\Error;
use Telnyx\BrowserSessions\Actions\ActionResponse\Result;
use Telnyx\BrowserSessions\Actions\ActionResponse\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ErrorShape from \Telnyx\BrowserSessions\Actions\ActionResponse\Error
 * @phpstan-import-type ResultShape from \Telnyx\BrowserSessions\Actions\ActionResponse\Result
 *
 * @phpstan-type ActionResponseShape = array{
 *   id: string,
 *   completedAt: \DateTimeInterface|null,
 *   createdAt: \DateTimeInterface,
 *   error: null|Error|ErrorShape,
 *   request: mixed,
 *   result: null|Result|ResultShape,
 *   seq: int,
 *   sessionID: string,
 *   startedAt: \DateTimeInterface|null,
 *   status: Status|value-of<Status>,
 *   type: string,
 * }
 */
final class ActionResponse implements BaseModel
{
    /** @use SdkModel<ActionResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('completed_at')]
    public ?\DateTimeInterface $completedAt;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Null unless an execution failure is recorded. Action failures (policy_denied, stale_observation, stale_ref, navigation_blocked, timeout, execution_lost, result_too_large) are returned on the action resource with HTTP 200. An unknown action with execution_lost has retryable=false; inspect session state and reconcile possible effects before any new action. Separately, a request may return HTTP 503 with a top-level execution_lost error and retryable=true; that is not proof of safe re-execution.
     */
    #[Required]
    public ?Error $error;

    /**
     * Normalized request metadata; defaults may be materialized and fill values are redacted as {redacted: true, length: number}, including inside batch actions.
     */
    #[Required]
    public mixed $request;

    #[Required]
    public ?Result $result;

    #[Required]
    public int $seq;

    #[Required('session_id')]
    public string $sessionID;

    #[Required('started_at')]
    public ?\DateTimeInterface $startedAt;

    /**
     * POST returns 202 for queued or running actions. Terminal states are succeeded, failed, and unknown (the execution outcome could not be determined, with error.code=execution_lost). GET returns 200 for both nonterminal and terminal states.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required]
    public string $type;

    /**
     * `new ActionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionResponse::with(
     *   id: ...,
     *   completedAt: ...,
     *   createdAt: ...,
     *   error: ...,
     *   request: ...,
     *   result: ...,
     *   seq: ...,
     *   sessionID: ...,
     *   startedAt: ...,
     *   status: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionResponse)
     *   ->withID(...)
     *   ->withCompletedAt(...)
     *   ->withCreatedAt(...)
     *   ->withError(...)
     *   ->withRequest(...)
     *   ->withResult(...)
     *   ->withSeq(...)
     *   ->withSessionID(...)
     *   ->withStartedAt(...)
     *   ->withStatus(...)
     *   ->withType(...)
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
     * @param Error|ErrorShape|null $error
     * @param Result|ResultShape|null $result
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        ?\DateTimeInterface $completedAt,
        \DateTimeInterface $createdAt,
        Error|array|null $error,
        mixed $request,
        Result|array|null $result,
        int $seq,
        string $sessionID,
        ?\DateTimeInterface $startedAt,
        Status|string $status,
        string $type,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['completedAt'] = $completedAt;
        $self['createdAt'] = $createdAt;
        $self['error'] = $error;
        $self['request'] = $request;
        $self['result'] = $result;
        $self['seq'] = $seq;
        $self['sessionID'] = $sessionID;
        $self['startedAt'] = $startedAt;
        $self['status'] = $status;
        $self['type'] = $type;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCompletedAt(?\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Null unless an execution failure is recorded. Action failures (policy_denied, stale_observation, stale_ref, navigation_blocked, timeout, execution_lost, result_too_large) are returned on the action resource with HTTP 200. An unknown action with execution_lost has retryable=false; inspect session state and reconcile possible effects before any new action. Separately, a request may return HTTP 503 with a top-level execution_lost error and retryable=true; that is not proof of safe re-execution.
     *
     * @param Error|ErrorShape|null $error
     */
    public function withError(Error|array|null $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    /**
     * Normalized request metadata; defaults may be materialized and fill values are redacted as {redacted: true, length: number}, including inside batch actions.
     */
    public function withRequest(mixed $request): self
    {
        $self = clone $this;
        $self['request'] = $request;

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

    public function withSeq(int $seq): self
    {
        $self = clone $this;
        $self['seq'] = $seq;

        return $self;
    }

    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withStartedAt(?\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * POST returns 202 for queued or running actions. Terminal states are succeeded, failed, and unknown (the execution outcome could not be determined, with error.code=execution_lost). GET returns 200 for both nonterminal and terminal states.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
