<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations;

use Telnyx\Core\Attributes\Required;
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
 * @phpstan-import-type AddressShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Address
 * @phpstan-import-type ContactShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Contact
 * @phpstan-import-type LogoShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Logo
 *
 * @phpstan-type LoaConfigurationUpdateParamsShape = array{
 *   address: AddressShape,
 *   companyName: string,
 *   contact: ContactShape,
 *   logo: LogoShape,
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
    #[Required]
    public Address $address;

    /**
     * The name of the company.
     */
    #[Required('company_name')]
    public string $companyName;

    /**
     * The contact information of the company.
     */
    #[Required]
    public Contact $contact;

    /**
     * The logo of the LOA configuration.
     */
    #[Required]
    public Logo $logo;

    /**
     * The name of the LOA configuration.
     */
    #[Required]
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
     *
     * @param AddressShape $address
     * @param ContactShape $contact
     * @param LogoShape $logo
     */
    public static function with(
        Address|array $address,
        string $companyName,
        Contact|array $contact,
        Logo|array $logo,
        string $name,
    ): self {
        $self = new self;

        $self['address'] = $address;
        $self['companyName'] = $companyName;
        $self['contact'] = $contact;
        $self['logo'] = $logo;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The address of the company.
     *
     * @param AddressShape $address
     */
    public function withAddress(Address|array $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * The name of the company.
     */
    public function withCompanyName(string $companyName): self
    {
        $self = clone $this;
        $self['companyName'] = $companyName;

        return $self;
    }

    /**
     * The contact information of the company.
     *
     * @param ContactShape $contact
     */
    public function withContact(Contact|array $contact): self
    {
        $self = clone $this;
        $self['contact'] = $contact;

        return $self;
    }

    /**
     * The logo of the LOA configuration.
     *
     * @param LogoShape $logo
     */
    public function withLogo(Logo|array $logo): self
    {
        $self = clone $this;
        $self['logo'] = $logo;

        return $self;
    }

    /**
     * The name of the LOA configuration.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
