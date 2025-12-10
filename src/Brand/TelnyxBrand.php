<?php

declare(strict_types=1);

namespace Telnyx\Brand;

use Telnyx\Brand\TelnyxBrand\BrandRelationship;
use Telnyx\Brand\TelnyxBrand\OptionalAttributes;
use Telnyx\Brand\TelnyxBrand\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Telnyx-specific extensions to The Campaign Registry's `Brand` type.
 *
 * @phpstan-type TelnyxBrandShape = array{
 *   brandRelationship: value-of<BrandRelationship>,
 *   country: string,
 *   displayName: string,
 *   email: string,
 *   entityType: value-of<EntityType>,
 *   vertical: string,
 *   altBusinessID?: string|null,
 *   altBusinessIDType?: value-of<AltBusinessIDType>|null,
 *   brandID?: string|null,
 *   businessContactEmail?: string|null,
 *   city?: string|null,
 *   companyName?: string|null,
 *   createdAt?: string|null,
 *   cspID?: string|null,
 *   ein?: string|null,
 *   failureReasons?: string|null,
 *   firstName?: string|null,
 *   identityStatus?: value-of<BrandIdentityStatus>|null,
 *   ipAddress?: string|null,
 *   isReseller?: bool|null,
 *   lastName?: string|null,
 *   mobilePhone?: string|null,
 *   mock?: bool|null,
 *   optionalAttributes?: OptionalAttributes|null,
 *   phone?: string|null,
 *   postalCode?: string|null,
 *   referenceID?: string|null,
 *   state?: string|null,
 *   status?: value-of<Status>|null,
 *   stockExchange?: value-of<StockExchange>|null,
 *   stockSymbol?: string|null,
 *   street?: string|null,
 *   tcrBrandID?: string|null,
 *   universalEin?: string|null,
 *   updatedAt?: string|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 *   website?: string|null,
 * }
 */
final class TelnyxBrand implements BaseModel
{
    /** @use SdkModel<TelnyxBrandShape> */
    use SdkModel;

    /**
     * Brand relationship to the CSP.
     *
     * @var value-of<BrandRelationship> $brandRelationship
     */
    #[Required(enum: BrandRelationship::class)]
    public string $brandRelationship;

    /**
     * ISO2 2 characters country code. Example: US - United States.
     */
    #[Required]
    public string $country;

    /**
     * Display or marketing name of the brand.
     */
    #[Required]
    public string $displayName;

    /**
     * Valid email address of brand support contact.
     */
    #[Required]
    public string $email;

    /**
     * Entity type behind the brand. This is the form of business establishment.
     *
     * @var value-of<EntityType> $entityType
     */
    #[Required(enum: EntityType::class)]
    public string $entityType;

    /**
     * Vertical or industry segment of the brand.
     */
    #[Required]
    public string $vertical;

    /**
     * Alternate business identifier such as DUNS, LEI, or GIIN.
     */
    #[Optional('altBusinessId')]
    public ?string $altBusinessID;

    /**
     * An enumeration.
     *
     * @var value-of<AltBusinessIDType>|null $altBusinessIDType
     */
    #[Optional('altBusinessIdType', enum: AltBusinessIDType::class)]
    public ?string $altBusinessIDType;

    /**
     * Unique identifier assigned to the brand.
     */
    #[Optional('brandId')]
    public ?string $brandID;

    /**
     * Business contact email.
     *
     * Required if `entityType` is `PUBLIC_PROFIT`.
     */
    #[Optional]
    public ?string $businessContactEmail;

    /**
     * City name.
     */
    #[Optional]
    public ?string $city;

    /**
     * (Required for Non-profit/private/public) Legal company name.
     */
    #[Optional]
    public ?string $companyName;

    /**
     * Date and time that the brand was created at.
     */
    #[Optional]
    public ?string $createdAt;

    /**
     * Unique identifier assigned to the csp by the registry.
     */
    #[Optional('cspId')]
    public ?string $cspID;

    /**
     * (Required for Non-profit) Government assigned corporate tax ID. EIN is 9-digits in U.S.
     */
    #[Optional]
    public ?string $ein;

    /**
     * Failure reasons for brand.
     */
    #[Optional]
    public ?string $failureReasons;

    /**
     * First name of business contact.
     */
    #[Optional]
    public ?string $firstName;

