<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * It validates whether SIM card registration codes are valid or not.
 *
 * @see Telnyx\Services\SimCards\ActionsService::validateRegistrationCodes()
 *
 * @phpstan-type ActionValidateRegistrationCodesParamsShape = array{
 *   registrationCodes?: list<string>|null
 * }
 */
final class ActionValidateRegistrationCodesParams implements BaseModel
{
    /** @use SdkModel<ActionValidateRegistrationCodesParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string>|null $registrationCodes */
    #[Optional('registration_codes', list: 'string')]
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
     * @param list<string>|null $registrationCodes
     */
    public static function with(?array $registrationCodes = null): self
    {
        $self = new self;

        null !== $registrationCodes && $self['registrationCodes'] = $registrationCodes;

        return $self;
    }

    /**
     * @param list<string> $registrationCodes
     */
    public function withRegistrationCodes(array $registrationCodes): self
    {
        $self = clone $this;
        $self['registrationCodes'] = $registrationCodes;

        return $self;
    }
}
