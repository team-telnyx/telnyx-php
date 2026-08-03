<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailDomains\DomainsTrackingSettings;
use Telnyx\EmailDomains\EmailDmarcPolicy;
use Telnyx\EmailDomains\EmailDomain;
use Telnyx\EmailDomains\EmailDomainGetDNSRecordsResponse;
use Telnyx\EmailDomains\EmailDomainGetHealthResponse;
use Telnyx\EmailDomains\EmailDomainListParams\Sort;
use Telnyx\EmailDomains\EmailDomainResponse;
use Telnyx\EmailDomains\EmailDomainStatus;
use Telnyx\EmailDomains\EmailDomainType;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type EmailDmarcPolicyShape from \Telnyx\EmailDomains\EmailDmarcPolicy
 * @phpstan-import-type DomainsTrackingSettingsShape from \Telnyx\EmailDomains\DomainsTrackingSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailDomainsContract
{
    /**
     * @api
     *
     * @param EmailDmarcPolicy|EmailDmarcPolicyShape|null $dmarcPolicy DMARC policy for a sending domain. Drives the recommended _dmarc.<domain> TXT record. DMARC is advisory and never blocks sending. When omitted or null, the domain uses the advisory default (v=DMARC1; p=none; rua=mailto:dmarc@telnyx.com).
     * @param bool $inboundEnabled Enable inbound routing for this domain
     * @param DomainsTrackingSettings|DomainsTrackingSettingsShape $tracking
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $domain,
        EmailDmarcPolicy|array|null $dmarcPolicy = null,
        bool $inboundEnabled = false,
        DomainsTrackingSettings|array|null $tracking = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailDomainResponse;

    /**
     * @api
     *
     * @param string $id Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailDomainResponse;

    /**
     * @api
     *
     * @param string $id Email domain UUID
     * @param EmailDmarcPolicy|EmailDmarcPolicyShape|null $dmarcPolicy DMARC policy for a sending domain. Drives the recommended _dmarc.<domain> TXT record. DMARC is advisory and never blocks sending. When omitted or null, the domain uses the advisory default (v=DMARC1; p=none; rua=mailto:dmarc@telnyx.com).
     * @param bool $inboundEnabled Enable or disable inbound routing for this domain
     * @param DomainsTrackingSettings|DomainsTrackingSettingsShape $tracking
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        EmailDmarcPolicy|array|null $dmarcPolicy = null,
        ?bool $inboundEnabled = null,
        DomainsTrackingSettings|array|null $tracking = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailDomainResponse;

    /**
     * @api
     *
     * @param string $filterDomain Partial match on domain name (case-insensitive)
     * @param string $filterProfileID Filter by profile UUID
     * @param EmailDomainStatus|value-of<EmailDomainStatus> $filterStatus
     * @param EmailDomainType|value-of<EmailDomainType> $filterType
     * @param string $pageAfter Cursor for records after the provided value (cursor pagination)
     * @param string $pageBefore Cursor for records before the provided value (cursor pagination)
     * @param int $pageNumber Page number to return (offset pagination)
     * @param int $pageSize Number of records per page
     * @param Sort|value-of<Sort> $sort Field to sort by. Prefix with `-` for descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<EmailDomain>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterDomain = null,
        ?string $filterProfileID = null,
        EmailDomainStatus|string|null $filterStatus = null,
        EmailDomainType|string|null $filterType = null,
        ?bool $filterUsableForInbound = null,
        ?bool $filterUsableForSending = null,
        ?string $pageAfter = null,
        ?string $pageBefore = null,
        int $pageNumber = 1,
        int $pageSize = 25,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id Email domain UUID
     * @param bool $force Required as true when deleting verified domains
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        bool $force = false,
        RequestOptions|array|null $requestOptions = null,
    ): EmailDomainResponse;

    /**
     * @api
     *
     * @param string $domainID Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveDNSRecords(
        string $domainID,
        RequestOptions|array|null $requestOptions = null
    ): EmailDomainGetDNSRecordsResponse;

    /**
     * @api
     *
     * @param string $id Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveHealth(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailDomainGetHealthResponse;

    /**
     * @api
     *
     * @param string $domainID Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verify(
        string $domainID,
        RequestOptions|array|null $requestOptions = null
    ): EmailDomainResponse;
}
