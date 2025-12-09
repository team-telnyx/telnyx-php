<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Brand;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a brand's attributes by `brandId`.
 *
 * @see Telnyx\Services\Number10dlc\BrandService::update()
 *
 * @phpstan-type BrandUpdateParamsShape = array{
 *   country: string,
 *   displayName: string,
 *   email: string,
 *   entityType: EntityType|value-of<EntityType>,
 *   vertical: Vertical|value-of<Vertical>,
 *   altBusinessID?: string,
 *   altBusinessIDType?: AltBusinessIDType|value-of<AltBusinessIDType>,
 *   businessContactEmail?: string,
 *   city?: string,
 *   companyName?: string,
 *   ein?: string,
 *   firstName?: string,
 *   identityStatus?: BrandIdentityStatus|value-of<BrandIdentityStatus>,
 *   ipAddress?: string,
 *   isReseller?: bool,
 *   lastName?: string,
 *   phone?: string,
 *   postalCode?: string,
 *   state?: string,
 *   stockExchange?: StockExchange|value-of<StockExchange>,
 *   stockSymbol?: string,
 *   street?: string,
 *   webhookFailoverURL?: string,
 *   webhookURL?: string,
 *   website?: string,
 * }
 */
final class BrandUpdateParams implements BaseModel
{
    /** @use SdkModel<BrandUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * Vertical or industry segment of the brand or campaign.
     *
     * @var value-of<Vertical> $vertical
     */
    #[Required(enum: Vertical::class)]
    public string $vertical;

    /**
     * Alternate business identifier such as DUNS, LEI, or GIIN.
     */
    #[Optional('altBusiness_id')]
    public ?string $altBusinessID;

    /**
     * An enumeration.
     *
     * @var value-of<AltBusinessIDType>|null $altBusinessIDType
     */
    #[Optional('altBusinessIdType', enum: AltBusinessIDType::class)]
    public ?string $altBusinessIDType;

    /**
     * Business contact email.
     *
     * Required if `entityType` will be changed to `PUBLIC_PROFIT`. Otherwise, it is recommended to either omit this field or set it to `null`.
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
     * (Required for Non-profit) Government assigned corporate tax ID. EIN is 9-digits in U.S.
     */
    #[Optional]
    public ?string $ein;

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

    #[Optional]
    public ?bool $isReseller;

    /**
     * Last name of business contact.
     */
    #[Optional]
    public ?string $lastName;

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
     * State. Must be 2 letters code for United States.
     */
    #[Optional]
    public ?string $state;

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
     * Webhook failover URL for brand status updates.
     */
    #[Optional]
    public ?string $webhookFailoverURL;

    /**
     * Webhook URL for brand status updates.
     */
    #[Optional]
    public ?string $webhookURL;

    /**
     * Brand website URL.
     */
    #[Optional]
    public ?string $website;

    /**
     * `new BrandUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandUpdateParams::with(
     *   country: ..., displayName: ..., email: ..., entityType: ..., vertical: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrandUpdateParams)
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
     * @param EntityType|value-of<EntityType> $entityType
     * @param Vertical|value-of<Vertical> $vertical
     * @param AltBusinessIDType|value-of<AltBusinessIDType> $altBusinessIDType
     * @param BrandIdentityStatus|value-of<BrandIdentityStatus> $identityStatus
     * @param StockExchange|value-of<StockExchange> $stockExchange
     */
    public static function with(
        string $country,
        string $displayName,
        string $email,
        EntityType|string $entityType,
        Vertical|string $vertical,
        ?string $altBusinessID = null,
        AltBusinessIDType|string|null $altBusinessIDType = null,
        ?string $businessContactEmail = null,
        ?string $city = null,
        ?string $companyName = null,
        ?string $ein = null,
        ?string $firstName = null,
        BrandIdentityStatus|string|null $identityStatus = null,
        ?string $ipAddress = null,
        ?bool $isReseller = null,
        ?string $lastName = null,
        ?string $phone = null,
        ?string $postalCode = null,
        ?string $state = null,
        StockExchange|string|null $stockExchange = null,
        ?string $stockSymbol = null,
        ?string $street = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?string $website = null,
    ): self {
        $self = new self;

        $self['country'] = $country;
        $self['displayName'] = $displayName;
        $self['email'] = $email;
        $self['entityType'] = $entityType;
        $self['vertical'] = $vertical;

        null !== $altBusinessID && $self['altBusinessID'] = $altBusinessID;
        null !== $altBusinessIDType && $self['altBusinessIDType'] = $altBusinessIDType;
        null !== $businessContactEmail && $self['businessContactEmail'] = $businessContactEmail;
        null !== $city && $self['city'] = $city;
        null !== $companyName && $self['companyName'] = $companyName;
        null !== $ein && $self['ein'] = $ein;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $identityStatus && $self['identityStatus'] = $identityStatus;
        null !== $ipAddress && $self['ipAddress'] = $ipAddress;
        null !== $isReseller && $self['isReseller'] = $isReseller;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $phone && $self['phone'] = $phone;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $state && $self['state'] = $state;
        null !== $stockExchange && $self['stockExchange'] = $stockExchange;
        null !== $stockSymbol && $self['stockSymbol'] = $stockSymbol;
        null !== $street && $self['street'] = $street;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;
        null !== $website && $self['website'] = $website;

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
     * Vertical or industry segment of the brand or campaign.
     *
     * @param Vertical|value-of<Vertical> $vertical
     */
    public function withVertical(Vertical|string $vertical): self
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
     * Business contact email.
     *
     * Required if `entityType` will be changed to `PUBLIC_PROFIT`. Otherwise, it is recommended to either omit this field or set it to `null`.
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
     * (Required for Non-profit) Government assigned corporate tax ID. EIN is 9-digits in U.S.
     */
    public function withEin(string $ein): self
    {
        $self = clone $this;
        $self['ein'] = $ein;

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
     * State. Must be 2 letters code for United States.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

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
     * Webhook failover URL for brand status updates.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    /**
     * Webhook URL for brand status updates.
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
