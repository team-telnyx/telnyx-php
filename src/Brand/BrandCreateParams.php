<?php

declare(strict_types=1);

namespace Telnyx\Brand;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new BrandCreateParams); // set properties as needed
 * $client->brand->create(...$params->toArray());
 * ```
 * This endpoint is used to create a new brand. A brand is an entity created by The Campaign Registry (TCR) that represents an organization or a company. It is this entity that TCR created campaigns will be associated with. Each brand creation will entail an upfront, non-refundable $4 expense.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->brand->create(...$params->toArray());`
 *
 * @see Telnyx\Brand->create
 *
 * @phpstan-type brand_create_params = array{
 *   country: string,
 *   displayName: string,
 *   email: string,
 *   entityType: EntityType|value-of<EntityType>,
 *   vertical: Vertical|value-of<Vertical>,
 *   businessContactEmail?: string,
 *   city?: string,
 *   companyName?: string,
 *   ein?: string,
 *   firstName?: string,
 *   ipAddress?: string,
 *   isReseller?: bool,
 *   lastName?: string,
 *   mobilePhone?: string,
 *   mock?: bool,
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
final class BrandCreateParams implements BaseModel
{
    /** @use SdkModel<brand_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * ISO2 2 characters country code. Example: US - United States.
     */
    #[Api]
    public string $country;

    /**
     * Display name, marketing name, or DBA name of the brand.
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
     * Vertical or industry segment of the brand or campaign.
     *
     * @var value-of<Vertical> $vertical
     */
    #[Api(enum: Vertical::class)]
    public string $vertical;

    /**
     * Business contact email.
     *
     * Required if `entityType` is `PUBLIC_PROFIT`. Otherwise, it is recommended to either omit this field or set it to `null`.
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
     * (Required for Non-profit) Government assigned corporate tax ID. EIN is 9-digits in U.S.
     */
    #[Api(optional: true)]
    public ?string $ein;

    /**
     * First name of business contact.
     */
    #[Api(optional: true)]
    public ?string $firstName;

    /**
     * IP address of the browser requesting to create brand identity.
     */
    #[Api(optional: true)]
    public ?string $ipAddress;

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
     * Mock brand for testing purposes. Defaults to false.
     */
    #[Api(optional: true)]
    public ?bool $mock;

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
     * State. Must be 2 letters code for United States.
     */
    #[Api(optional: true)]
    public ?string $state;

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
     * Webhook failover URL for brand status updates.
     */
    #[Api(optional: true)]
    public ?string $webhookFailoverURL;

    /**
     * Webhook URL for brand status updates.
     */
    #[Api(optional: true)]
    public ?string $webhookURL;

    /**
     * Brand website URL.
     */
    #[Api(optional: true)]
    public ?string $website;

    /**
     * `new BrandCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandCreateParams::with(
     *   country: ..., displayName: ..., email: ..., entityType: ..., vertical: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrandCreateParams)
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
     * @param StockExchange|value-of<StockExchange> $stockExchange
     */
    public static function with(
        string $country,
        string $displayName,
        string $email,
        EntityType|string $entityType,
        Vertical|string $vertical,
        ?string $businessContactEmail = null,
        ?string $city = null,
        ?string $companyName = null,
        ?string $ein = null,
        ?string $firstName = null,
        ?string $ipAddress = null,
        ?bool $isReseller = null,
        ?string $lastName = null,
        ?string $mobilePhone = null,
        ?bool $mock = null,
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
        $obj = new self;

        $obj->country = $country;
        $obj->displayName = $displayName;
        $obj->email = $email;
        $obj['entityType'] = $entityType;
        $obj['vertical'] = $vertical;

        null !== $businessContactEmail && $obj->businessContactEmail = $businessContactEmail;
        null !== $city && $obj->city = $city;
        null !== $companyName && $obj->companyName = $companyName;
        null !== $ein && $obj->ein = $ein;
        null !== $firstName && $obj->firstName = $firstName;
        null !== $ipAddress && $obj->ipAddress = $ipAddress;
        null !== $isReseller && $obj->isReseller = $isReseller;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $mobilePhone && $obj->mobilePhone = $mobilePhone;
        null !== $mock && $obj->mock = $mock;
        null !== $phone && $obj->phone = $phone;
        null !== $postalCode && $obj->postalCode = $postalCode;
        null !== $state && $obj->state = $state;
        null !== $stockExchange && $obj['stockExchange'] = $stockExchange;
        null !== $stockSymbol && $obj->stockSymbol = $stockSymbol;
        null !== $street && $obj->street = $street;
        null !== $webhookFailoverURL && $obj->webhookFailoverURL = $webhookFailoverURL;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;
        null !== $website && $obj->website = $website;

        return $obj;
    }

    /**
     * ISO2 2 characters country code. Example: US - United States.
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    /**
     * Display name, marketing name, or DBA name of the brand.
     */
    public function withDisplayName(string $displayName): self
    {
        $obj = clone $this;
        $obj->displayName = $displayName;

        return $obj;
    }

    /**
     * Valid email address of brand support contact.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

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
     * Vertical or industry segment of the brand or campaign.
     *
     * @param Vertical|value-of<Vertical> $vertical
     */
    public function withVertical(Vertical|string $vertical): self
    {
        $obj = clone $this;
        $obj['vertical'] = $vertical;

        return $obj;
    }

    /**
     * Business contact email.
     *
     * Required if `entityType` is `PUBLIC_PROFIT`. Otherwise, it is recommended to either omit this field or set it to `null`.
     */
    public function withBusinessContactEmail(string $businessContactEmail): self
    {
        $obj = clone $this;
        $obj->businessContactEmail = $businessContactEmail;

        return $obj;
    }

    /**
     * City name.
     */
    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj->city = $city;

        return $obj;
    }

    /**
     * (Required for Non-profit/private/public) Legal company name.
     */
    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj->companyName = $companyName;

        return $obj;
    }

    /**
     * (Required for Non-profit) Government assigned corporate tax ID. EIN is 9-digits in U.S.
     */
    public function withEin(string $ein): self
    {
        $obj = clone $this;
        $obj->ein = $ein;

        return $obj;
    }

    /**
     * First name of business contact.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    /**
     * IP address of the browser requesting to create brand identity.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ipAddress = $ipAddress;

        return $obj;
    }

    public function withIsReseller(bool $isReseller): self
    {
        $obj = clone $this;
        $obj->isReseller = $isReseller;

        return $obj;
    }

    /**
     * Last name of business contact.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    /**
     * Valid mobile phone number in e.164 international format.
     */
    public function withMobilePhone(string $mobilePhone): self
    {
        $obj = clone $this;
        $obj->mobilePhone = $mobilePhone;

        return $obj;
    }

    /**
     * Mock brand for testing purposes. Defaults to false.
     */
    public function withMock(bool $mock): self
    {
        $obj = clone $this;
        $obj->mock = $mock;

        return $obj;
    }

    /**
     * Valid phone number in e.164 international format.
     */
    public function withPhone(string $phone): self
    {
        $obj = clone $this;
        $obj->phone = $phone;

        return $obj;
    }

    /**
     * Postal codes. Use 5 digit zipcode for United States.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj->postalCode = $postalCode;

        return $obj;
    }

    /**
     * State. Must be 2 letters code for United States.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

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
        $obj->stockSymbol = $stockSymbol;

        return $obj;
    }

    /**
     * Street number and name.
     */
    public function withStreet(string $street): self
    {
        $obj = clone $this;
        $obj->street = $street;

        return $obj;
    }

    /**
     * Webhook failover URL for brand status updates.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj->webhookFailoverURL = $webhookFailoverURL;

        return $obj;
    }

    /**
     * Webhook URL for brand status updates.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * Brand website URL.
     */
    public function withWebsite(string $website): self
    {
        $obj = clone $this;
        $obj->website = $website;

        return $obj;
    }
}
