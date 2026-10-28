<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios;

use Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioListResponse\Result;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ResultShape from \Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioListResponse\Result
 *
 * @phpstan-type ScenarioListResponseShape = array{
 *   count: int,
 *   next: string|null,
 *   previous: string|null,
 *   results: list<Result|ResultShape>,
 * }
 */
final class ScenarioListResponse implements BaseModel
{
    /** @use SdkModel<ScenarioListResponseShape> */
    use SdkModel;

    #[Required]
    public int $count;

    #[Required]
    public ?string $next;

    #[Required]
    public ?string $previous;

    /** @var list<Result> $results */
    #[Required(list: Result::class)]
    public array $results;

    /**
     * `new ScenarioListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScenarioListResponse::with(count: ..., next: ..., previous: ..., results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScenarioListResponse)
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
     * @param list<Result|ResultShape> $results
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

    public function withNext(?string $next): self
    {
        $self = clone $this;
        $self['next'] = $next;

        return $self;
    }

    public function withPrevious(?string $previous): self
    {
        $self = clone $this;
        $self['previous'] = $previous;

        return $self;
    }

    /**
     * @param list<Result|ResultShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
