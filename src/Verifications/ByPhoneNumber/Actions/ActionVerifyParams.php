<?php

declare(strict_types=1);

namespace Telnyx\Verifications\ByPhoneNumber\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Verify verification code by phone number.
 *
 * @see Telnyx\Services\Verifications\ByPhoneNumber\ActionsService::verify()
 *
 * @phpstan-type ActionVerifyParamsShape = array{
 *   code: string, verifyProfileID: string
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
    #[Required]
    public string $code;

    /**
     * The identifier of the associated Verify profile.
     */
    #[Required('verify_profile_id')]
    public string $verifyProfileID;

    /**
     * `new ActionVerifyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionVerifyParams::with(code: ..., verifyProfileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionVerifyParams)->withCode(...)->withVerifyProfileID(...)
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
    public static function with(string $code, string $verifyProfileID): self
    {
        $self = new self;

        $self['code'] = $code;
        $self['verifyProfileID'] = $verifyProfileID;

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
     * The identifier of the associated Verify profile.
     */
    public function withVerifyProfileID(string $verifyProfileID): self
    {
        $self = clone $this;
        $self['verifyProfileID'] = $verifyProfileID;

        return $self;
    }
}
