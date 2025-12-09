<?php

declare(strict_types=1);

namespace Telnyx\Verifications\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Verifications\Actions\ActionVerifyParams\Status;

/**
 * Verify verification code by ID.
 *
 * @see Telnyx\Services\Verifications\ActionsService::verify()
 *
 * @phpstan-type ActionVerifyParamsShape = array{
 *   code?: string, status?: Status|value-of<Status>
 * }
 */
final class ActionVerifyParams implements BaseModel
{
    /** @use SdkModel<ActionVerifyParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * This is the code the user submits for verification.
     */
    #[Optional]
    public ?string $code;

    /**
     * Identifies if the verification code has been accepted or rejected. Only permitted if custom_code was used for the verification.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $code = null,
        Status|string|null $status = null
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * This is the code the user submits for verification.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * Identifies if the verification code has been accepted or rejected. Only permitted if custom_code was used for the verification.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
