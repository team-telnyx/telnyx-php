<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\Research;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebSearch\Research\ResearchCreateParams\ResearchEffort;

/**
 * Starts a deep research task that runs multiple searches, reads sources, and synthesizes an answer with citations.
 *
 * ## Synchronous mode (default)
 *
 * When `background` is `false` or omitted, the request blocks until the research completes and returns the answer with citations. This can take up to 120 seconds depending on `research_effort`.
 *
 * ## Asynchronous mode
 *
 * When `background` is `true`, the request returns immediately with a `task_id` and `status: pending`. Poll `GET /web_search/research/{task_id}` to check when the research completes and retrieve the answer.
 *
 * @see Telnyx\Services\WebSearch\ResearchService::create()
 *
 * @phpstan-type ResearchCreateParamsShape = array{
 *   query: string,
 *   background?: bool|null,
 *   maxSources?: int|null,
 *   researchEffort?: null|ResearchEffort|value-of<ResearchEffort>,
 * }
 */
final class ResearchCreateParams implements BaseModel
{
    /** @use SdkModel<ResearchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The research question or topic.
     */
    #[Required]
    public string $query;

    /**
     * When `true`, the research runs asynchronously. The response returns a `task_id` immediately instead of waiting for the result. Poll `GET /web_search/research/{task_id}` to check status.
     */
    #[Optional]
    public ?bool $background;

    /**
     * Maximum number of sources to use.
     */
    #[Optional('max_sources')]
    public ?int $maxSources;

    /**
     * Research depth level. `lite` is fastest, `deep` is most thorough.
     *
     * @var value-of<ResearchEffort>|null $researchEffort
     */
    #[Optional('research_effort', enum: ResearchEffort::class)]
    public ?string $researchEffort;

    /**
     * `new ResearchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ResearchCreateParams::with(query: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ResearchCreateParams)->withQuery(...)
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
     * @param ResearchEffort|value-of<ResearchEffort>|null $researchEffort
     */
    public static function with(
        string $query,
        ?bool $background = null,
        ?int $maxSources = null,
        ResearchEffort|string|null $researchEffort = null,
    ): self {
        $self = new self;

        $self['query'] = $query;

        null !== $background && $self['background'] = $background;
        null !== $maxSources && $self['maxSources'] = $maxSources;
        null !== $researchEffort && $self['researchEffort'] = $researchEffort;

        return $self;
    }

    /**
     * The research question or topic.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * When `true`, the research runs asynchronously. The response returns a `task_id` immediately instead of waiting for the result. Poll `GET /web_search/research/{task_id}` to check status.
     */
    public function withBackground(bool $background): self
    {
        $self = clone $this;
        $self['background'] = $background;

        return $self;
    }

    /**
     * Maximum number of sources to use.
     */
    public function withMaxSources(int $maxSources): self
    {
        $self = clone $this;
        $self['maxSources'] = $maxSources;

        return $self;
    }

    /**
     * Research depth level. `lite` is fastest, `deep` is most thorough.
     *
     * @param ResearchEffort|value-of<ResearchEffort> $researchEffort
     */
    public function withResearchEffort(
        ResearchEffort|string $researchEffort
    ): self {
        $self = clone $this;
        $self['researchEffort'] = $researchEffort;

        return $self;
    }
}
