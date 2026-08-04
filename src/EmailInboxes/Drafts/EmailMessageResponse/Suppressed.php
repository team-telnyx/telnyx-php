<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts\EmailMessageResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SuppressedShape = array{
 *   overrideAllowed: bool, reason: string, scope: string, to: string
 * }
 */
final class Suppressed implements BaseModel
{
    /** @use SdkModel<SuppressedShape> */
    use SdkModel;

    /**
     * Whether an authorized send may override this suppression.
     */
    #[Required('override_allowed')]
    public bool $overrideAllowed;

    /**
     * Suppression reason returned by the recipient suppression service.
     */
    #[Required]
    public string $reason;

    /**
     * Scope at which the suppression applies.
     */
    #[Required]
    public string $scope;

    /**
     * Suppressed recipient email address.
     */
    #[Required]
    public string $to;

    /**
     * `new Suppressed()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Suppressed::with(overrideAllowed: ..., reason: ..., scope: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Suppressed)
     *   ->withOverrideAllowed(...)
     *   ->withReason(...)
     *   ->withScope(...)
     *   ->withTo(...)
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
     */
    public static function with(
        bool $overrideAllowed,
        string $reason,
        string $scope,
        string $to
    ): self {
        $self = new self;

        $self['overrideAllowed'] = $overrideAllowed;
        $self['reason'] = $reason;
        $self['scope'] = $scope;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Whether an authorized send may override this suppression.
     */
    public function withOverrideAllowed(bool $overrideAllowed): self
    {
        $self = clone $this;
        $self['overrideAllowed'] = $overrideAllowed;

        return $self;
    }

    /**
     * Suppression reason returned by the recipient suppression service.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * Scope at which the suppression applies.
     */
    public function withScope(string $scope): self
    {
        $self = clone $this;
        $self['scope'] = $scope;

        return $self;
    }

    /**
     * Suppressed recipient email address.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
