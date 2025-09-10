<?php

declare(strict_types=1);

namespace Telnyx\Verifications\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Verifications\Actions\ActionVerifyParams\Status;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionVerifyParams); // set properties as needed
 * $client->verifications.actions->verify(...$params->toArray());
 * ```
 * Verify verification code by ID.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->verifications.actions->verify(...$params->toArray());`
 *
 * @see Telnyx\Verifications\Actions->verify
 *
 * @phpstan-type action_verify_params = array{
 *   code?: string, status?: Status|value-of<Status>
 * }
 */
final class ActionVerifyParams implements BaseModel
{
    /** @use SdkModel<action_verify_params> */
    use SdkModel;
    use SdkParams;

    /**
     * This is the code the user submits for verification.
     */
    #[Api(optional: true)]
    public ?string $code;

    /**
     * Identifies if the verification code has been accepted or rejected. Only permitted if custom_code was used for the verification.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
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
        $obj = new self;

        null !== $code && $obj->code = $code;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * This is the code the user submits for verification.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * Identifies if the verification code has been accepted or rejected. Only permitted if custom_code was used for the verification.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }
}
