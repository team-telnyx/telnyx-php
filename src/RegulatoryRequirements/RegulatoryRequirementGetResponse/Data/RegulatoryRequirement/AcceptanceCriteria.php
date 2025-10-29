<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AcceptanceCriteriaShape = array{
 *   acceptableCharacters?: string,
 *   acceptableValues?: list<string>,
 *   caseSensitive?: string,
 *   localityLimit?: string,
 *   maxLength?: string,
 *   minLength?: string,
 *   regex?: string,
 *   timeLimit?: string,
 * }
 */
final class AcceptanceCriteria implements BaseModel
{
    /** @use SdkModel<AcceptanceCriteriaShape> */
    use SdkModel;

    #[Api('acceptable_characters', optional: true)]
    public ?string $acceptableCharacters;

    /** @var list<string>|null $acceptableValues */
    #[Api('acceptable_values', list: 'string', optional: true)]
    public ?array $acceptableValues;

    #[Api('case_sensitive', optional: true)]
    public ?string $caseSensitive;

    #[Api('locality_limit', optional: true)]
    public ?string $localityLimit;

    #[Api('max_length', optional: true)]
    public ?string $maxLength;

    #[Api('min_length', optional: true)]
    public ?string $minLength;

    #[Api(optional: true)]
    public ?string $regex;

    #[Api('time_limit', optional: true)]
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
     * @param list<string> $acceptableValues
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
        $obj = new self;

        null !== $acceptableCharacters && $obj->acceptableCharacters = $acceptableCharacters;
        null !== $acceptableValues && $obj->acceptableValues = $acceptableValues;
        null !== $caseSensitive && $obj->caseSensitive = $caseSensitive;
        null !== $localityLimit && $obj->localityLimit = $localityLimit;
        null !== $maxLength && $obj->maxLength = $maxLength;
        null !== $minLength && $obj->minLength = $minLength;
        null !== $regex && $obj->regex = $regex;
        null !== $timeLimit && $obj->timeLimit = $timeLimit;

        return $obj;
    }

    public function withAcceptableCharacters(string $acceptableCharacters): self
    {
        $obj = clone $this;
        $obj->acceptableCharacters = $acceptableCharacters;

        return $obj;
    }

    /**
     * @param list<string> $acceptableValues
     */
    public function withAcceptableValues(array $acceptableValues): self
    {
        $obj = clone $this;
        $obj->acceptableValues = $acceptableValues;

        return $obj;
    }

    public function withCaseSensitive(string $caseSensitive): self
    {
        $obj = clone $this;
        $obj->caseSensitive = $caseSensitive;

        return $obj;
    }

    public function withLocalityLimit(string $localityLimit): self
    {
        $obj = clone $this;
        $obj->localityLimit = $localityLimit;

        return $obj;
    }

    public function withMaxLength(string $maxLength): self
    {
        $obj = clone $this;
        $obj->maxLength = $maxLength;

        return $obj;
    }

    public function withMinLength(string $minLength): self
    {
        $obj = clone $this;
        $obj->minLength = $minLength;

        return $obj;
    }

    public function withRegex(string $regex): self
    {
        $obj = clone $this;
        $obj->regex = $regex;

        return $obj;
    }

    public function withTimeLimit(string $timeLimit): self
    {
        $obj = clone $this;
        $obj->timeLimit = $timeLimit;

        return $obj;
    }
}
