<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations;

use Telnyx\Core\Attributes\Api;
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
 *   phone_number_configurations?: list<PhoneNumberConfiguration|array{
 *     porting_phone_number_id: string, user_bundle_id: string
 *   }>,
 * }
 */
final class PhoneNumberConfigurationCreateParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberConfigurationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PhoneNumberConfiguration>|null $phone_number_configurations */
    #[Api(list: PhoneNumberConfiguration::class, optional: true)]
    public ?array $phone_number_configurations;

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
     *   porting_phone_number_id: string, user_bundle_id: string
     * }> $phone_number_configurations
     */
    public static function with(?array $phone_number_configurations = null): self
    {
        $obj = new self;

        null !== $phone_number_configurations && $obj['phone_number_configurations'] = $phone_number_configurations;

        return $obj;
    }

    /**
     * @param list<PhoneNumberConfiguration|array{
     *   porting_phone_number_id: string, user_bundle_id: string
     * }> $phoneNumberConfigurations
     */
    public function withPhoneNumberConfigurations(
        array $phoneNumberConfigurations
    ): self {
        $obj = clone $this;
        $obj['phone_number_configurations'] = $phoneNumberConfigurations;

        return $obj;
    }
}
