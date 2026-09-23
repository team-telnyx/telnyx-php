<?php

declare(strict_types=1);

namespace Telnyx\BotSignup;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Status envelope used by the signup and magic-link flows.
 *
 * @phpstan-type SuccessResponseShape = array{message: string, success: bool}
 */
final class SuccessResponse implements BaseModel
{
    /** @use SdkModel<SuccessResponseShape> */
    use SdkModel;

    /**
     * Human-readable status message.
     */
    #[Required]
    public string $message;

    /**
     * Whether the request was accepted.
     */
    #[Required]
    public bool $success;

    /**
     * `new SuccessResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SuccessResponse::with(message: ..., success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SuccessResponse)->withMessage(...)->withSuccess(...)
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
    public static function with(string $message, bool $success): self
    {
        $self = new self;

        $self['message'] = $message;
        $self['success'] = $success;

        return $self;
    }

    /**
     * Human-readable status message.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * Whether the request was accepted.
     */
    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
