<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rcs;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Rcs\Brands\BrandAddress;
use Telnyx\Rcs\Brands\BrandCreateParams\Contacts;
use Telnyx\Rcs\Brands\BrandCreateParams\Identifiers;
use Telnyx\Rcs\Brands\BrandLegalEntityType;
use Telnyx\Rcs\Brands\BrandOrganizationType;
use Telnyx\Rcs\Brands\BrandResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ContactsShape from \Telnyx\Rcs\Brands\BrandCreateParams\Contacts
 * @phpstan-import-type IdentifiersShape from \Telnyx\Rcs\Brands\BrandCreateParams\Identifiers
 * @phpstan-import-type ContactsShape from \Telnyx\Rcs\Brands\BrandUpdateParams\Contacts as ContactsShape1
 * @phpstan-import-type IdentifiersShape from \Telnyx\Rcs\Brands\BrandUpdateParams\Identifiers as IdentifiersShape1
 * @phpstan-import-type BrandAddressShape from \Telnyx\Rcs\Brands\BrandAddress
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BrandsContract
{
    /**
     * @api
     *
     * @param array<string,BrandAddress|BrandAddressShape> $addresses
     * @param Contacts|ContactsShape $contacts Named business contacts. Use the `brand` key for the required BRAND contact.
     * @param Identifiers|IdentifiersShape $identifiers Named business identifiers. Use the `ein` key for the required EIN and `stock_symbol` for a public-profit brand's stock symbol.
     * @param BrandLegalEntityType|value-of<BrandLegalEntityType> $legalEntityType
     * @param BrandOrganizationType|value-of<BrandOrganizationType> $organizationType
     * @param string|null $profileID A Messaging Profile owned by the authenticated organization. Agents inherit this value when they do not provide their own profile.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $addresses,
        Contacts|array $contacts,
        string $displayName,
        Identifiers|array $identifiers,
        BrandLegalEntityType|string $legalEntityType,
        string $legalName,
        BrandOrganizationType|string $organizationType,
        string $websiteURL,
        ?string $profileID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BrandResponse;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned brand identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BrandResponse;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned brand identifier
     * @param array<string,BrandAddress|BrandAddressShape> $addresses
     * @param \Telnyx\Rcs\Brands\BrandUpdateParams\Contacts|ContactsShape1 $contacts Named business contacts. Use the `brand` key for the required BRAND contact.
     * @param \Telnyx\Rcs\Brands\BrandUpdateParams\Identifiers|IdentifiersShape1 $identifiers Named business identifiers. Use the `ein` key for the required EIN and `stock_symbol` for a public-profit brand's stock symbol.
     * @param BrandLegalEntityType|value-of<BrandLegalEntityType> $legalEntityType
     * @param BrandOrganizationType|value-of<BrandOrganizationType> $organizationType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?array $addresses = null,
        \Telnyx\Rcs\Brands\BrandUpdateParams\Contacts|array|null $contacts = null,
        ?string $displayName = null,
        \Telnyx\Rcs\Brands\BrandUpdateParams\Identifiers|array|null $identifiers = null,
        BrandLegalEntityType|string|null $legalEntityType = null,
        ?string $legalName = null,
        BrandOrganizationType|string|null $organizationType = null,
        ?string $profileID = null,
        ?string $websiteURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): BrandResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<BrandResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned brand identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submit(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BrandResponse;
}
