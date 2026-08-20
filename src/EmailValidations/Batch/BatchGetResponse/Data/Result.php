<?php

declare(strict_types=1);

namespace Telnyx\EmailValidations\Batch\BatchGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailValidations\EmailValidationChecks;

/**
 * @phpstan-import-type EmailValidationChecksShape from \Telnyx\EmailValidations\EmailValidationChecks
 *
 * @phpstan-type ResultShape = array{
 *   checks: EmailValidationChecks|EmailValidationChecksShape,
 *   email: string,
 *   riskScore: float,
 *   valid: bool,
 *   didYouMean?: string|null,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    #[Required]
    public EmailValidationChecks $checks;

    #[Required]
    public string $email;

    #[Required('risk_score')]
    public float $riskScore;

    #[Required]
    public bool $valid;

    /**
     * Suggested correction for typo. Omitted when nil.
     */
    #[Optional('did_you_mean')]
    public ?string $didYouMean;

    /**
     * `new Result()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Result::with(checks: ..., email: ..., riskScore: ..., valid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Result)
     *   ->withChecks(...)
     *   ->withEmail(...)
     *   ->withRiskScore(...)
     *   ->withValid(...)
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
     * @param EmailValidationChecks|EmailValidationChecksShape $checks
     */
    public static function with(
        EmailValidationChecks|array $checks,
        string $email,
        float $riskScore,
        bool $valid,
        ?string $didYouMean = null,
    ): self {
        $self = new self;

        $self['checks'] = $checks;
        $self['email'] = $email;
        $self['riskScore'] = $riskScore;
        $self['valid'] = $valid;

        null !== $didYouMean && $self['didYouMean'] = $didYouMean;

        return $self;
    }

    /**
     * @param EmailValidationChecks|EmailValidationChecksShape $checks
     */
    public function withChecks(EmailValidationChecks|array $checks): self
    {
        $self = clone $this;
        $self['checks'] = $checks;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withRiskScore(float $riskScore): self
    {
        $self = clone $this;
        $self['riskScore'] = $riskScore;

        return $self;
    }

    public function withValid(bool $valid): self
    {
        $self = clone $this;
        $self['valid'] = $valid;

        return $self;
    }

    /**
     * Suggested correction for typo. Omitted when nil.
     */
    public function withDidYouMean(string $didYouMean): self
    {
        $self = clone $this;
        $self['didYouMean'] = $didYouMean;

        return $self;
    }
}
