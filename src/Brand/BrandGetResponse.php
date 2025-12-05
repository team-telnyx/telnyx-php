<?php

declare(strict_types=1);

namespace Telnyx\Brand;

use Telnyx\Brand\TelnyxBrand\BrandRelationship;
use Telnyx\Brand\TelnyxBrand\OptionalAttributes;
use Telnyx\Brand\TelnyxBrand\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * Telnyx-specific extensions to The Campaign Registry's `Brand` type.
 *
 * @phpstan-type BrandGetResponseShape = array{
 *   brandRelationship: value-of<BrandRelationship>,
 *   country: string,
 *   displayName: string,
 *   email: string,
 *   entityType: value-of<EntityType>,
 *   vertical: string,
 *   altBusinessId?: string|null,
 *   altBusinessIdType?: value-of<AltBusinessIDType>|null,
 *   brandId?: string|null,
 *   businessContactEmail?: string|null,
 *   city?: string|null,
 *   companyName?: string|null,
 *   createdAt?: string|null,
 *   cspId?: string|null,
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
 *   referenceId?: string|null,
 *   state?: string|null,
 *   status?: value-of<Status>|null,
 *   stockExchange?: value-of<StockExchange>|null,
 *   stockSymbol?: string|null,
 *   street?: string|null,
 *   tcrBrandId?: string|null,
 *   universalEin?: string|null,
 *   updatedAt?: string|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 *   website?: string|null,
 *   assignedCampaignsCount?: float|null,
 * }
 */
