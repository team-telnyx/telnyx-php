<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Remediation\RemediationSubmitResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Per-category buckets. Populated once results are available. Null while the request is still pending.
 *
 * @phpstan-type ResultsShape = array{
 *   ineligible?: list<string>|null,
 *   notFlagged?: list<string>|null,
 *   refused?: list<string>|null,
 *   remediated?: list<string>|null,
 *   requiresReview?: list<string>|null,
 * }
 */
final class Results implements BaseModel
{
    /** @use SdkModel<ResultsShape> */
    use SdkModel;

    /** @var list<string>|null $ineligible */
    #[Optional(list: 'string')]
    public ?array $ineligible;

    /** @var list<string>|null $notFlagged */
    #[Optional('not_flagged', list: 'string')]
    public ?array $notFlagged;

    /** @var list<string>|null $refused */
    #[Optional(list: 'string')]
    public ?array $refused;

    /** @var list<string>|null $remediated */
    #[Optional(list: 'string')]
    public ?array $remediated;

    /** @var list<string>|null $requiresReview */
    #[Optional('requires_review', list: 'string')]
    public ?array $requiresReview;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $ineligible
     * @param list<string>|null $notFlagged
     * @param list<string>|null $refused
     * @param list<string>|null $remediated
     * @param list<string>|null $requiresReview
     */
    public static function with(
        ?array $ineligible = null,
        ?array $notFlagged = null,
        ?array $refused = null,
        ?array $remediated = null,
        ?array $requiresReview = null,
    ): self {
        $self = new self;

        null !== $ineligible && $self['ineligible'] = $ineligible;
        null !== $notFlagged && $self['notFlagged'] = $notFlagged;
        null !== $refused && $self['refused'] = $refused;
        null !== $remediated && $self['remediated'] = $remediated;
        null !== $requiresReview && $self['requiresReview'] = $requiresReview;

        return $self;
    }

    /**
     * @param list<string> $ineligible
     */
    public function withIneligible(array $ineligible): self
    {
        $self = clone $this;
        $self['ineligible'] = $ineligible;

        return $self;
    }

    /**
     * @param list<string> $notFlagged
     */
    public function withNotFlagged(array $notFlagged): self
    {
        $self = clone $this;
        $self['notFlagged'] = $notFlagged;

        return $self;
    }

    /**
     * @param list<string> $refused
     */
    public function withRefused(array $refused): self
    {
        $self = clone $this;
        $self['refused'] = $refused;

        return $self;
    }

    /**
     * @param list<string> $remediated
     */
    public function withRemediated(array $remediated): self
    {
        $self = clone $this;
        $self['remediated'] = $remediated;

        return $self;
    }

    /**
     * @param list<string> $requiresReview
     */
    public function withRequiresReview(array $requiresReview): self
    {
        $self = clone $this;
        $self['requiresReview'] = $requiresReview;

        return $self;
    }
}
