<?php

declare(strict_types=1);

namespace Telnyx\DocReqsRequirementType;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Specifies objective criteria for acceptance.
 *
 * @phpstan-type AcceptanceCriteriaShape = array{
 *   acceptableCharacters?: string|null,
 *   acceptableValues?: list<string>|null,
 *   localityLimit?: string|null,
 *   maxLength?: int|null,
 *   minLength?: int|null,
 *   timeLimit?: string|null,
 * }
 */
final class AcceptanceCriteria implements BaseModel
{
    /** @use SdkModel<AcceptanceCriteriaShape> */
    use SdkModel;

    /**
     * Specifies the allowed characters as a string.
     */
    #[Optional('acceptable_characters')]
    public ?string $acceptableCharacters;

    /**
     * Specifies the list of strictly possible values for the requirement. Ignored when empty.
     *
     * @var list<string>|null $acceptableValues
     */
    #[Optional('acceptable_values', list: 'string')]
    public ?array $acceptableValues;

    /**
     * Specifies geography-based acceptance criteria.
     */
    #[Optional('locality_limit')]
    public ?string $localityLimit;

    /**
     * Maximum length allowed for the value.
     */
    #[Optional('max_length')]
    public ?int $maxLength;

    /**
     * Minimum length allowed for the value.
     */
    #[Optional('min_length')]
    public ?int $minLength;

    /**
     * Specifies time-based acceptance criteria.
     */
    #[Optional('time_limit')]
    public ?string $timeLimit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $acceptableValues
     */
    public static function with(
        ?string $acceptableCharacters = null,
        ?array $acceptableValues = null,
        ?string $localityLimit = null,
        ?int $maxLength = null,
        ?int $minLength = null,
        ?string $timeLimit = null,
    ): self {
        $self = new self;

        null !== $acceptableCharacters && $self['acceptableCharacters'] = $acceptableCharacters;
        null !== $acceptableValues && $self['acceptableValues'] = $acceptableValues;
        null !== $localityLimit && $self['localityLimit'] = $localityLimit;
        null !== $maxLength && $self['maxLength'] = $maxLength;
        null !== $minLength && $self['minLength'] = $minLength;
        null !== $timeLimit && $self['timeLimit'] = $timeLimit;

        return $self;
    }

    /**
     * Specifies the allowed characters as a string.
     */
    public function withAcceptableCharacters(string $acceptableCharacters): self
    {
        $self = clone $this;
        $self['acceptableCharacters'] = $acceptableCharacters;

        return $self;
    }

    /**
     * Specifies the list of strictly possible values for the requirement. Ignored when empty.
     *
     * @param list<string> $acceptableValues
     */
    public function withAcceptableValues(array $acceptableValues): self
    {
        $self = clone $this;
        $self['acceptableValues'] = $acceptableValues;

        return $self;
    }

    /**
     * Specifies geography-based acceptance criteria.
     */
    public function withLocalityLimit(string $localityLimit): self
    {
        $self = clone $this;
        $self['localityLimit'] = $localityLimit;

        return $self;
    }

    /**
     * Maximum length allowed for the value.
     */
    public function withMaxLength(int $maxLength): self
    {
        $self = clone $this;
        $self['maxLength'] = $maxLength;

        return $self;
    }

    /**
     * Minimum length allowed for the value.
     */
    public function withMinLength(int $minLength): self
    {
        $self = clone $this;
        $self['minLength'] = $minLength;

        return $self;
    }

    /**
     * Specifies time-based acceptance criteria.
     */
    public function withTimeLimit(string $timeLimit): self
    {
        $self = clone $this;
        $self['timeLimit'] = $timeLimit;

        return $self;
    }
}
