<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
use Telnyx\ServiceContracts\EmailDomainsContract;
use Telnyx\Services\EmailDomains\WebhooksService;

/**
 * @phpstan-import-type EmailDmarcPolicyShape from \Telnyx\EmailDomains\EmailDmarcPolicy
 * @phpstan-import-type DomainsTrackingSettingsShape from \Telnyx\EmailDomains\DomainsTrackingSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailDomainsService implements EmailDomainsContract
{
    /**
     * @api
     */
    public EmailDomainsRawService $raw;

    /**
     * @api
     */
    public WebhooksService $webhooks;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailDomainsRawService($client);
        $this->webhooks = new WebhooksService($client);
    }

    /**
     * @api
     *
     * Registers a domain for email sending and optional inbound delivery. The response includes the domain configuration and current verification state.
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
    ): EmailDomainResponse {
        $params = Util::removeNulls(
            [
                'domain' => $domain,
                'dmarcPolicy' => $dmarcPolicy,
                'inboundEnabled' => $inboundEnabled,
                'tracking' => $tracking,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Shared (`type: shared`) Telnyx-managed domains are included/readable for every account, in addition to the account's own custom domains.
     *
     * @param string $id Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailDomainResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates mutable settings for an existing email domain, including inbound delivery and tracking configuration. Shared domains are read-only for non-owner accounts.
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
    ): EmailDomainResponse {
        $params = Util::removeNulls(
            [
                'dmarcPolicy' => $dmarcPolicy,
                'inboundEnabled' => $inboundEnabled,
                'tracking' => $tracking,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Shared (`type: shared`) Telnyx-managed domains are included/readable for every account, in addition to the account's own custom domains.
     *
     * @param string $filterDomain Partial match on domain name (case-insensitive)
     * @param string $filterProfileID Filter by profile UUID
     * @param EmailDomainStatus|value-of<EmailDomainStatus> $filterStatus filter domains by verification status: pending, verifying, verified, failed, degraded, or suspended
     * @param EmailDomainType|value-of<EmailDomainType> $filterType filter domains by type: custom, shared, or shared_inbound
     * @param bool $filterUsableForInbound filter domains by whether they can currently receive inbound email
     * @param bool $filterUsableForSending filter domains by whether they can currently be used to send email
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterDomain' => $filterDomain,
                'filterProfileID' => $filterProfileID,
                'filterStatus' => $filterStatus,
                'filterType' => $filterType,
                'filterUsableForInbound' => $filterUsableForInbound,
                'filterUsableForSending' => $filterUsableForSending,
                'pageAfter' => $pageAfter,
                'pageBefore' => $pageBefore,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an email domain configuration. Verified domains require `force=true`, and shared domains are read-only for non-owner accounts.
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
    ): EmailDomainResponse {
        $params = Util::removeNulls(['force' => $force]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the DNS records Telnyx generated for domain ownership and DKIM verification, plus MX records when inbound delivery is enabled.
     *
     * @param string $domainID Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveDNSRecords(
        string $domainID,
        RequestOptions|array|null $requestOptions = null
    ): EmailDomainGetDNSRecordsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveDNSRecords($domainID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a summary of domain health including verification status and usability.
     *
     * @param string $id Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveHealth(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailDomainGetHealthResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveHealth($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Checks the published DNS records against the records required for the email domain and returns the latest verification results.
     *
     * @param string $domainID Email domain UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verify(
        string $domainID,
        RequestOptions|array|null $requestOptions = null
    ): EmailDomainResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verify($domainID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
