<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Remediation;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Per-category buckets of phone numbers, populated once results are available. Empty lists are kept (not omitted) so consumers can iterate without null-checking each key.
 *
 * @phpstan-type RemediationPerNumberResultsShape = array{
 *   ineligible?: list<string>|null,
 *   notFlagged?: list<string>|null,
 *   refused?: list<string>|null,
 *   remediated?: list<string>|null,
 *   requiresReview?: list<string>|null,
 * }
 */
final class RemediationPerNumberResults implements BaseModel
{
    /** @use SdkModel<RemediationPerNumberResultsShape> */
    use SdkModel;

    /**
     * Numbers the reputation partner did not re-review because it had already reviewed them within the previous 60 days (already reviewed). The cooldown is measured from the partner's most recent review, not the API submission date. This array identifies the numbers but does not include their last-review or re-eligibility dates.
     *
     * @var list<string>|null $ineligible
     */
    #[Optional(list: 'string')]
    public ?array $ineligible;

    /**
     * The reputation partner reported no prior spam label for the number (no prior spam label).
     *
     * @var list<string>|null $notFlagged
     */
    #[Optional('not_flagged', list: 'string')]
    public ?array $notFlagged;

    /**
     * The reputation partner reviewed the number and declined the redress request (redress declined); the number remains flagged.
     *
     * @var list<string>|null $refused
     */
    #[Optional(list: 'string')]
    public ?array $refused;

    /**
     * The reputation partner approved redress (redress approved) or reported that the number had already been redressed recently (already recently redressed). This does not guarantee removal from every spam list.
     *
     * @var list<string>|null $remediated
     */
    #[Optional(list: 'string')]
    public ?array $remediated;

    /**
     * The number needs further review, or the partner response did not match a recognized outcome.
     *
     * @var list<string>|null $requiresReview
     */
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
     * Numbers the reputation partner did not re-review because it had already reviewed them within the previous 60 days (already reviewed). The cooldown is measured from the partner's most recent review, not the API submission date. This array identifies the numbers but does not include their last-review or re-eligibility dates.
     *
     * @param list<string> $ineligible
     */
    public function withIneligible(array $ineligible): self
    {
        $self = clone $this;
        $self['ineligible'] = $ineligible;

        return $self;
    }

    /**
     * The reputation partner reported no prior spam label for the number (no prior spam label).
     *
     * @param list<string> $notFlagged
     */
    public function withNotFlagged(array $notFlagged): self
    {
        $self = clone $this;
        $self['notFlagged'] = $notFlagged;

        return $self;
    }

    /**
     * The reputation partner reviewed the number and declined the redress request (redress declined); the number remains flagged.
     *
     * @param list<string> $refused
     */
    public function withRefused(array $refused): self
    {
        $self = clone $this;
        $self['refused'] = $refused;

        return $self;
    }

    /**
     * The reputation partner approved redress (redress approved) or reported that the number had already been redressed recently (already recently redressed). This does not guarantee removal from every spam list.
     *
     * @param list<string> $remediated
     */
    public function withRemediated(array $remediated): self
    {
        $self = clone $this;
        $self['remediated'] = $remediated;

        return $self;
    }

    /**
     * The number needs further review, or the partner response did not match a recognized outcome.
     *
     * @param list<string> $requiresReview
     */
    public function withRequiresReview(array $requiresReview): self
    {
        $self = clone $this;
        $self['requiresReview'] = $requiresReview;

        return $self;
    }
}
