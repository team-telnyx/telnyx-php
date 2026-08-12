<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\Research\ResearchNewResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebSearch\Research\ResearchCitation;

/**
 * Synchronous research response (when `background` is false or unset).
 *
 * @phpstan-import-type ResearchCitationShape from \Telnyx\WebSearch\Research\ResearchCitation
 *
 * @phpstan-type ResearchResponseSyncShape = array{
 *   answer: string, citations?: list<ResearchCitation|ResearchCitationShape>|null
 * }
 */
final class ResearchResponseSync implements BaseModel
{
    /** @use SdkModel<ResearchResponseSyncShape> */
    use SdkModel;

    /**
     * The synthesized research answer.
     */
    #[Required]
    public string $answer;

    /**
     * Sources cited in the answer.
     *
     * @var list<ResearchCitation>|null $citations
     */
    #[Optional(list: ResearchCitation::class)]
    public ?array $citations;

    /**
     * `new ResearchResponseSync()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ResearchResponseSync::with(answer: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ResearchResponseSync)->withAnswer(...)
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
     * @param list<ResearchCitation|ResearchCitationShape>|null $citations
     */
    public static function with(string $answer, ?array $citations = null): self
    {
        $self = new self;

        $self['answer'] = $answer;

        null !== $citations && $self['citations'] = $citations;

        return $self;
    }

    /**
     * The synthesized research answer.
     */
    public function withAnswer(string $answer): self
    {
        $self = clone $this;
        $self['answer'] = $answer;

        return $self;
    }

    /**
     * Sources cited in the answer.
     *
     * @param list<ResearchCitation|ResearchCitationShape> $citations
     */
    public function withCitations(array $citations): self
    {
        $self = clone $this;
        $self['citations'] = $citations;

        return $self;
    }
}
