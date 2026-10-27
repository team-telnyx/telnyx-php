<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Aiagents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TestAgentShape from \Telnyx\AI\Tests\TestFramework\V1\Aiagents\TestAgent
 *
 * @phpstan-type AiagentListResponseShape = array{
 *   count: int,
 *   next: string|null,
 *   previous: string|null,
 *   results: list<TestAgent|TestAgentShape>,
 * }
 */
final class AiagentListResponse implements BaseModel
{
    /** @use SdkModel<AiagentListResponseShape> */
    use SdkModel;

    #[Required]
    public int $count;

    /**
     * Link to the next page of results, or null.
     */
    #[Required]
    public ?string $next;

    /**
     * Link to the previous page of results, or null.
     */
    #[Required]
    public ?string $previous;

    /** @var list<TestAgent> $results */
    #[Required(list: TestAgent::class)]
    public array $results;

    /**
     * `new AiagentListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AiagentListResponse::with(count: ..., next: ..., previous: ..., results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AiagentListResponse)
     *   ->withCount(...)
     *   ->withNext(...)
     *   ->withPrevious(...)
     *   ->withResults(...)
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
     * @param list<TestAgent|TestAgentShape> $results
     */
    public static function with(
        int $count,
        ?string $next,
        ?string $previous,
        array $results
    ): self {
        $self = new self;

        $self['count'] = $count;
        $self['next'] = $next;
        $self['previous'] = $previous;
        $self['results'] = $results;

        return $self;
    }

    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * Link to the next page of results, or null.
     */
    public function withNext(?string $next): self
    {
        $self = clone $this;
        $self['next'] = $next;

        return $self;
    }

    /**
     * Link to the previous page of results, or null.
     */
    public function withPrevious(?string $previous): self
    {
        $self = clone $this;
        $self['previous'] = $previous;

        return $self;
    }

    /**
     * @param list<TestAgent|TestAgentShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