    /**
     * The verification status of an active brand.
     *
     * @var value-of<BrandIdentityStatus>|null $identityStatus
     */
    #[Optional(enum: BrandIdentityStatus::class)]
    public ?string $identityStatus;

    /**
     * IP address of the browser requesting to create brand identity.
     */
    #[Optional]
    public ?string $ipAddress;

    /**
     * Indicates whether this brand is known to be a reseller.
     */
    #[Optional]
    public ?bool $isReseller;

    /**
     * Last name of business contact.
     */
    #[Optional]
    public ?string $lastName;

    /**
     * Valid mobile phone number in e.164 international format.
     */
    #[Optional]
    public ?string $mobilePhone;

    /**
     * Mock brand for testing purposes.
     */
    #[Optional]
    public ?bool $mock;

    #[Optional]
    public ?OptionalAttributes $optionalAttributes;

    /**
     * Valid phone number in e.164 international format.
     */
    #[Optional]
    public ?string $phone;

    /**
     * Postal codes. Use 5 digit zipcode for United States.
     */
    #[Optional]
    public ?string $postalCode;

    /**
     * Unique identifier Telnyx assigned to the brand - the brandId.
     */
    #[Optional('referenceId')]
    public ?string $referenceID;

    /**
     * State. Must be 2 letters code for United States.
     */
    #[Optional]
    public ?string $state;

    /**
     * Status of the brand.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * (Required for public company) stock exchange.
     *
     * @var value-of<StockExchange>|null $stockExchange
     */
    #[Optional(enum: StockExchange::class)]
    public ?string $stockExchange;

    /**
     * (Required for public company) stock symbol.
     */
    #[Optional]
    public ?string $stockSymbol;

    /**
     * Street number and name.
     */
    #[Optional]
    public ?string $street;

    /**
     * Unique identifier assigned to the brand by the registry.
     */
    #[Optional('tcrBrandId')]
    public ?string $tcrBrandID;

    /**
     * Universal EIN of Brand, Read Only.
     */
    #[Optional]
    public ?string $universalEin;

    /**
     * Date and time that the brand was last updated at.
     */
    #[Optional]
    public ?string $updatedAt;

    /**
     * Failover webhook to which brand status updates are sent.
     */
    #[Optional]
    public ?string $webhookFailoverURL;

    /**
     * Webhook to which brand status updates are sent.
     */
    #[Optional]
    public ?string $webhookURL;

    /**
     * Brand website URL.
     */
    #[Optional]
    public ?string $website;

