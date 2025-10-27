<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * It validates whether SIM card registration codes are valid or not.
 *
 * @see Telnyx\SimCards\Actions->validateRegistrationCodes
 *
 * @phpstan-type action_validate_registration_codes_params = array{
 *   registrationCodes?: list<string>
 * }
 */
final class ActionValidateRegistrationCodesParams implements BaseModel
{
    /** @use SdkModel<action_validate_registration_codes_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<string>|null $registrationCodes */
    #[Api('registration_codes', list: 'string', optional: true)]
    public ?array $registrationCodes;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $registrationCodes
     */
    public static function with(?array $registrationCodes = null): self
    {
        $obj = new self;

        null !== $registrationCodes && $obj->registrationCodes = $registrationCodes;

        return $obj;
    }

    /**
     * @param list<string> $registrationCodes
     */
    public function withRegistrationCodes(array $registrationCodes): self
    {
        $obj = clone $this;
        $obj->registrationCodes = $registrationCodes;

        return $obj;
    }
}
