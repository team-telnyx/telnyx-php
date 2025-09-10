<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams\PhoneNumberConfiguration;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PhoneNumberConfigurationCreateParams); // set properties as needed
 * $client->portingOrders.phoneNumberConfigurations->create(...$params->toArray());
 * ```
 * Creates a list of phone number configurations.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders.phoneNumberConfigurations->create(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders\PhoneNumberConfigurations->create
 *
 * @phpstan-type phone_number_configuration_create_params = array{
 *   phoneNumberConfigurations?: list<PhoneNumberConfiguration>
 * }
 */
final class PhoneNumberConfigurationCreateParams implements BaseModel
{
    /** @use SdkModel<phone_number_configuration_create_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<PhoneNumberConfiguration>|null $phoneNumberConfigurations */
    #[Api(
        'phone_number_configurations',
        list: PhoneNumberConfiguration::class,
        optional: true,
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
     * @param list<PhoneNumberConfiguration> $phoneNumberConfigurations
     */
    public static function with(?array $phoneNumberConfigurations = null): self
    {
        $obj = new self;

        null !== $phoneNumberConfigurations && $obj->phoneNumberConfigurations = $phoneNumberConfigurations;

        return $obj;
    }

    /**
     * @param list<PhoneNumberConfiguration> $phoneNumberConfigurations
     */
    public function withPhoneNumberConfigurations(
        array $phoneNumberConfigurations
    ): self {
        $obj = clone $this;
        $obj->phoneNumberConfigurations = $phoneNumberConfigurations;

        return $obj;
    }
}
