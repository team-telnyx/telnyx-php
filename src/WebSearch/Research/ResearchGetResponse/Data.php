<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\Research\ResearchGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebSearch\Research\ResearchCitation;
use Telnyx\WebSearch\Research\ResearchGetResponse\Data\Status;

/**
 * @phpstan-import-type ResearchCitationShape from \Telnyx\WebSearch\Research\ResearchCitation
 *
 * @phpstan-type DataShape = array{
 *   status: Status|value-of<Status>,
 *   taskID: string,
 *   answer?: string|null,
 *   citations?: list<ResearchCitation|ResearchCitationShape>|null,
 *   error?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Current status of the research task.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * The research task identifier.
     */
    #[Required('task_id')]
    public string $taskID;

    /**
     * The synthesized research answer (present when status is `completed`).
     */
    #[Optional]
    public ?string $answer;

    /**
     * Sources cited in the answer (present when status is `completed`).
     *
     * @var list<ResearchCitation>|null $citations
     */
    #[Optional(list: ResearchCitation::class)]
    public ?array $citations;

    /**
     * Always present in poll responses; `null` unless the task failed.
     */
    #[Optional(nullable: true)]
    public ?string $error;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(status: ..., taskID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withStatus(...)->withTaskID(...)
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
     * @param Status|value-of<Status> $status
     * @param list<ResearchCitation|ResearchCitationShape>|null $citations
     */
    public static function with(
        Status|string $status,
        string $taskID,
        ?string $answer = null,
        ?array $citations = null,
        ?string $error = null,
    ): self {
        $self = new self;

        $self['status'] = $status;
        $self['taskID'] = $taskID;

        null !== $answer && $self['answer'] = $answer;
        null !== $citations && $self['citations'] = $citations;
        null !== $error && $self['error'] = $error;

        return $self;
    }

    /**
     * Current status of the research task.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The research task identifier.
     */
    public function withTaskID(string $taskID): self
    {
        $self = clone $this;
        $self['taskID'] = $taskID;

        return $self;
    }

    /**
     * The synthesized research answer (present when status is `completed`).
     */
    public function withAnswer(string $answer): self
    {
        $self = clone $this;
        $self['answer'] = $answer;

        return $self;
    }

    /**
     * Sources cited in the answer (present when status is `completed`).
     *
     * @param list<ResearchCitation|ResearchCitationShape> $citations
     */
    public function withCitations(array $citations): self
    {
        $self = clone $this;
        $self['citations'] = $citations;

        return $self;
    }

    /**
     * Always present in poll responses; `null` unless the task failed.
     */
    public function withError(?string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }
}
