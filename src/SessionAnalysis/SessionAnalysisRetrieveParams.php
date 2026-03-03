<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SessionAnalysis\SessionAnalysisRetrieveParams\Expand;

/**
 * Retrieves a full session analysis tree for a given event, including costs, child events, and product linkages.
 *
 * @see Telnyx\Services\SessionAnalysisService::retrieve()
 *
 * @phpstan-type SessionAnalysisRetrieveParamsShape = array{
 *   recordType: string,
 *   dateTime?: \DateTimeInterface|null,
 *   expand?: null|Expand|value-of<Expand>,
 *   includeChildren?: bool|null,
 *   maxDepth?: int|null,
 * }
 */
final class SessionAnalysisRetrieveParams implements BaseModel
{
    /** @use SdkModel<SessionAnalysisRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $recordType;

    /**
     * ISO 8601 timestamp to narrow index selection for faster lookups.
     */
    #[Optional]
    public ?\DateTimeInterface $dateTime;

    /**
     * Controls what data to expand on each event node.
     *
     * @var value-of<Expand>|null $expand
     */
    #[Optional(enum: Expand::class)]
    public ?string $expand;

    /**
     * Whether to include child events in the response.
     */
    #[Optional]
    public ?bool $includeChildren;

    /**
     * Maximum traversal depth for the event tree.
     */
    #[Optional]
    public ?int $maxDepth;

    /**
     * `new SessionAnalysisRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SessionAnalysisRetrieveParams::with(recordType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SessionAnalysisRetrieveParams)->withRecordType(...)
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
     * @param Expand|value-of<Expand>|null $expand
     */
    public static function with(
        string $recordType,
        ?\DateTimeInterface $dateTime = null,
        Expand|string|null $expand = null,
        ?bool $includeChildren = null,
        ?int $maxDepth = null,
    ): self {
        $self = new self;

        $self['recordType'] = $recordType;

        null !== $dateTime && $self['dateTime'] = $dateTime;
        null !== $expand && $self['expand'] = $expand;
        null !== $includeChildren && $self['includeChildren'] = $includeChildren;
        null !== $maxDepth && $self['maxDepth'] = $maxDepth;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 timestamp to narrow index selection for faster lookups.
     */
    public function withDateTime(\DateTimeInterface $dateTime): self
    {
        $self = clone $this;
        $self['dateTime'] = $dateTime;

        return $self;
    }

    /**
     * Controls what data to expand on each event node.
     *
     * @param Expand|value-of<Expand> $expand
     */
    public function withExpand(Expand|string $expand): self
    {
        $self = clone $this;
        $self['expand'] = $expand;

        return $self;
    }

    /**
     * Whether to include child events in the response.
     */
    public function withIncludeChildren(bool $includeChildren): self
    {
        $self = clone $this;
        $self['includeChildren'] = $includeChildren;

        return $self;
    }

    /**
     * Maximum traversal depth for the event tree.
     */
    public function withMaxDepth(int $maxDepth): self
    {
        $self = clone $this;
        $self['maxDepth'] = $maxDepth;

        return $self;
    }
}
