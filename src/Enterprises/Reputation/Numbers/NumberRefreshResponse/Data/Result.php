<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers\NumberRefreshResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ResultShape = array{
 *   phoneNumber: string, success: bool, error?: string|null
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    #[Required('phone_number')]
    public string $phoneNumber;

    #[Required]
    public bool $success;

    /**
     * `null` when `success` is `true`; carries an error message otherwise.
     */
    #[Optional(nullable: true)]
    public ?string $error;

    /**
     * `new Result()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Result::with(phoneNumber: ..., success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Result)->withPhoneNumber(...)->withSuccess(...)
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
     */
    public static function with(
        string $phoneNumber,
        bool $success,
        ?string $error = null
    ): self {
        $self = new self;

        $self['phoneNumber'] = $phoneNumber;
        $self['success'] = $success;

        null !== $error && $self['error'] = $error;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }

    /**
     * `null` when `success` is `true`; carries an error message otherwise.
     */
    public function withError(?string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }
}
