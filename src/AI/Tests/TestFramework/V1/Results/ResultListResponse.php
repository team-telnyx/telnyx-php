<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Results;

use Telnyx\AI\Tests\TestFramework\V1\Results\ResultListResponse\Result;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ResultShape from \Telnyx\AI\Tests\TestFramework\V1\Results\ResultListResponse\Result
 *
 * @phpstan-type ResultListResponseShape = array{
 *   next: string|null,
 *   previous: string|null,
 *   results: list<Result|ResultShape>,
 *   count?: int|null,
 * }
 */
final class ResultListResponse implements BaseModel
{
    /** @use SdkModel<ResultListResponseShape> */
    use SdkModel;

    #[Required]
    public ?string $next;

    #[Required]
    public ?string $previous;

    /** @var list<Result> $results */
    #[Required(list: Result::class)]
    public array $results;

    #[Optional]
    public ?int $count;

    /**
     * `new ResultListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ResultListResponse::with(next: ..., previous: ..., results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ResultListResponse)->withNext(...)->withPrevious(...)->withResults(...)
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
        ?string $next,
        ?string $previous,
        array $results,
        ?int $count = null
    ): self {
        $self = new self;

        $self['next'] = $next;
        $self['previous'] = $previous;
        $self['results'] = $results;

        null !== $count && $self['count'] = $count;

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

    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }
}