    /**
     * `new TelnyxBrand()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TelnyxBrand::with(
     *   brandRelationship: ...,
     *   country: ...,
     *   displayName: ...,
     *   email: ...,
     *   entityType: ...,
     *   vertical: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TelnyxBrand)
     *   ->withBrandRelationship(...)
     *   ->withCountry(...)
     *   ->withDisplayName(...)
     *   ->withEmail(...)
     *   ->withEntityType(...)
     *   ->withVertical(...)
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
     * @param BrandRelationship|value-of<BrandRelationship> $brandRelationship
     * @param EntityType|value-of<EntityType> $entityType
     * @param AltBusinessIDType|value-of<AltBusinessIDType> $altBusinessIDType
     * @param BrandIdentityStatus|value-of<BrandIdentityStatus> $identityStatus
     * @param OptionalAttributes|array{
     *   taxExemptStatus?: string|null
     * } $optionalAttributes
     * @param Status|value-of<Status> $status
     * @param StockExchange|value-of<StockExchange> $stockExchange
     */
    public static function with(
        BrandRelationship|string $brandRelationship,
        string $country,
        string $displayName,
        string $email,
        EntityType|string $entityType,
        string $vertical,
        ?string $altBusinessID = null,
        AltBusinessIDType|string|null $altBusinessIDType = null,
        ?string $brandID = null,
        ?string $businessContactEmail = null,
        ?string $city = null,
        ?string $companyName = null,
        ?string $createdAt = null,
        ?string $cspID = null,
        ?string $ein = null,
        ?string $failureReasons = null,
        ?string $firstName = null,
        BrandIdentityStatus|string|null $identityStatus = null,
        ?string $ipAddress = null,
        ?bool $isReseller = null,
        ?string $lastName = null,
        ?string $mobilePhone = null,
        ?bool $mock = null,
        OptionalAttributes|array|null $optionalAttributes = null,
        ?string $phone = null,
        ?string $postalCode = null,
        ?string $referenceID = null,
        ?string $state = null,
        Status|string|null $status = null,
        StockExchange|string|null $stockExchange = null,
        ?string $stockSymbol = null,
        ?string $street = null,
        ?string $tcrBrandID = null,
        ?string $universalEin = null,
        ?string $updatedAt = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?string $website = null,
    ): self {
        $self = new self;

        $self['brandRelationship'] = $brandRelationship;
        $self['country'] = $country;
        $self['displayName'] = $displayName;
        $self['email'] = $email;
        $self['entityType'] = $entityType;
        $self['vertical'] = $vertical;

        null !== $altBusinessID && $self['altBusinessID'] = $altBusinessID;
        null !== $altBusinessIDType && $self['altBusinessIDType'] = $altBusinessIDType;
        null !== $brandID && $self['brandID'] = $brandID;
        null !== $businessContactEmail && $self['businessContactEmail'] = $businessContactEmail;
        null !== $city && $self['city'] = $city;
        null !== $companyName && $self['companyName'] = $companyName;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $cspID && $self['cspID'] = $cspID;
        null !== $ein && $self['ein'] = $ein;
        null !== $failureReasons && $self['failureReasons'] = $failureReasons;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $identityStatus && $self['identityStatus'] = $identityStatus;
        null !== $ipAddress && $self['ipAddress'] = $ipAddress;
        null !== $isReseller && $self['isReseller'] = $isReseller;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $mobilePhone && $self['mobilePhone'] = $mobilePhone;
        null !== $mock && $self['mock'] = $mock;
        null !== $optionalAttributes && $self['optionalAttributes'] = $optionalAttributes;
        null !== $phone && $self['phone'] = $phone;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $referenceID && $self['referenceID'] = $referenceID;
        null !== $state && $self['state'] = $state;
        null !== $status && $self['status'] = $status;
        null !== $stockExchange && $self['stockExchange'] = $stockExchange;
        null !== $stockSymbol && $self['stockSymbol'] = $stockSymbol;
        null !== $street && $self['street'] = $street;
        null !== $tcrBrandID && $self['tcrBrandID'] = $tcrBrandID;
        null !== $universalEin && $self['universalEin'] = $universalEin;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;
        null !== $website && $self['website'] = $website;

        return $self;
    }

    /**
     * Brand relationship to the CSP.
     *
     * @param BrandRelationship|value-of<BrandRelationship> $brandRelationship
     */
    public function withBrandRelationship(
        BrandRelationship|string $brandRelationship
    ): self {
        $self = clone $this;
        $self['brandRelationship'] = $brandRelationship;

        return $self;
    }

    /**
     * ISO2 2 characters country code. Example: US - United States.
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * Display or marketing name of the brand.
     */
    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * Valid email address of brand support contact.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Entity type behind the brand. This is the form of business establishment.
     *
     * @param EntityType|value-of<EntityType> $entityType
     */
    public function withEntityType(EntityType|string $entityType): self
    {
        $self = clone $this;
        $self['entityType'] = $entityType;

        return $self;
    }

    /**
     * Vertical or industry segment of the brand.
     */
    public function withVertical(string $vertical): self
    {
        $self = clone $this;
        $self['vertical'] = $vertical;

        return $self;
    }

    /**
     * Alternate business identifier such as DUNS, LEI, or GIIN.
     */
    public function withAltBusinessID(string $altBusinessID): self
    {
        $self = clone $this;
        $self['altBusinessID'] = $altBusinessID;

        return $self;
    }

    /**
     * An enumeration.
     *
     * @param AltBusinessIDType|value-of<AltBusinessIDType> $altBusinessIDType
     */
    public function withAltBusinessIDType(
        AltBusinessIDType|string $altBusinessIDType
    ): self {
        $self = clone $this;
        $self['altBusinessIDType'] = $altBusinessIDType;

        return $self;
    }

    /**
     * Unique identifier assigned to the brand.
     */
    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * Business contact email.
     *
     * Required if `entityType` is `PUBLIC_PROFIT`.
     */
    public function withBusinessContactEmail(string $businessContactEmail): self
    {
        $self = clone $this;
        $self['businessContactEmail'] = $businessContactEmail;

        return $self;
    }

