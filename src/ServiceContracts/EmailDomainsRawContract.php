<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailDomains\EmailDomain;
use Telnyx\EmailDomains\EmailDomainCreateParams;
use Telnyx\EmailDomains\EmailDomainDeleteParams;
use Telnyx\EmailDomains\EmailDomainGetDNSRecordsResponse;
use Telnyx\EmailDomains\EmailDomainGetHealthResponse;
use Telnyx\EmailDomains\EmailDomainListParams;
use Telnyx\EmailDomains\EmailDomainResponse;
use Telnyx\EmailDomains\EmailDomainUpdateParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailDomainsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EmailDomainCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDomainResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailDomainCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDomainResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Email domain UUID
     * @param array<string,mixed>|EmailDomainUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDomainResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|EmailDomainUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailDomainListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EmailDomain>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailDomainListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Email domain UUID
     * @param array<string,mixed>|EmailDomainDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDomainResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|EmailDomainDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $domainID Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDomainGetDNSRecordsResponse>
     *
     * @throws APIException
     */
    public function retrieveDNSRecords(
        string $domainID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDomainGetHealthResponse>
     *
     * @throws APIException
     */
    public function retrieveHealth(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $domainID Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDomainResponse>
     *
     * @throws APIException
     */
    public function verify(
        string $domainID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
