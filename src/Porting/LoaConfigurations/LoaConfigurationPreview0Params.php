<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Address;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Contact;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Logo;

/**
 * Preview the LOA template that would be generated without need to create LOA configuration.
 *
 * @see Telnyx\Porting\LoaConfigurations->preview0
 *
 * @phpstan-type LoaConfigurationPreview0ParamsShape = array{
 *   address: Address,
 *   company_name: string,
 *   contact: Contact,
 *   logo: Logo,
 *   name: string,
 * }
 */
final class LoaConfigurationPreview0Params implements BaseModel
{
    /** @use SdkModel<LoaConfigurationPreview0ParamsShape> */
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
     * `new LoaConfigurationPreview0Params()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LoaConfigurationPreview0Params::with(
     *   address: ..., company_name: ..., contact: ..., logo: ..., name: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LoaConfigurationPreview0Params)
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
