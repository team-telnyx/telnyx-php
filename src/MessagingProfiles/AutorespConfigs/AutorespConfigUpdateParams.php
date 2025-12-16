<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op;

/**
 * Update Auto-Response Setting.
 *
 * @see Telnyx\Services\MessagingProfiles\AutorespConfigsService::update()
 *
 * @phpstan-type AutorespConfigUpdateParamsShape = array{
 *   profileID: string,
 *   countryCode: string,
 *   keywords: list<string>,
 *   op: Op|value-of<Op>,
 *   respText?: string|null,
 * }
 */
final class AutorespConfigUpdateParams implements BaseModel
{
    /** @use SdkModel<AutorespConfigUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $profileID;

    #[Required('country_code')]
    public string $countryCode;

    /** @var list<string> $keywords */
    #[Required(list: 'string')]
    public array $keywords;

    /** @var value-of<Op> $op */
    #[Required(enum: Op::class)]
    public string $op;

    #[Optional('resp_text')]
    public ?string $respText;

    /**
     * `new AutorespConfigUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutorespConfigUpdateParams::with(
     *   profileID: ..., countryCode: ..., keywords: ..., op: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutorespConfigUpdateParams)
     *   ->withProfileID(...)
     *   ->withCountryCode(...)
     *   ->withKeywords(...)
     *   ->withOp(...)
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
     * @param list<string> $keywords
     * @param Op|value-of<Op> $op
     */
    public static function with(
        string $profileID,
        string $countryCode,
        array $keywords,
        Op|string $op,
        ?string $respText = null,
    ): self {
        $self = new self;

        $self['profileID'] = $profileID;
        $self['countryCode'] = $countryCode;
        $self['keywords'] = $keywords;
        $self['op'] = $op;

        null !== $respText && $self['respText'] = $respText;

        return $self;
    }

    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * @param list<string> $keywords
     */
    public function withKeywords(array $keywords): self
    {
        $self = clone $this;
        $self['keywords'] = $keywords;

        return $self;
    }

    /**
     * @param Op|value-of<Op> $op
     */
    public function withOp(Op|string $op): self
    {
        $self = clone $this;
        $self['op'] = $op;

        return $self;
    }

    public function withRespText(string $respText): self
    {
        $self = clone $this;
        $self['respText'] = $respText;

        return $self;
    }
}
