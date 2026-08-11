<?php

declare(strict_types=1);

namespace Telnyx\Services\Rcs;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Rcs\Brands\BrandCreateParams\Address;
use Telnyx\Rcs\Brands\BrandCreateParams\Contacts;
use Telnyx\Rcs\Brands\BrandCreateParams\Identifiers;
use Telnyx\Rcs\Brands\BrandLegalEntityType;
use Telnyx\Rcs\Brands\BrandOrganizationType;
use Telnyx\Rcs\Brands\BrandResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Rcs\BrandsContract;

/**
 * Manage the legal business entities that operate RCS agents.
 *
 * @phpstan-import-type AddressShape from \Telnyx\Rcs\Brands\BrandCreateParams\Address
 * @phpstan-import-type ContactsShape from \Telnyx\Rcs\Brands\BrandCreateParams\Contacts
 * @phpstan-import-type IdentifiersShape from \Telnyx\Rcs\Brands\BrandCreateParams\Identifiers
 * @phpstan-import-type AddressShape from \Telnyx\Rcs\Brands\BrandUpdateParams\Address as AddressShape1
 * @phpstan-import-type ContactsShape from \Telnyx\Rcs\Brands\BrandUpdateParams\Contacts as ContactsShape1
 * @phpstan-import-type IdentifiersShape from \Telnyx\Rcs\Brands\BrandUpdateParams\Identifiers as IdentifiersShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BrandsService implements BrandsContract
{
    /**
     * @api
     */
    public BrandsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BrandsRawService($client);
    }

    /**
     * @api
     *
     * Creates an editable RCS brand draft. Creating the draft does not begin external review.
     *
     * @param array<string,Address|AddressShape> $addresses
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
    ): BrandResponse {
        $params = Util::removeNulls(
            [
                'addresses' => $addresses,
                'contacts' => $contacts,
                'displayName' => $displayName,
                'identifiers' => $identifiers,
                'legalEntityType' => $legalEntityType,
                'legalName' => $legalName,
                'organizationType' => $organizationType,
                'websiteURL' => $websiteURL,
                'profileID' => $profileID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves an RCS brand and its current lifecycle status.
     *
     * @param string $id the Telnyx-assigned brand identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BrandResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates one or more fields on a brand while its status is `CREATED`. Submitted brands cannot be changed.
     *
     * @param string $id the Telnyx-assigned brand identifier
     * @param array<string,\Telnyx\Rcs\Brands\BrandUpdateParams\Address|AddressShape1> $addresses
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
    ): BrandResponse {
        $params = Util::removeNulls(
            [
                'addresses' => $addresses,
                'contacts' => $contacts,
                'displayName' => $displayName,
                'identifiers' => $identifiers,
                'legalEntityType' => $legalEntityType,
                'legalName' => $legalName,
                'organizationType' => $organizationType,
                'profileID' => $profileID,
                'websiteURL' => $websiteURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists RCS brands owned by the authenticated organization.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<BrandResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Starts asynchronous provider provisioning and external review for a brand. Repeating this request for an in-progress brand returns its current state without creating new work.
     *
     * @param string $id the Telnyx-assigned brand identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submit(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BrandResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->submit($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
