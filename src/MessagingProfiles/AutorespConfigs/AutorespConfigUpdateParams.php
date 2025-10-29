<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op;

/**
 * Update Auto-Response Setting.
 *
 * @see Telnyx\MessagingProfiles\AutorespConfigs->update
 *
 * @phpstan-type AutorespConfigUpdateParamsShape = array{
 *   profileID: string,
 *   countryCode: string,
 *   keywords: list<string>,
 *   op: Op|value-of<Op>,
 *   respText?: string,
 * }
 */
final class AutorespConfigUpdateParams implements BaseModel
{
    /** @use SdkModel<AutorespConfigUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $profileID;

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
        $obj = new self;

        $obj->profileID = $profileID;
        $obj->countryCode = $countryCode;
        $obj->keywords = $keywords;
        $obj['op'] = $op;

        null !== $respText && $obj->respText = $respText;

        return $obj;
    }

    public function withProfileID(string $profileID): self
    {
        $obj = clone $this;
        $obj->profileID = $profileID;

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
