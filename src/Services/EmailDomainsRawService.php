<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailDomains\DomainsTrackingSettings;
use Telnyx\EmailDomains\EmailDmarcPolicy;
use Telnyx\EmailDomains\EmailDomain;
use Telnyx\EmailDomains\EmailDomainCreateParams;
use Telnyx\EmailDomains\EmailDomainDeleteParams;
use Telnyx\EmailDomains\EmailDomainGetDNSRecordsResponse;
use Telnyx\EmailDomains\EmailDomainGetHealthResponse;
use Telnyx\EmailDomains\EmailDomainListParams;
use Telnyx\EmailDomains\EmailDomainListParams\Sort;
use Telnyx\EmailDomains\EmailDomainResponse;
use Telnyx\EmailDomains\EmailDomainStatus;
use Telnyx\EmailDomains\EmailDomainType;
use Telnyx\EmailDomains\EmailDomainUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailDomainsRawContract;

/**
 * @phpstan-import-type EmailDmarcPolicyShape from \Telnyx\EmailDomains\EmailDmarcPolicy
 * @phpstan-import-type DomainsTrackingSettingsShape from \Telnyx\EmailDomains\DomainsTrackingSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailDomainsRawService implements EmailDomainsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Registers a domain for email sending and optional inbound delivery. The response includes the domain configuration and current verification state.
     *
     * @param array{
     *   domain: string,
     *   dmarcPolicy?: EmailDmarcPolicy|EmailDmarcPolicyShape|null,
     *   inboundEnabled?: bool,
     *   tracking?: DomainsTrackingSettings|DomainsTrackingSettingsShape,
     * }|EmailDomainCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDomainResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailDomainCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailDomainCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'email_domains',
            body: (object) $parsed,
            options: $options,
            convert: EmailDomainResponse::class,
        );
    }

    /**
     * @api
     *
     * Shared (`type: shared`) Telnyx-managed domains are included/readable for every account, in addition to the account's own custom domains.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_domains/%1$s', $id],
            options: $requestOptions,
            convert: EmailDomainResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates mutable settings for an existing email domain, including inbound delivery and tracking configuration. Shared domains are read-only for non-owner accounts.
     *
     * @param string $id Email domain UUID
     * @param array{
     *   dmarcPolicy?: EmailDmarcPolicy|EmailDmarcPolicyShape|null,
     *   inboundEnabled?: bool,
     *   tracking?: DomainsTrackingSettings|DomainsTrackingSettingsShape,
     * }|EmailDomainUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = EmailDomainUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['email_domains/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: EmailDomainResponse::class,
        );
    }

    /**
     * @api
     *
     * Shared (`type: shared`) Telnyx-managed domains are included/readable for every account, in addition to the account's own custom domains.
     *
     * @param array{
     *   filterDomain?: string,
     *   filterProfileID?: string,
     *   filterStatus?: EmailDomainStatus|value-of<EmailDomainStatus>,
     *   filterType?: EmailDomainType|value-of<EmailDomainType>,
     *   filterUsableForInbound?: bool,
     *   filterUsableForSending?: bool,
     *   pageAfter?: string,
     *   pageBefore?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|EmailDomainListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EmailDomain>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailDomainListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailDomainListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email_domains',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterDomain' => 'filter[domain]',
                    'filterProfileID' => 'filter[profile_id]',
                    'filterStatus' => 'filter[status]',
                    'filterType' => 'filter[type]',
                    'filterUsableForInbound' => 'filter[usable_for_inbound]',
                    'filterUsableForSending' => 'filter[usable_for_sending]',
                    'pageAfter' => 'page[after]',
                    'pageBefore' => 'page[before]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: EmailDomain::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes an email domain configuration. Verified domains require `force=true`, and shared domains are read-only for non-owner accounts.
     *
     * @param string $id Email domain UUID
     * @param array{force?: bool}|EmailDomainDeleteParams $params
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
    ): BaseResponse {
        [$parsed, $options] = EmailDomainDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email_domains/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: EmailDomainResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the DNS records Telnyx generated for domain ownership and DKIM verification, plus MX records when inbound delivery is enabled.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_domains/%1$s/dns_records', $domainID],
            options: $requestOptions,
            convert: EmailDomainGetDNSRecordsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a summary of domain health including verification status and usability.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_domains/%1$s/health', $id],
            options: $requestOptions,
            convert: EmailDomainGetHealthResponse::class,
        );
    }

    /**
     * @api
     *
     * Checks the published DNS records against the records required for the email domain and returns the latest verification results.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['email_domains/%1$s/verify', $domainID],
            options: $requestOptions,
            convert: EmailDomainResponse::class,
        );
    }
}
