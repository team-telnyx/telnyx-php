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
 * @see Telnyx\Services\SimCards\ActionsService::validateRegistrationCodes()
 *
 * @phpstan-type ActionValidateRegistrationCodesParamsShape = array{
 *   registration_codes?: list<string>
 * }
 */
final class ActionValidateRegistrationCodesParams implements BaseModel
{
    /** @use SdkModel<ActionValidateRegistrationCodesParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string>|null $registration_codes */
    #[Api(list: 'string', optional: true)]
    public ?array $registration_codes;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $registration_codes
     */
    public static function with(?array $registration_codes = null): self
    {
        $obj = new self;

        null !== $registration_codes && $obj['registration_codes'] = $registration_codes;

        return $obj;
    }

    /**
     * @param list<string> $registrationCodes
     */
    public function withRegistrationCodes(array $registrationCodes): self
    {
        $obj = clone $this;
        $obj['registration_codes'] = $registrationCodes;

        return $obj;
    }
}
