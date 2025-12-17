<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AcceptanceCriteriaShape = array{
 *   acceptableCharacters?: string|null,
 *   acceptableValues?: list<string>|null,
 *   caseSensitive?: string|null,
 *   localityLimit?: string|null,
 *   maxLength?: string|null,
 *   minLength?: string|null,
 *   regex?: string|null,
 *   timeLimit?: string|null,
 * }
 */
final class AcceptanceCriteria implements BaseModel
{
    /** @use SdkModel<AcceptanceCriteriaShape> */
    use SdkModel;

    #[Optional('acceptable_characters')]
    public ?string $acceptableCharacters;

    /** @var list<string>|null $acceptableValues */
    #[Optional('acceptable_values', list: 'string')]
    public ?array $acceptableValues;

    #[Optional('case_sensitive')]
    public ?string $caseSensitive;

    #[Optional('locality_limit')]
    public ?string $localityLimit;

    #[Optional('max_length')]
    public ?string $maxLength;

    #[Optional('min_length')]
    public ?string $minLength;

    #[Optional]
    public ?string $regex;

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
        ?string $caseSensitive = null,
        ?string $localityLimit = null,
        ?string $maxLength = null,
        ?string $minLength = null,
        ?string $regex = null,
        ?string $timeLimit = null,
    ): self {
        $self = new self;

        null !== $acceptableCharacters && $self['acceptableCharacters'] = $acceptableCharacters;
        null !== $acceptableValues && $self['acceptableValues'] = $acceptableValues;
        null !== $caseSensitive && $self['caseSensitive'] = $caseSensitive;
        null !== $localityLimit && $self['localityLimit'] = $localityLimit;
        null !== $maxLength && $self['maxLength'] = $maxLength;
        null !== $minLength && $self['minLength'] = $minLength;
        null !== $regex && $self['regex'] = $regex;
        null !== $timeLimit && $self['timeLimit'] = $timeLimit;

        return $self;
    }

    public function withAcceptableCharacters(string $acceptableCharacters): self
    {
        $self = clone $this;
        $self['acceptableCharacters'] = $acceptableCharacters;

        return $self;
    }

    /**
     * @param list<string> $acceptableValues
     */
    public function withAcceptableValues(array $acceptableValues): self
    {
        $self = clone $this;
        $self['acceptableValues'] = $acceptableValues;

        return $self;
    }

    public function withCaseSensitive(string $caseSensitive): self
    {
        $self = clone $this;
        $self['caseSensitive'] = $caseSensitive;

        return $self;
    }

    public function withLocalityLimit(string $localityLimit): self
    {
        $self = clone $this;
        $self['localityLimit'] = $localityLimit;

        return $self;
    }

    public function withMaxLength(string $maxLength): self
    {
        $self = clone $this;
        $self['maxLength'] = $maxLength;

        return $self;
    }

    public function withMinLength(string $minLength): self
    {
        $self = clone $this;
        $self['minLength'] = $minLength;

        return $self;
    }

    public function withRegex(string $regex): self
    {
        $self = clone $this;
        $self['regex'] = $regex;

        return $self;
    }

    public function withTimeLimit(string $timeLimit): self
    {
        $self = clone $this;
        $self['timeLimit'] = $timeLimit;

        return $self;
    }
}
