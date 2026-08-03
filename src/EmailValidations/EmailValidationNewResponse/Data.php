<?php

declare(strict_types=1);

namespace Telnyx\EmailValidations\EmailValidationNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailValidations\EmailValidationNewResponse\Data\Checks;
use Telnyx\EmailValidations\EmailValidationNewResponse\Data\RecordType;

/**
 * @phpstan-import-type ChecksShape from \Telnyx\EmailValidations\EmailValidationNewResponse\Data\Checks
 *
 * @phpstan-type DataShape = array{
 *   checks: Checks|ChecksShape,
 *   email: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   riskScore: float,
 *   valid: bool,
 *   didYouMean?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public Checks $checks;

    #[Required]
    public string $email;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

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
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(checks: ..., email: ..., recordType: ..., riskScore: ..., valid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withChecks(...)
     *   ->withEmail(...)
     *   ->withRecordType(...)
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
     * @param Checks|ChecksShape $checks
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        Checks|array $checks,
        string $email,
        RecordType|string $recordType,
        float $riskScore,
        bool $valid,
        ?string $didYouMean = null,
    ): self {
        $self = new self;

        $self['checks'] = $checks;
        $self['email'] = $email;
        $self['recordType'] = $recordType;
        $self['riskScore'] = $riskScore;
        $self['valid'] = $valid;

        null !== $didYouMean && $self['didYouMean'] = $didYouMean;

        return $self;
    }

    /**
     * @param Checks|ChecksShape $checks
     */
    public function withChecks(Checks|array $checks): self
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

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

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
