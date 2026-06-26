<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumbers\PhoneNumberDeleteAllResponse\Meta;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\PhoneNumbers\PhoneNumberDeleteAllResponse\Meta\Error\Code;

/**
 * Per-number error returned by the bulk-delete endpoint. Bulk-add does not use this shape - it returns a 400 with the canonical envelope grouping numbers by failure category.
 *
 * @phpstan-type ErrorShape = array{
 *   code: Code|value-of<Code>, detail: string, phoneNumber: string, title: string
 * }
 */
final class Error implements BaseModel
{
    /** @use SdkModel<ErrorShape> */
    use SdkModel;

    /**
     * Stable per-number error code. Currently only `not_associated` is emitted, when the number is not attached to this DIR.
     *
     * @var value-of<Code> $code
     */
    #[Required(enum: Code::class)]
    public string $code;

    #[Required]
    public string $detail;

    #[Required('phone_number')]
    public string $phoneNumber;

    #[Required]
    public string $title;

    /**
     * `new Error()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Error::with(code: ..., detail: ..., phoneNumber: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Error)
     *   ->withCode(...)
     *   ->withDetail(...)
     *   ->withPhoneNumber(...)
     *   ->withTitle(...)
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
     * @param Code|value-of<Code> $code
     */
    public static function with(
        Code|string $code,
        string $detail,
        string $phoneNumber,
        string $title
    ): self {
        $self = new self;

        $self['code'] = $code;
        $self['detail'] = $detail;
        $self['phoneNumber'] = $phoneNumber;
        $self['title'] = $title;

        return $self;
    }

    /**
     * Stable per-number error code. Currently only `not_associated` is emitted, when the number is not attached to this DIR.
     *
     * @param Code|value-of<Code> $code
     */
    public function withCode(Code|string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withDetail(string $detail): self
    {
        $self = clone $this;
        $self['detail'] = $detail;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
