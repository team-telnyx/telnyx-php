<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainRotateDkimResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailDomains\DNSRecord;
use Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\Dkim;
use Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\PreviousDkimKey;
use Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\RecordType;

/**
 * Result of rotating a domain's DKIM key. The new key is active and signing switches to it immediately; the previous key is retired to a `retiring` state (retained, not revoked) so it can be revoked after the DNS propagation grace period. Selectors are fixed, so the DKIM DNS record's TXT value is replaced in place at the shared `<selector>._domainkey.<domain>` host — `old_selector_retained` is false and the returned dns_records carry the new value the customer must publish promptly.
 *
 * @phpstan-import-type DkimShape from \Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\Dkim
 * @phpstan-import-type DNSRecordShape from \Telnyx\EmailDomains\DNSRecord
 * @phpstan-import-type PreviousDkimKeyShape from \Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\PreviousDkimKey
 *
 * @phpstan-type DataShape = array{
 *   dkim: Dkim|DkimShape,
 *   dnsRecords: list<DNSRecord|DNSRecordShape>,
 *   domain: string,
 *   domainID: string,
 *   oldSelectorRetained: bool,
 *   previousDkimKey: null|PreviousDkimKey|PreviousDkimKeyShape,
 *   recordType: RecordType|value-of<RecordType>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The new active DKIM key.
     */
    #[Required]
    public Dkim $dkim;

    /**
     * The DKIM DNS records the customer must publish, carrying the new key's TXT value with verification reset to pending.
     *
     * @var list<DNSRecord> $dnsRecords
     */
    #[Required('dns_records', list: DNSRecord::class)]
    public array $dnsRecords;

    #[Required]
    public string $domain;

    #[Required('domain_id')]
    public string $domainID;

    /**
     * False for this service: one selector is fixed per domain, so rotation replaces the TXT value at the existing _domainkey host. There is no dual-selector overlap; publish the replacement TXT promptly because signing switches immediately.
     */
    #[Required('old_selector_retained')]
    public bool $oldSelectorRetained;

    /**
     * The retired previous key, or null when the domain had no active key before rotation. Retained in a `retiring` state so it can be revoked after the DNS propagation grace period.
     */
    #[Required('previous_dkim_key')]
    public ?PreviousDkimKey $previousDkimKey;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   dkim: ...,
     *   dnsRecords: ...,
     *   domain: ...,
     *   domainID: ...,
     *   oldSelectorRetained: ...,
     *   previousDkimKey: ...,
     *   recordType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withDkim(...)
     *   ->withDNSRecords(...)
     *   ->withDomain(...)
     *   ->withDomainID(...)
     *   ->withOldSelectorRetained(...)
     *   ->withPreviousDkimKey(...)
     *   ->withRecordType(...)
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
     * @param Dkim|DkimShape $dkim
     * @param list<DNSRecord|DNSRecordShape> $dnsRecords
     * @param PreviousDkimKey|PreviousDkimKeyShape|null $previousDkimKey
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        Dkim|array $dkim,
        array $dnsRecords,
        string $domain,
        string $domainID,
        bool $oldSelectorRetained,
        PreviousDkimKey|array|null $previousDkimKey,
        RecordType|string $recordType,
    ): self {
        $self = new self;

        $self['dkim'] = $dkim;
        $self['dnsRecords'] = $dnsRecords;
        $self['domain'] = $domain;
        $self['domainID'] = $domainID;
        $self['oldSelectorRetained'] = $oldSelectorRetained;
        $self['previousDkimKey'] = $previousDkimKey;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The new active DKIM key.
     *
     * @param Dkim|DkimShape $dkim
     */
    public function withDkim(Dkim|array $dkim): self
    {
        $self = clone $this;
        $self['dkim'] = $dkim;

        return $self;
    }

    /**
     * The DKIM DNS records the customer must publish, carrying the new key's TXT value with verification reset to pending.
     *
     * @param list<DNSRecord|DNSRecordShape> $dnsRecords
     */
    public function withDNSRecords(array $dnsRecords): self
    {
        $self = clone $this;
        $self['dnsRecords'] = $dnsRecords;

        return $self;
    }

    public function withDomain(string $domain): self
    {
        $self = clone $this;
        $self['domain'] = $domain;

        return $self;
    }

    public function withDomainID(string $domainID): self
    {
        $self = clone $this;
        $self['domainID'] = $domainID;

        return $self;
    }

    /**
     * False for this service: one selector is fixed per domain, so rotation replaces the TXT value at the existing _domainkey host. There is no dual-selector overlap; publish the replacement TXT promptly because signing switches immediately.
     */
    public function withOldSelectorRetained(bool $oldSelectorRetained): self
    {
        $self = clone $this;
        $self['oldSelectorRetained'] = $oldSelectorRetained;

        return $self;
    }

    /**
     * The retired previous key, or null when the domain had no active key before rotation. Retained in a `retiring` state so it can be revoked after the DNS propagation grace period.
     *
     * @param PreviousDkimKey|PreviousDkimKeyShape|null $previousDkimKey
     */
    public function withPreviousDkimKey(
        PreviousDkimKey|array|null $previousDkimKey
    ): self {
        $self = clone $this;
        $self['previousDkimKey'] = $previousDkimKey;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
