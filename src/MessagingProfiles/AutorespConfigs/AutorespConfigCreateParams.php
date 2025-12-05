<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Api;
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
 *   country_code: string,
 *   keywords: list<string>,
 *   op: Op|value-of<Op>,
 *   resp_text?: string,
 * }
 */
final class AutorespConfigCreateParams implements BaseModel
{
    /** @use SdkModel<AutorespConfigCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $country_code;

    /** @var list<string> $keywords */
    #[Api(list: 'string')]
    public array $keywords;

    /** @var value-of<Op> $op */
    #[Api(enum: Op::class)]
    public string $op;

    #[Api(optional: true)]
    public ?string $resp_text;

    /**
     * `new AutorespConfigCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutorespConfigCreateParams::with(country_code: ..., keywords: ..., op: ...)
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
        string $country_code,
        array $keywords,
        Op|string $op,
        ?string $resp_text = null,
    ): self {
        $obj = new self;

        $obj['country_code'] = $country_code;
        $obj['keywords'] = $keywords;
        $obj['op'] = $op;

        null !== $resp_text && $obj['resp_text'] = $resp_text;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

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
        $obj['resp_text'] = $respText;

        return $obj;
    }
}
