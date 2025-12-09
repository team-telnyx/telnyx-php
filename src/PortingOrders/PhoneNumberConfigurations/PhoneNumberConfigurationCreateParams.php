<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams\PhoneNumberConfiguration;

/**
 * Creates a list of phone number configurations.
 *
 * @see Telnyx\Services\PortingOrders\PhoneNumberConfigurationsService::create()
 *
 * @phpstan-type PhoneNumberConfigurationCreateParamsShape = array{
 *   phoneNumberConfigurations?: list<PhoneNumberConfiguration|array{
 *     portingPhoneNumberID: string, userBundleID: string
 *   }>,
 * }
 */
final class PhoneNumberConfigurationCreateParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberConfigurationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PhoneNumberConfiguration>|null $phoneNumberConfigurations */
    #[Optional(
        'phone_number_configurations',
        list: PhoneNumberConfiguration::class
    )]
    public ?array $phoneNumberConfigurations;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PhoneNumberConfiguration|array{
     *   portingPhoneNumberID: string, userBundleID: string
     * }> $phoneNumberConfigurations
     */
    public static function with(?array $phoneNumberConfigurations = null): self
    {
        $self = new self;

        null !== $phoneNumberConfigurations && $self['phoneNumberConfigurations'] = $phoneNumberConfigurations;

        return $self;
    }

    /**
     * @param list<PhoneNumberConfiguration|array{
     *   portingPhoneNumberID: string, userBundleID: string
     * }> $phoneNumberConfigurations
     */
    public function withPhoneNumberConfigurations(
        array $phoneNumberConfigurations
    ): self {
        $self = clone $this;
        $self['phoneNumberConfigurations'] = $phoneNumberConfigurations;

        return $self;
    }
}
