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
 * Update a specific LOA configuration.
 *
 * @see Telnyx\Services\Porting\LoaConfigurationsService::update()
 *
 * @phpstan-type LoaConfigurationUpdateParamsShape = array{
 *   address: Address,
 *   company_name: string,
 *   contact: Contact,
 *   logo: Logo,
 *   name: string,
 * }
 */
final class LoaConfigurationUpdateParams implements BaseModel
{
    /** @use SdkModel<LoaConfigurationUpdateParamsShape> */
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
    #[Api]
    public string $company_name;

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
     *   address: ..., company_name: ..., contact: ..., logo: ..., name: ...
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
        string $company_name,
        Contact $contact,
        Logo $logo,
        string $name,
    ): self {
        $obj = new self;

        $obj->address = $address;
        $obj->company_name = $company_name;
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
        $obj->company_name = $companyName;

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
