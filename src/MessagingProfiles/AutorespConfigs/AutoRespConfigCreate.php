<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfigCreate\Op;

/**
 * @phpstan-type auto_resp_config_create = array{
 *   countryCode: string,
 *   keywords: list<string>,
 *   op: value-of<Op>,
 *   respText?: string,
 * }
 */
final class AutoRespConfigCreate implements BaseModel
{
    /** @use SdkModel<auto_resp_config_create> */
    use SdkModel;

    #[Api('country_code')]
    public string $countryCode;

    /** @var list<string> $keywords */
    #[Api(list: 'string')]
    public array $keywords;

    /** @var value-of<Op> $op */
    #[Api(enum: Op::class)]
    public string $op;

    #[Api('resp_text', optional: true)]
    public ?string $respText;

    /**
     * `new AutoRespConfigCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutoRespConfigCreate::with(countryCode: ..., keywords: ..., op: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutoRespConfigCreate)->withCountryCode(...)->withKeywords(...)->withOp(...)
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

        $obj->countryCode = $countryCode;
        $obj->keywords = $keywords;
        $obj['op'] = $op;

        null !== $respText && $obj->respText = $respText;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * @param list<string> $keywords
     */
    public function withKeywords(array $keywords): self
    {
        $obj = clone $this;
        $obj->keywords = $keywords;

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
        $obj->respText = $respText;

        return $obj;
    }
}
