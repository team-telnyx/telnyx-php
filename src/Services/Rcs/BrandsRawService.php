<?php

declare(strict_types=1);

namespace Telnyx\Services\Rcs;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Rcs\Brands\BrandCreateParams;
use Telnyx\Rcs\Brands\BrandCreateParams\Address;
use Telnyx\Rcs\Brands\BrandCreateParams\Contacts;
use Telnyx\Rcs\Brands\BrandCreateParams\Identifiers;
use Telnyx\Rcs\Brands\BrandLegalEntityType;
use Telnyx\Rcs\Brands\BrandOrganizationType;
use Telnyx\Rcs\Brands\BrandResponse;
use Telnyx\Rcs\Brands\BrandUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Rcs\BrandsRawContract;

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
final class BrandsRawService implements BrandsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an editable RCS brand draft. Creating the draft does not begin external review.
     *
     * @param array{
     *   addresses: array<string,Address|AddressShape>,
     *   contacts: Contacts|ContactsShape,
     *   displayName: string,
     *   identifiers: Identifiers|IdentifiersShape,
     *   legalEntityType: value-of<BrandLegalEntityType>,
     *   legalName: string,
     *   organizationType: BrandOrganizationType|value-of<BrandOrganizationType>,
     *   websiteURL: string,
     *   profileID?: string|null,
     * }|BrandCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrandResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BrandCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BrandCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'rcs/brands',
            body: (object) $parsed,
            options: $options,
            convert: BrandResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves an RCS brand and its current lifecycle status.
     *
     * @param string $id the Telnyx-assigned brand identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrandResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['rcs/brands/%1$s', $id],
            options: $requestOptions,
            convert: BrandResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates one or more fields on a brand while its status is `CREATED`. Submitted brands cannot be changed.
     *
     * @param string $id the Telnyx-assigned brand identifier
     * @param array{
     *   addresses?: array<string,BrandUpdateParams\Address|AddressShape1>,
     *   contacts?: BrandUpdateParams\Contacts|ContactsShape1,
     *   displayName?: string,
     *   identifiers?: BrandUpdateParams\Identifiers|IdentifiersShape1,
     *   legalEntityType?: value-of<BrandLegalEntityType>,
     *   legalName?: string,
     *   organizationType?: BrandOrganizationType|value-of<BrandOrganizationType>,
     *   profileID?: string,
     *   websiteURL?: string,
     * }|BrandUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrandResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|BrandUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BrandUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['rcs/brands/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: BrandResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists RCS brands owned by the authenticated organization.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<BrandResponse>>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'rcs/brands',
            options: $requestOptions,
            convert: new ListOf(BrandResponse::class),
        );
    }

    /**
     * @api
     *
     * Starts asynchronous provider provisioning and external review for a brand. Repeating this request for an in-progress brand returns its current state without creating new work.
     *
     * @param string $id the Telnyx-assigned brand identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrandResponse>
     *
     * @throws APIException
     */
    public function submit(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['rcs/brands/%1$s/submit', $id],
            options: $requestOptions,
            convert: BrandResponse::class,
        );
    }
}
