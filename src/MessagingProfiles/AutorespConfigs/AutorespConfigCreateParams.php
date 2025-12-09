<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigCreateParams\Op;

/**
 * Create Auto-Reponse Setting.
 *
 * @see Telnyx\Services\MessagingProfiles\AutorespConfigsService::create()
 *
 * @phpstan-type AutorespConfigCreateParamsShape = array{
 *   countryCode: string,
 *   keywords: list<string>,
 *   op: Op|value-of<Op>,
 *   respText?: string,
 * }
 */
final class AutorespConfigCreateParams implements BaseModel
{
    /** @use SdkModel<AutorespConfigCreateParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * `new AutorespConfigCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutorespConfigCreateParams::with(countryCode: ..., keywords: ..., op: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutorespConfigCreateParams)
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
        string $countryCode,
        array $keywords,
        Op|string $op,
        ?string $respText = null
    ): self {
        $obj = new self;

        $obj['countryCode'] = $countryCode;
        $obj['keywords'] = $keywords;
        $obj['op'] = $op;

        null !== $respText && $obj['respText'] = $respText;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    /**
     * @param list<string> $keywords
     */
    public function withKeywords(array $keywords): self
    {
        $obj = clone $this;
        $obj['keywords'] = $keywords;

        return $obj;
    }

    /**
     * @param Op|value-of<Op> $op
     */
    public function withOp(Op|string $op): self
    {
        $obj = clone $this;
        $obj['op'] = $op;

        return $obj;
    }

    public function withRespText(string $respText): self
    {
        $obj = clone $this;
        $obj['respText'] = $respText;

        return $obj;
    }
}
