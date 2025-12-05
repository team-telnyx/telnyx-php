<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Address;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Contact;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Logo;

/**
 * Create a LOA configuration.
 *
 * @see Telnyx\Services\Porting\LoaConfigurationsService::create()
 *
 * @phpstan-type LoaConfigurationCreateParamsShape = array{
 *   address: Address|array{
 *     city: string,
 *     country_code: string,
 *     state: string,
 *     street_address: string,
 *     zip_code: string,
 *     extended_address?: string|null,
 *   },
 *   company_name: string,
 *   contact: Contact|array{email: string, phone_number: string},
 *   logo: Logo|array{document_id: string},
 *   name: string,
 * }
 */
final class LoaConfigurationCreateParams implements BaseModel
{
    /** @use SdkModel<LoaConfigurationCreateParamsShape> */
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
     * `new LoaConfigurationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LoaConfigurationCreateParams::with(
     *   address: ..., company_name: ..., contact: ..., logo: ..., name: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LoaConfigurationCreateParams)
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
     *   country_code: string,
     *   state: string,
     *   street_address: string,
     *   zip_code: string,
     *   extended_address?: string|null,
     * } $address
     * @param Contact|array{email: string, phone_number: string} $contact
     * @param Logo|array{document_id: string} $logo
     */
    public static function with(
        Address|array $address,
        string $company_name,
        Contact|array $contact,
        Logo|array $logo,
        string $name,
    ): self {
        $obj = new self;

        $obj['address'] = $address;
        $obj['company_name'] = $company_name;
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
     *   country_code: string,
     *   state: string,
     *   street_address: string,
     *   zip_code: string,
     *   extended_address?: string|null,
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
        $obj['company_name'] = $companyName;

        return $obj;
    }

    /**
     * The contact information of the company.
     *
     * @param Contact|array{email: string, phone_number: string} $contact
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
     * @param Logo|array{document_id: string} $logo
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