    /**
     * City name.
     */
    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * (Required for Non-profit/private/public) Legal company name.
     */
    public function withCompanyName(string $companyName): self
    {
        $self = clone $this;
        $self['companyName'] = $companyName;

        return $self;
    }

    /**
     * Date and time that the brand was created at.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Unique identifier assigned to the csp by the registry.
     */
    public function withCspID(string $cspID): self
    {
        $self = clone $this;
        $self['cspID'] = $cspID;

        return $self;
    }

    /**
     * (Required for Non-profit) Government assigned corporate tax ID. EIN is 9-digits in U.S.
     */
    public function withEin(string $ein): self
    {
        $self = clone $this;
        $self['ein'] = $ein;

        return $self;
    }

    /**
     * Failure reasons for brand.
     */
    public function withFailureReasons(string $failureReasons): self
    {
        $self = clone $this;
        $self['failureReasons'] = $failureReasons;

        return $self;
    }

    /**
     * First name of business contact.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * The verification status of an active brand.
     *
     * @param BrandIdentityStatus|value-of<BrandIdentityStatus> $identityStatus
     */
    public function withIdentityStatus(
        BrandIdentityStatus|string $identityStatus
    ): self {
        $self = clone $this;
        $self['identityStatus'] = $identityStatus;

        return $self;
    }

    /**
     * IP address of the browser requesting to create brand identity.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

        return $self;
    }

    /**
     * Indicates whether this brand is known to be a reseller.
     */
    public function withIsReseller(bool $isReseller): self
    {
        $self = clone $this;
        $self['isReseller'] = $isReseller;

        return $self;
    }

    /**
     * Last name of business contact.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * Valid mobile phone number in e.164 international format.
     */
    public function withMobilePhone(string $mobilePhone): self
    {
        $self = clone $this;
        $self['mobilePhone'] = $mobilePhone;

        return $self;
    }

    /**
     * Mock brand for testing purposes.
     */
    public function withMock(bool $mock): self
    {
        $self = clone $this;
        $self['mock'] = $mock;

        return $self;
    }

    /**
     * @param OptionalAttributes|array{
     *   taxExemptStatus?: string|null
     * } $optionalAttributes
     */
    public function withOptionalAttributes(
        OptionalAttributes|array $optionalAttributes
    ): self {
        $self = clone $this;
        $self['optionalAttributes'] = $optionalAttributes;

        return $self;
    }

    /**
     * Valid phone number in e.164 international format.
     */
    public function withPhone(string $phone): self
    {
        $self = clone $this;
        $self['phone'] = $phone;

        return $self;
    }

    /**
     * Postal codes. Use 5 digit zipcode for United States.
     */
    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * Unique identifier Telnyx assigned to the brand - the brandId.
     */
    public function withReferenceID(string $referenceID): self
    {
        $self = clone $this;
        $self['referenceID'] = $referenceID;

        return $self;
    }

    /**
     * State. Must be 2 letters code for United States.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Status of the brand.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * (Required for public company) stock exchange.
     *
     * @param StockExchange|value-of<StockExchange> $stockExchange
     */
    public function withStockExchange(StockExchange|string $stockExchange): self
    {
        $self = clone $this;
        $self['stockExchange'] = $stockExchange;

        return $self;
    }

    /**
     * (Required for public company) stock symbol.
     */
    public function withStockSymbol(string $stockSymbol): self
    {
        $self = clone $this;
        $self['stockSymbol'] = $stockSymbol;

        return $self;
    }

    /**
     * Street number and name.
     */
    public function withStreet(string $street): self
    {
        $self = clone $this;
        $self['street'] = $street;

        return $self;
    }

    /**
     * Unique identifier assigned to the brand by the registry.
     */
    public function withTcrBrandID(string $tcrBrandID): self
    {
        $self = clone $this;
        $self['tcrBrandID'] = $tcrBrandID;

        return $self;
    }

    /**
     * Universal EIN of Brand, Read Only.
     */
    public function withUniversalEin(string $universalEin): self
    {
        $self = clone $this;
        $self['universalEin'] = $universalEin;

        return $self;
    }

    /**
     * Date and time that the brand was last updated at.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Failover webhook to which brand status updates are sent.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    /**
     * Webhook to which brand status updates are sent.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Brand website URL.
     */
    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
