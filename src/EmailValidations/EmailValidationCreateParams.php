<?php

declare(strict_types=1);

namespace Telnyx\EmailValidations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Validates a single email address and returns deliverability checks.
 *
 * @see Telnyx\Services\EmailValidationsService::create()
 *
 * @phpstan-type EmailValidationCreateParamsShape = array{
 *   email: string, idempotencyKey?: string|null
 * }
 */
final class EmailValidationCreateParams implements BaseModel
{
    /** @use SdkModel<EmailValidationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Email address to validate. Any non-empty string is accepted; invalid syntax returns valid=false rather than a request error.
     */
    #[Required]
    public string $email;

    #[Optional]
    public ?string $idempotencyKey;

    /**
     * `new EmailValidationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailValidationCreateParams::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailValidationCreateParams)->withEmail(...)
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
        string $email,
        ?string $idempotencyKey = null
    ): self {
        $self = new self;

        $self['email'] = $email;

        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * Email address to validate. Any non-empty string is accepted; invalid syntax returns valid=false rather than a request error.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }
}
