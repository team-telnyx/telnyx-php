<?php

declare(strict_types=1);

namespace Telnyx\EmailValidations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmailValidationCheckShape = array{
 *   pass: bool, details?: string|null
 * }
 */
final class EmailValidationCheck implements BaseModel
{
    /** @use SdkModel<EmailValidationCheckShape> */
    use SdkModel;

    #[Required]
    public bool $pass;

    /**
     * Human-readable check detail. Omitted when nil.
     */
    #[Optional]
    public ?string $details;

    /**
     * `new EmailValidationCheck()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailValidationCheck::with(pass: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailValidationCheck)->withPass(...)
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
    public static function with(bool $pass, ?string $details = null): self
    {
        $self = new self;

        $self['pass'] = $pass;

        null !== $details && $self['details'] = $details;

        return $self;
    }

    public function withPass(bool $pass): self
    {
        $self = clone $this;
        $self['pass'] = $pass;

        return $self;
    }

    /**
     * Human-readable check detail. Omitted when nil.
     */
    public function withDetails(string $details): self
    {
        $self = clone $this;
        $self['details'] = $details;

        return $self;
    }
}