final class BrandGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<BrandGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Brand relationship to the CSP.
     *
     * @var value-of<BrandRelationship> $brandRelationship
     */
    #[Api(enum: BrandRelationship::class)]
    public string $brandRelationship;

    /**
     * ISO2 2 characters country code. Example: US - United States.
     */
    #[Api]
    public string $country;

    /**
     * Display or marketing name of the brand.
     */
    #[Api]
    public string $displayName;

    /**
     * Valid email address of brand support contact.
     */
    #[Api]
    public string $email;

    /**
     * Entity type behind the brand. This is the form of business establishment.
     *
     * @var value-of<EntityType> $entityType
     */
    #[Api(enum: EntityType::class)]
    public string $entityType;

    /**
     * Vertical or industry segment of the brand.
     */
    #[Api]
    public string $vertical;

    /**
     * Alternate business identifier such as DUNS, LEI, or GIIN.
     */
    #[Api(optional: true)]
    public ?string $altBusinessId;

    /**
     * An enumeration.
     *
     * @var value-of<AltBusinessIDType>|null $altBusinessIdType
     */
    #[Api(enum: AltBusinessIDType::class, optional: true)]
    public ?string $altBusinessIdType;

    /**
     * Unique identifier assigned to the brand.
     */
    #[Api(optional: true)]
    public ?string $brandId;

    /**
     * Business contact email.
     *
     * Required if `entityType` is `PUBLIC_PROFIT`.
     */
    #[Api(optional: true)]
    public ?string $businessContactEmail;

    /**
     * City name.
     */
    #[Api(optional: true)]
    public ?string $city;

    /**
     * (Required for Non-profit/private/public) Legal company name.
     */
    #[Api(optional: true)]
    public ?string $companyName;

    /**
     * Date and time that the brand was created at.
     */
    #[Api(optional: true)]
    public ?string $createdAt;

    /**
     * Unique identifier assigned to the csp by the registry.
     */
    #[Api(optional: true)]
    public ?string $cspId;

    /**
     * (Required for Non-profit) Government assigned corporate tax ID. EIN is 9-digits in U.S.
     */
    #[Api(optional: true)]
    public ?string $ein;

    /**
     * Failure reasons for brand.
     */
    #[Api(optional: true)]
    public ?string $failureReasons;

    /**
     * First name of business contact.
     */
    #[Api(optional: true)]
    public ?string $firstName;

    /**
     * The verification status of an active brand.
     *
     * @var value-of<BrandIdentityStatus>|null $identityStatus
     */
    #[Api(enum: BrandIdentityStatus::class, optional: true)]
    public ?string $identityStatus;

    /**
     * IP address of the browser requesting to create brand identity.
     */
    #[Api(optional: true)]
    public ?string $ipAddress;

    /**
     * Indicates whether this brand is known to be a reseller.
     */
    #[Api(optional: true)]
    public ?bool $isReseller;

    /**
     * Last name of business contact.
     */
    #[Api(optional: true)]
    public ?string $lastName;

    /**
     * Valid mobile phone number in e.164 international format.
     */
    #[Api(optional: true)]
    public ?string $mobilePhone;

    /**
     * Mock brand for testing purposes.
     */
    #[Api(optional: true)]
    public ?bool $mock;

    #[Api(optional: true)]
    public ?OptionalAttributes $optionalAttributes;

    /**
     * Valid phone number in e.164 international format.
     */
    #[Api(optional: true)]
    public ?string $phone;

    /**
     * Postal codes. Use 5 digit zipcode for United States.
     */
    #[Api(optional: true)]
    public ?string $postalCode;

    /**
     * Unique identifier Telnyx assigned to the brand - the brandId.
     */
    #[Api(optional: true)]
    public ?string $referenceId;

    /**
     * State. Must be 2 letters code for United States.
     */
    #[Api(optional: true)]
    public ?string $state;

    /**
     * Status of the brand.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * (Required for public company) stock exchange.
     *
     * @var value-of<StockExchange>|null $stockExchange
     */
    #[Api(enum: StockExchange::class, optional: true)]
    public ?string $stockExchange;

    /**
     * (Required for public company) stock symbol.
     */
    #[Api(optional: true)]
    public ?string $stockSymbol;

    /**
     * Street number and name.
     */
    #[Api(optional: true)]
    public ?string $street;

    /**
     * Unique identifier assigned to the brand by the registry.
     */
    #[Api(optional: true)]
    public ?string $tcrBrandId;

    /**
     * Universal EIN of Brand, Read Only.
     */
    #[Api(optional: true)]
    public ?string $universalEin;

    /**
     * Date and time that the brand was last updated at.
     */
    #[Api(optional: true)]
    public ?string $updatedAt;

    /**
     * Failover webhook to which brand status updates are sent.
     */
    #[Api(optional: true)]
    public ?string $webhookFailoverURL;

    /**
     * Webhook to which brand status updates are sent.
     */
    #[Api(optional: true)]
    public ?string $webhookURL;

    /**
     * Brand website URL.
     */
    #[Api(optional: true)]
    public ?string $website;

    /**
     * Number of campaigns associated with the brand.
     */
    #[Api(optional: true)]
    public ?float $assignedCampaignsCount;

    /**
     * `new BrandGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandGetResponse::with(
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
     * (new BrandGetResponse)
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
     * @param AltBusinessIDType|value-of<AltBusinessIDType> $altBusinessIdType
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
        ?string $altBusinessId = null,
        AltBusinessIDType|string|null $altBusinessIdType = null,
        ?string $brandId = null,
        ?string $businessContactEmail = null,
        ?string $city = null,
        ?string $companyName = null,
        ?string $createdAt = null,
        ?string $cspId = null,
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
        ?string $referenceId = null,
        ?string $state = null,
        Status|string|null $status = null,
        StockExchange|string|null $stockExchange = null,
        ?string $stockSymbol = null,
        ?string $street = null,
        ?string $tcrBrandId = null,
        ?string $universalEin = null,
        ?string $updatedAt = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?string $website = null,
        ?float $assignedCampaignsCount = null,
    ): self {
        $obj = new self;

        $obj['brandRelationship'] = $brandRelationship;
        $obj['country'] = $country;
        $obj['displayName'] = $displayName;
        $obj['email'] = $email;
        $obj['entityType'] = $entityType;
        $obj['vertical'] = $vertical;

        null !== $altBusinessId && $obj['altBusinessId'] = $altBusinessId;
        null !== $altBusinessIdType && $obj['altBusinessIdType'] = $altBusinessIdType;
        null !== $brandId && $obj['brandId'] = $brandId;
        null !== $businessContactEmail && $obj['businessContactEmail'] = $businessContactEmail;
        null !== $city && $obj['city'] = $city;
        null !== $companyName && $obj['companyName'] = $companyName;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $cspId && $obj['cspId'] = $cspId;
        null !== $ein && $obj['ein'] = $ein;
        null !== $failureReasons && $obj['failureReasons'] = $failureReasons;
        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $identityStatus && $obj['identityStatus'] = $identityStatus;
        null !== $ipAddress && $obj['ipAddress'] = $ipAddress;
        null !== $isReseller && $obj['isReseller'] = $isReseller;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $mobilePhone && $obj['mobilePhone'] = $mobilePhone;
        null !== $mock && $obj['mock'] = $mock;
        null !== $optionalAttributes && $obj['optionalAttributes'] = $optionalAttributes;
        null !== $phone && $obj['phone'] = $phone;
        null !== $postalCode && $obj['postalCode'] = $postalCode;
        null !== $referenceId && $obj['referenceId'] = $referenceId;
        null !== $state && $obj['state'] = $state;
        null !== $status && $obj['status'] = $status;
        null !== $stockExchange && $obj['stockExchange'] = $stockExchange;
        null !== $stockSymbol && $obj['stockSymbol'] = $stockSymbol;
        null !== $street && $obj['street'] = $street;
        null !== $tcrBrandId && $obj['tcrBrandId'] = $tcrBrandId;
        null !== $universalEin && $obj['universalEin'] = $universalEin;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $webhookFailoverURL && $obj['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;
        null !== $website && $obj['website'] = $website;
        null !== $assignedCampaignsCount && $obj['assignedCampaignsCount'] = $assignedCampaignsCount;

        return $obj;
    }

    /**
     * Brand relationship to the CSP.
     *
     * @param BrandRelationship|value-of<BrandRelationship> $brandRelationship
     */
    public function withBrandRelationship(
        BrandRelationship|string $brandRelationship
    ): self {
        $obj = clone $this;
        $obj['brandRelationship'] = $brandRelationship;

        return $obj;
    }

    /**
     * ISO2 2 characters country code. Example: US - United States.
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj['country'] = $country;

        return $obj;
    }

    /**
     * Display or marketing name of the brand.
     */
    public function withDisplayName(string $displayName): self
    {
        $obj = clone $this;
        $obj['displayName'] = $displayName;

        return $obj;
    }

    /**
     * Valid email address of brand support contact.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * Entity type behind the brand. This is the form of business establishment.
     *
     * @param EntityType|value-of<EntityType> $entityType
     */
    public function withEntityType(EntityType|string $entityType): self
    {
        $obj = clone $this;
        $obj['entityType'] = $entityType;

        return $obj;
    }

    /**
     * Vertical or industry segment of the brand.
     */
    public function withVertical(string $vertical): self
    {
        $obj = clone $this;
        $obj['vertical'] = $vertical;

        return $obj;
    }

    /**
     * Alternate business identifier such as DUNS, LEI, or GIIN.
     */
    public function withAltBusinessID(string $altBusinessID): self
    {
        $obj = clone $this;
        $obj['altBusinessId'] = $altBusinessID;

        return $obj;
    }

    /**
     * An enumeration.
     *
     * @param AltBusinessIDType|value-of<AltBusinessIDType> $altBusinessIDType
     */
    public function withAltBusinessIDType(
        AltBusinessIDType|string $altBusinessIDType
    ): self {
        $obj = clone $this;
        $obj['altBusinessIdType'] = $altBusinessIDType;

        return $obj;
    }

    /**
     * Unique identifier assigned to the brand.
     */
    public function withBrandID(string $brandID): self
    {
        $obj = clone $this;
        $obj['brandId'] = $brandID;

        return $obj;
    }

    /**
     * Business contact email.
     *
     * Required if `entityType` is `PUBLIC_PROFIT`.
     */
    public function withBusinessContactEmail(string $businessContactEmail): self
    {
        $obj = clone $this;
        $obj['businessContactEmail'] = $businessContactEmail;

        return $obj;
    }

    /**
     * City name.
     */
    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj['city'] = $city;

        return $obj;
    }

    /**
     * (Required for Non-profit/private/public) Legal company name.
     */
    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj['companyName'] = $companyName;

        return $obj;
    }

    /**
     * Date and time that the brand was created at.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Unique identifier assigned to the csp by the registry.
     */
    public function withCspID(string $cspID): self
    {
        $obj = clone $this;
        $obj['cspId'] = $cspID;

        return $obj;
    }

    /**
     * (Required for Non-profit) Government assigned corporate tax ID. EIN is 9-digits in U.S.
     */
    public function withEin(string $ein): self
    {
        $obj = clone $this;
        $obj['ein'] = $ein;

        return $obj;
    }

    /**
     * Failure reasons for brand.
     */
    public function withFailureReasons(string $failureReasons): self
    {
        $obj = clone $this;
        $obj['failureReasons'] = $failureReasons;

        return $obj;
    }

    /**
     * First name of business contact.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    /**
     * The verification status of an active brand.
     *
     * @param BrandIdentityStatus|value-of<BrandIdentityStatus> $identityStatus
     */
    public function withIdentityStatus(
        BrandIdentityStatus|string $identityStatus
    ): self {
        $obj = clone $this;
        $obj['identityStatus'] = $identityStatus;

        return $obj;
    }

    /**
     * IP address of the browser requesting to create brand identity.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj['ipAddress'] = $ipAddress;

        return $obj;
    }

    /**
     * Indicates whether this brand is known to be a reseller.
     */
    public function withIsReseller(bool $isReseller): self
    {
        $obj = clone $this;
        $obj['isReseller'] = $isReseller;

        return $obj;
    }

    /**
     * Last name of business contact.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['lastName'] = $lastName;

        return $obj;
    }

    /**
     * Valid mobile phone number in e.164 international format.
     */
    public function withMobilePhone(string $mobilePhone): self
    {
        $obj = clone $this;
        $obj['mobilePhone'] = $mobilePhone;

        return $obj;
    }

    /**
     * Mock brand for testing purposes.
     */
    public function withMock(bool $mock): self
    {
        $obj = clone $this;
        $obj['mock'] = $mock;

        return $obj;
    }

    /**
     * @param OptionalAttributes|array{
     *   taxExemptStatus?: string|null
     * } $optionalAttributes
     */
    public function withOptionalAttributes(
        OptionalAttributes|array $optionalAttributes
    ): self {
        $obj = clone $this;
        $obj['optionalAttributes'] = $optionalAttributes;

        return $obj;
    }

    /**
     * Valid phone number in e.164 international format.
     */
    public function withPhone(string $phone): self
    {
        $obj = clone $this;
        $obj['phone'] = $phone;

        return $obj;
    }

    /**
     * Postal codes. Use 5 digit zipcode for United States.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postalCode'] = $postalCode;

        return $obj;
    }

    /**
     * Unique identifier Telnyx assigned to the brand - the brandId.
     */
    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj['referenceId'] = $referenceID;

        return $obj;
    }

    /**
     * State. Must be 2 letters code for United States.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * Status of the brand.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * (Required for public company) stock exchange.
     *
     * @param StockExchange|value-of<StockExchange> $stockExchange
     */
    public function withStockExchange(StockExchange|string $stockExchange): self
    {
        $obj = clone $this;
        $obj['stockExchange'] = $stockExchange;

        return $obj;
    }

    /**
     * (Required for public company) stock symbol.
     */
    public function withStockSymbol(string $stockSymbol): self
    {
        $obj = clone $this;
        $obj['stockSymbol'] = $stockSymbol;

        return $obj;
    }

    /**
     * Street number and name.
     */
    public function withStreet(string $street): self
    {
        $obj = clone $this;
        $obj['street'] = $street;

        return $obj;
    }

    /**
     * Unique identifier assigned to the brand by the registry.
     */
    public function withTcrBrandID(string $tcrBrandID): self
    {
        $obj = clone $this;
        $obj['tcrBrandId'] = $tcrBrandID;

        return $obj;
    }

    /**
     * Universal EIN of Brand, Read Only.
     */
    public function withUniversalEin(string $universalEin): self
    {
        $obj = clone $this;
        $obj['universalEin'] = $universalEin;

        return $obj;
    }

    /**
     * Date and time that the brand was last updated at.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Failover webhook to which brand status updates are sent.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj['webhookFailoverURL'] = $webhookFailoverURL;

        return $obj;
    }

    /**
     * Webhook to which brand status updates are sent.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }

    /**
     * Brand website URL.
     */
    public function withWebsite(string $website): self
    {
        $obj = clone $this;
        $obj['website'] = $website;

        return $obj;
    }

    /**
     * Number of campaigns associated with the brand.
     */
    public function withAssignedCampaignsCount(
        float $assignedCampaignsCount
    ): self {
        $obj = clone $this;
        $obj['assignedCampaignsCount'] = $assignedCampaignsCount;

        return $obj;
    }
}
