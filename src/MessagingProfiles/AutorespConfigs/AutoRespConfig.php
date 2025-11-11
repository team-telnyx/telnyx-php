<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfig\Op;

/**
 * @phpstan-type AutoRespConfigShape = array{
 *   id: string,
 *   country_code: string,
 *   created_at: \DateTimeInterface,
 *   keywords: list<string>,
 *   op: value-of<Op>,
 *   updated_at: \DateTimeInterface,
 *   resp_text?: string|null,
 * }
 */
final class AutoRespConfig implements BaseModel
{
    /** @use SdkModel<AutoRespConfigShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $country_code;

    #[Api]
    public \DateTimeInterface $created_at;

    /** @var list<string> $keywords */
    #[Api(list: 'string')]
    public array $keywords;

    /** @var value-of<Op> $op */
    #[Api(enum: Op::class)]
    public string $op;

    #[Api]
    public \DateTimeInterface $updated_at;

    #[Api(optional: true)]
    public ?string $resp_text;

    /**
     * `new AutoRespConfig()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutoRespConfig::with(
     *   id: ...,
     *   country_code: ...,
     *   created_at: ...,
     *   keywords: ...,
     *   op: ...,
     *   updated_at: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutoRespConfig)
     *   ->withID(...)
     *   ->withCountryCode(...)
     *   ->withCreatedAt(...)
     *   ->withKeywords(...)
     *   ->withOp(...)
     *   ->withUpdatedAt(...)
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
        string $id,
        string $country_code,
        \DateTimeInterface $created_at,
        array $keywords,
        Op|string $op,
        \DateTimeInterface $updated_at,
        ?string $resp_text = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->country_code = $country_code;
        $obj->created_at = $created_at;
        $obj->keywords = $keywords;
        $obj['op'] = $op;
        $obj->updated_at = $updated_at;

        null !== $resp_text && $obj->resp_text = $resp_text;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

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

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    public function withRespText(string $respText): self
    {
        $obj = clone $this;
        $obj->resp_text = $respText;

        return $obj;
    }
}
