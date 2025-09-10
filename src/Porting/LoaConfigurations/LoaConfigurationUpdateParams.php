<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Address;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Contact;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Logo;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new LoaConfigurationUpdateParams); // set properties as needed
 * $client->porting.loaConfigurations->update(...$params->toArray());
 * ```
 * Update a specific LOA configuration.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->porting.loaConfigurations->update(...$params->toArray());`
 *
 * @see Telnyx\Porting\LoaConfigurations->update
 *
 * @phpstan-type loa_configuration_update_params = array{
 *   address: Address,
 *   companyName: string,
 *   contact: Contact,
 *   logo: Logo,
 *   name: string,
 * }
 */
final class LoaConfigurationUpdateParams implements BaseModel
{
    /** @use SdkModel<loa_configuration_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The address of the company.
     */
    #[Api]
    public Address $address;

    /**
     * The name of the company.
     */
    #[Api('company_name')]
    public string $companyName;

    /**
     * The contact information of the company.
     */
    #[Api]
    public Contact $contact;

    /**
     * The logo of the LOA configuration.
     */
    #[Api]
    public Logo $logo;

    /**
     * The name of the LOA configuration.
     */
    #[Api]
    public string $name;

    /**
     * `new LoaConfigurationUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LoaConfigurationUpdateParams::with(
     *   address: ..., companyName: ..., contact: ..., logo: ..., name: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LoaConfigurationUpdateParams)
     *   ->withAddress(...)
     *   ->withCompanyName(...)
     *   ->withContact(...)
     *   ->withLogo(...)
     *   ->withName(...)
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
    public static function with(
        Address $address,
        string $companyName,
        Contact $contact,
        Logo $logo,
        string $name,
    ): self {
        $obj = new self;

        $obj->address = $address;
        $obj->companyName = $companyName;
        $obj->contact = $contact;
        $obj->logo = $logo;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The address of the company.
     */
    public function withAddress(Address $address): self
    {
        $obj = clone $this;
        $obj->address = $address;

        return $obj;
    }

    /**
     * The name of the company.
     */
    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj->companyName = $companyName;

        return $obj;
    }

    /**
     * The contact information of the company.
     */
    public function withContact(Contact $contact): self
    {
        $obj = clone $this;
        $obj->contact = $contact;

        return $obj;
    }

    /**
     * The logo of the LOA configuration.
     */
    public function withLogo(Logo $logo): self
    {
        $obj = clone $this;
        $obj->logo = $logo;

        return $obj;
    }

    /**
     * The name of the LOA configuration.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
