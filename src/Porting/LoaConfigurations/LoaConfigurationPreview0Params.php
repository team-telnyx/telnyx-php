<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Address;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Contact;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Logo;

/**
 * Preview the LOA template that would be generated without need to create LOA configuration.
 *
 * @see Telnyx\Services\Porting\LoaConfigurationsService::preview0()
 *
 * @phpstan-type LoaConfigurationPreview0ParamsShape = array{
 *   address: Address|array{
 *     city: string,
 *     countryCode: string,
 *     state: string,
 *     streetAddress: string,
 *     zipCode: string,
 *     extendedAddress?: string|null,
 *   },
 *   companyName: string,
 *   contact: Contact|array{email: string, phoneNumber: string},
 *   logo: Logo|array{documentID: string},
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
     * `new LoaConfigurationPreview0Params()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LoaConfigurationPreview0Params::with(
     *   address: ..., companyName: ..., contact: ..., logo: ..., name: ...
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
     *
     * @param Address|array{
     *   city: string,
     *   countryCode: string,
     *   state: string,
     *   streetAddress: string,
     *   zipCode: string,
     *   extendedAddress?: string|null,
     * } $address
     * @param Contact|array{email: string, phoneNumber: string} $contact
     * @param Logo|array{documentID: string} $logo
     */
    public static function with(
        Address|array $address,
        string $companyName,
        Contact|array $contact,
        Logo|array $logo,
        string $name,
    ): self {
        $obj = new self;

        $obj['address'] = $address;
        $obj['companyName'] = $companyName;
        $obj['contact'] = $contact;
        $obj['logo'] = $logo;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The address of the company.
     *
     * @param Address|array{
     *   city: string,
     *   countryCode: string,
     *   state: string,
     *   streetAddress: string,
     *   zipCode: string,
     *   extendedAddress?: string|null,
     * } $address
     */
    public function withAddress(Address|array $address): self
    {
        $obj = clone $this;
        $obj['address'] = $address;

        return $obj;
    }

    /**
     * The name of the company.
     */
    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj['companyName'] = $companyName;

        return $obj;
    }

    /**
     * The contact information of the company.
     *
     * @param Contact|array{email: string, phoneNumber: string} $contact
     */
    public function withContact(Contact|array $contact): self
    {
        $obj = clone $this;
        $obj['contact'] = $contact;

        return $obj;
    }

    /**
     * The logo of the LOA configuration.
     *
     * @param Logo|array{documentID: string} $logo
     */
    public function withLogo(Logo|array $logo): self
    {
        $obj = clone $this;
        $obj['logo'] = $logo;

        return $obj;
    }

    /**
     * The name of the LOA configuration.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
